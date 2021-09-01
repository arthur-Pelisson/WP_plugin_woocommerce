<?php 

function sd_editUser() {

    if (isset($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nbrGame']) && isset($_POST['escapeGame']) ) {
        echo $_POST['id'];
        echo $_POST['email'];
        echo $_POST['password'];
        echo $_POST['nbrGame'];
        echo $_POST['escapeGame'];

        $updateUser = new user();
        if($updateUser->updateUserByid($_POST['id'], $_POST['email'], $_POST['password'], $_POST['nbrGame'], $_POST['escapeGame'])) {
            header('location: ./admin.php?page=Users&success=1');
            exit();
        } else {
            header('location: ./admin.php?page=Users&error=1');
            exit();
        }
    } else {
        header('location: ./admin.php?page=Users&error=4');
        exit();
    }
    
}