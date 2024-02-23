<?php

class UserController extends RenderView {

    public function index() {



    }


    public function show($id) {

    //    $id_user = $id[0];

    //     $user = new UserModel();


    }

    public function pendingPayment() {
        $this->loadView('pendingPayment', ['title' => "Pendente"]);

    }

}