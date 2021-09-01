<?php

function sn_display_Users(){
    
    //Dysplay error and success message
    if (isset($_GET['error']) && $_GET['error']) {
        $messageHandler = new utils();
        $messageHandler->messageHandler("error", $_GET['error']);
    } else if (isset($_GET['success']) && $_GET['success']) {
        $messageHandler = new utils();
        $messageHandler->messageHandler("success", $_GET['success']);
    }
   
    if (empty($_GET['id'])) {
        echo '<h1 style="text-align:center">Utilisateur EscapeGame</h1>';
        $getAllUsers = new userController();
        $getAllUsers->getAllUser();
    } elseif ($_GET['action'] === "edit") {
        $getUserByid = new userController();
        $getUserByid->getUserByID($_GET['id']);
    } elseif ($_GET['action'] === "delete" && isset($_GET['id'])) {
        $deletUser = new userController();
        $deletUser->deleteUserById($_GET['id']);
    }

}
