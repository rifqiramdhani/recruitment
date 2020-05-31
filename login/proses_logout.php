<?php 
    require('../function/helper.php');
    session_destroy();
    redirect('login');
?>