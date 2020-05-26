<div style="width:80%;margin:0 auto;font-family: sans-serif;">

    <div style="background: #4a4a4a;background: -webkit-linear-gradient(to bottom, #655e5f, #4a4a4a);background: linear-gradient(to bottom,#655e5f,#4a4a4a);color:white;text-align:center;padding:3px;margin-top:10px;margin-bottom:5px">
        <h2>Verifikasi alamat email kamu</h2>
    </div>

    <div style="margin-bottom:10px;font-family: sans-serif;">
        <p>
            Terima kasih sudah daftar di sekolahkoding. Email anda <?= $email ?> dengan password <?= $password ?>. <br>
            Kami tahu susahnya mencari tutorial yang bagus untuk mulai belajar. Karena itu kamu akan senang dengan sekolahkoding. <br>
            Ayo mulai belajar, klik tombol dibawah atau
            <a href="<?= base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) ?>" target="_blank"> link ini </a>
            untuk mengaktifkan akun
            <a href="<?= base_url() . 'auth/verify?email=' . $email . '&token=' . urlencode($token) ?>""  target=" _blank" style="display: block;text-decoration: none;width: 200px;margin: 5px auto;background: #4a4a4a;background: -webkit-linear-gradient(to bottom, #655e5f, #4a4a4a);background: linear-gradient(to bottom,#655e5f,#4a4a4a);color: white;text-align: center;padding: 5px;border: 0px;font-size: 15px;">
                Verifikasi Alamat Email
            </a>
        </p>
    </div>

    <div style="font-family: sans-serif;">
        <table style="background-color:#212121;color:#ddd;font-size:15px" width="1000" height="80" bgcolor="#212121" cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr>
                    <td style="border-left:1px solid #212121;border-right:1px solid #212121" height="40"></td>
                </tr>
                <tr>
                    <td style="text-align:center;border-left:1px solid #212121;border-right:1px solid #212121;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif">
                        <span>Do not reply</span>
                        <br>
                        <span>©2019 FreeLogoDesign | 400 Boulevard Langelier, Quebec, G1K 5N9</span>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:1px solid #212121;border-right:1px solid #212121;text-align:center">
                        <a href="" target="_blank"><img style="margin-right:15px" height="25" width="25" src="https://ci3.googleusercontent.com/proxy/DccKFX_5Sb12iyeuUmen2c7WmI6qJ8n9-2aifO3ZVMch6-S9K9kqQqQIwLQvUIwoldDR35oPJYTU1Mdz1OhdGWMkRYYTMeX-ye10oFWkcqA=s0-d-e1-ft#https://www.freelogodesign.org/Content/img/email-facebook.png" alt="Facebook" class="CToWUd"></a>
                        <a href="" target="_blank"><img style="margin-right:15px" height="25" width="25" src="https://ci3.googleusercontent.com/proxy/qjR6YFoi9oZhXK3mjVQUdYtv6C9U7TkN0vg-Jc8jaxittTyFkB82EI--KFeuTTJEJb8MDJoGDCOT3SAkAosWCbsn8f8Rvm-8lbjiI0L4lcWg=s0-d-e1-ft#https://www.freelogodesign.org/Content/img/email-pinterest.png" alt="Pinterest" class="CToWUd"></a>
                        <a href="" target="_blank" ><img height="25" width="25" src="https://ci3.googleusercontent.com/proxy/nONnYrbTrd7NitxPG4-RJ_9EHCX9KOZPwamNSDjmjxcP6oyJoktPsx3ve_z0mge7Rf_qHmVqKI0Ze2otztaL-5nJJaYxP1yuVfIzOsq_2AjH=s0-d-e1-ft#https://www.freelogodesign.org/Content/img/email-instagram.png" alt="Intagram" class="CToWUd"></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>