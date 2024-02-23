<?php
session_start();
class HomeController extends RenderView {

    public function index(){
        if(!isset($_SESSION["id_user"])) header("Location: ./login");
            

        $this->loadView("home", [
            'title' => 'Inicio - Minha Gestão',
        ]); 
    }
}
