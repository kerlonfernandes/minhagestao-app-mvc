<?php

class CadastrarController extends RenderView {

    public function cadastrar(){

        $this->loadView("CadastrarPage", [
            'title' => 'Cadastro - Minha Gestão',
            
        ]);

    }

}