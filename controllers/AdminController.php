<?php

session_start();

class AdminController extends RenderView {

    public function adminPanel(){

        if (!isset($_SESSION["id_user"]))  {
            header("Location: ./login");
        }
        else {
            if(!isset($_SESSION["is_admin"])  || $_SESSION['is_admin'] != 1) {
                die("Você não tem permissão para acessar essa área");
            }
            else {
                $this->loadView("adminPanel", [
                    'title' => 'Admin Panel - Minha Gestão',
                    
                ]);
            }
        }

       

    }

}