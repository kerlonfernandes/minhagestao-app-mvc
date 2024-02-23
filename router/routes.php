<?php


$routes = [

    "/" => "HomeController@index",
    "/users/{id}" => "UserController@show",
    "/perfil" => "ProfileController@Show", 
    "/login" => "LoginController@auth",
    "/cadastrar" => "CadastrarController@cadastrar",
    "/financeira" => "FinanceiroController@index",
    "/clientes" => "ClientesController@index",
    "/cliente/{id}" => "ClientesController@cliente",
    "/clientes/relatorio" => "ClientesController@relatorioClientes",
    "/produtos" => "ProdutosController@index",
    "/produto/{id}" => "ProdutosController@produto",
    "/pending/payment" =>"UserController@pendingPayment",
    "/admin" => "AdminController@adminPanel",
    


];