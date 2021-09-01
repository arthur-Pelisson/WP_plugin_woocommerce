<?php 

function sd_deleteUser() {
    if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delet') {
        $deletUser = new user();
        if($deletUser->deleteUserById($_GET['id'])) {
            header("location: ./admin.php?page=Users&success=2");
            exit();
        } else {
            header("location: ./admin.php?page=Users&error=2");
            exit();
        }
    } else {
        header("location: ./admin.php?page=Users&error=4");
        exit();
    }
}