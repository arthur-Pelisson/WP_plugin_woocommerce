<?php
class userController extends user {




    
    /**
     * Method getAllUser
     *
     * @return void
     */
    public function getAllUser() {
        $Users = parent::getAll();
        $this->displayUsers($Users);
    }
    
    /**
     * Method getUserByID
     *
     * @param $id  [Id User]
     *
     * @return void
     */
    public function getUserByID($id) {
        if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
            $User = parent::getUserById($_GET['id']);
            $this->displayUser($User);
        } else {
            header('location: ./admin.php?page=Users&error=4');
            exit();
        }
    }
    
    /**
     * Method deleteUserById
     *
     * @param $id  [Id of user]
     *
     * @return void
     */
    public function deleteUserById($id) {
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $this->displayDeleteUser($id);
        }
    }
    
    /**
     * Method displayUsers
     *
     * @param $Users [Display All users]
     *
     * @return void
     */
    public function displayUsers($Users) {
        echo '
        
          <div class="table-responsive">
            <table id="userTable" style="width:100%" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">password</th>
                <th scope="col">nbr_game</th>
                <th scope="col">EscapeGame</th>
                <th scope="col">Edit</th>
                <th scope="col">Supprimer</th>
            </tr> 
            </thead>
            <tbody>';
            for ($i = 0; $i < count($Users); $i++) {
                $name = utf8_encode( $Users[$i]->name );
                echo '<tr><td scope="row">' . $Users[$i]->id . '</td>
                <td scope="row">' . $Users[$i]->email . '</td>
                <td scope="row">' . $Users[$i]->password . '</td>
                <td scope="row">' . $Users[$i]->nbr_game . '</td>
                <td scope="row">' . $name . '</td>
                <td><a href=".\admin.php?page=Users&action=edit&id=' . $Users[$i]->id . '" class=\"btn btn-primary\" >Edit</a></td>
                <td><a href=".\admin.php?page=Users&action=delete&id=' . $Users[$i]->id . '" class=\"btn btn-danger\" >Supprimmer</a></td></tr>';
            }
            echo '</tbody></table> </div>
         
    ';
    }
    
    /**
     * Method displayUser
     *
     * @param $User [Display User]
     *
     * @return void
     */
    public function displayUser($User) {
        $template = file_get_contents(MY_PLUGIN_PATH . "vue/template/editUsers.php");
        //info user passe to template
        foreach($User as $key => $value) {
            $template = str_replace('{{ '.$key.' }}', $value, $template);
        }
        //==========Create select for template===============//   
        $customSelect = $this->createSelectEscape($User->escapeId);

        $template = str_replace('<select></select>', $customSelect, $template);

        $template = str_replace('{{ path }}', MY_PLUGIN_PATH, $template);

        echo $template;

    } 
    
    /**
     * Method createSelectEscape
     *
     * @param $escapeId [Create select html for all escapeGame with the escape of user selected]
     *
     * @return void
     */
    public function createSelectEscape($escapeId) {
        $getAllEscape = parent::getAllEscape();

        $customSelect = '<select name="escapeGame" id="escapeGame">';

        for ($i = 0; $i < count($getAllEscape); $i++) {
            $escapeName = utf8_encode($getAllEscape[$i]->name);
            if ($escapeId === $getAllEscape[$i]->id) {
                $customSelect .= '<option  value="' . $getAllEscape[$i]->id . '" selected>'. $escapeName .'</option>';
            } else {
                $customSelect .= '<option value="' . $getAllEscape[$i]->id . '">'. $escapeName .'</option>';
            }
           
        }
        $customSelect .= '</select>';

        
        return $customSelect;   
    }
    
    /**
     * Method displayDeleteUser
     *
     * @param $id [$id of user]
     *
     * @return void
     */
    public function displayDeleteUser($id) {
        $getUser = parent::getUserById($id);


        $template = file_get_contents(MY_PLUGIN_PATH . "vue/template/deleteUser.php");
        //info user passe to template
        foreach($getUser as $key => $value) {
            $template = str_replace('{{ '.$key.' }}', $value, $template);
        }
        //==========Create select for template===============//   

        $template = str_replace('{{ path }}', MY_PLUGIN_PATH, $template);

        echo $template;


    }
}