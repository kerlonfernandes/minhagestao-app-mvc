<?php

class NotFoundController extends RenderView {

    public function index() {

        $this->loadView("NotFoundPage", [
            'title' => 'Página não encontrada',
            
        ]);
    }

}