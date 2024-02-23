<?php
session_start();
class FinanceiroController extends RenderView {

    public function index(){
        // Verifica se a sessão 'id_user' está definida
        if(!isset($_SESSION["id_user"])) header("Location: ./login");
            

    
        $this->loadView("Financeiro", [
            'title' => 'Minha Gestão - Financeira',
        ]); 
    }

   
}
