<?php 
function sn_sendEmailPassword() {
    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'sendEmailPassword') {
            $getUser = new user();
            $getUser = $getUser->getUserById($_GET['id']);
            $utils = new utils();
            if($utils->resendEmailPassword($getUser)) {
                header('location: ./admin.php?page=Users&success=3');
                exit();
            } else {
            }header('location: ./admin.php?page=Users&error=3');
            exit();
    } else {
        header('location: ./admin.php?page=Users&error=4');
        exit();
    }
}