<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('My_model', 'proses');
    }

    public function cek_login()
    {
        if ($this->session->userdata('login') == true) {
            $level = strtolower($this->session->userdata('level'));
            $url = $level."/page/dashboard";
            redirect(base_url($url));
        }
    }

    public function login($script = false)
    {
        $this->cek_login();

        $data['script'] = $script;
        $this->template->load('template_auth', 'auth', $data);
    }

    public function register()
    {
        $this->template->load('template_auth', 'register');
    }

    public function proseslogin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->login();
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

            if ($user) {
                
                if(password_verify($password, $user['password_admin'])){
                    if ($user['aktif_admin'] == 1) {
                        $data = [
                            'login' => true,
                            'email' => $email,
                            'level' => $user['level_admin'],
                            'avatar' => $user['photo_admin']
                        ];

                        $this->session->set_userdata($data);

                        switch ($user['level_admin']) {
                            case 'Admin':
                                redirect('admin/page/dashboard');
                                break;

                            case 'Direktur':
                                redirect('direktur/page/dashboard');
                                break;

                            case 'Keuangan':
                                redirect('keuangan/page/dashboard');
                                break;

                            case 'Tour':
                                redirect('tour/page/dashboard');
                                break;

                            default:
                                redirect('auth/logout');
                                break;
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf email belum aktif
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                        redirect('auth/login');
                    }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Maaf password salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                        redirect('auth/login');
                }
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Maaf email belum terdaftar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/login');
            }
        }
    }

    public function prosesregister()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]', ['is_unique' => 'Email sudah terdaftar']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->login('$(".btn-register").click();');
        } else {
            $data = [
                'email_admin' => $this->input->post('email'),
                'password_admin' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level_admin' => 'Admin',
                'aktif_admin' => 0,
                'photo_admin' => 'default.png'
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'token' => $token,
                'email' => $this->input->post('email')
            ];

            $this->sendEmailRegister($token);
            $this->proses->insertdata('user_token', $user_token);

            $this->proses->insertdata('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Silahkan cek email untuk verifikasi alamat email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }

    public function prosesforgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');

        if ($this->form_validation->run() == false) {
            $this->login('$(".btn-forgot-password").click();');
        } else { 


        }
    }

    public function sendEmailRegister($token)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'touradeeva@gmail.com',
            'smtp_pass' => 'adeevatour123',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('touradeeva@gmail.com', 'Adeeva Tour');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Verifikasi alamat email');

        $data = [
            'token' => $token,
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];

        $body = $this->load->view('template_email2.php', $data, TRUE);
        $this->email->message($body);

        if ($this->email->send()) {
            return true;
        } else {
            $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user_token = $this->db->get_where('user_token', ['email' => $email])->row_array();

        if ($user_token) {
            if ($token == $user_token['token']) {

                $this->db->where(['email' => $email])->update('admin', ['aktif' => 1]);
                $this->db->delete('user_token', ['email' => $email]);
                
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat.</strong> email sudah aktif silahkan login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('auth/login');
             } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Maaf token tidak valid.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Maaf email belum terdaftar.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('auth/login');
        }
    }



    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function page404()
    {
        $this->load->view('404');
    }


    public function page403()
    {
        $this->load->view('403');
    }
}
