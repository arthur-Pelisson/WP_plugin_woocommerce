<?php 
class utils extends user {

    private $msg = array(
        "success" => array (
            1 => "Edition reussie",
            2 => "Supression reussie",
            3 => "Envoie d'email reussie",
            

        ),
        'error' => array (
            1 => "Edition echoué",
            2 => "Supression echoué",
            3 => "Envoie d'email echoué",
            4 => "Un probleme est servenu"
        )

        
    );

    private function Genere_Password($size) {
        // Initialisation des caractères utilisables
        $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $password = "";
        for($i=0; $i<$size; $i++) {
            $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }
            
        return $password;
    }

    public function setPassword($size) {
        return $this->Genere_Password($size);
    }


    public function sendEmail($infoUser) {

        $template = file_get_contents(MY_PLUGIN_PATH . "vue/template/email_order_completed.php");

        foreach($infoUser as $key => $value) {
            $template = str_replace('{{ '.$key.' }}', $value, $template);
        }



    
        $emailTo = $infoUser['email'];
        $subject = 'Votre commande n\'° ' . $infoUser['order_id'] . ' sur ****** a bien été completé';
        $body = $template;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'From: lorem ipsum';
        wp_mail($emailTo, $subject, $body, $headers);
    }

    public function resendEmailPassword($infoUser) {

        $template = file_get_contents(MY_PLUGIN_PATH . "vue/template/send_email_password.php");

        foreach($infoUser as $key => $value) {
            $template = str_replace('{{ '.$key.' }}', $value, $template);
        }
    
        $emailTo = $infoUser->email;
        $subject = 'lorem ipsum';
        $body = $template;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'From: loremipsum';
        if(wp_mail($emailTo, $subject, $body, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public function messageHandler($type, $idmsg){
        $msg = $this->msg[$type][$idmsg];
        do_action('myadminnotices', $type, $msg);
    }
}