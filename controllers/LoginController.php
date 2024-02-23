<?php

session_start();


class LoginController extends RenderView {

    
    public function auth(){
        // $_SESSION['user'] = "admin";
        // $_SESSION['id_user'] = 140;
        // $_SESSION['key_user'] = "HGudsOgblHPOXRZHRlJeUqbjM";
        // $_SESSION['is_admin'] = true;

        $this->loadView("LoginPage", [
            'title' => 'Login - Minha Gestão',
        ]);
        

    }

}