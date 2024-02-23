<?php

namespace UserClass;

use Midspace;
use HelpersClass\SupAid;
use Midspace\Database;
use PDOException;

// require_once('../config.php');
// require_once('../Database.php');
// require_once("../src/app/SupAid.php");

require_once("../../config/config.php");
require_once("../../models/Database.php");
require_once("../app/SupAid.php");

class User
{

    private $conn;
    private $Helpers;
    public $key_user;
    public $chave_recuperacao;
    public $return;
    public $dados;

    public function __construct($connection)
    {
        $this->conn = new Database($connection);
        $this->Helpers = new SupAid();
    }

    public function register(array $user)
    {

        $key_user = $this->Helpers->generateRandomLetterHash(26);
        $chave_recuperacao = $this->Helpers->generateNumKey(16, 0, 9);
        $chave_recuperacao = implode($chave_recuperacao);

        $this->key_user = $key_user;
        $this->chave_recuperacao = $chave_recuperacao;

        //verificar se o usuário existe no banco de dados
        $query = $this->conn->execute_query("SELECT id from usuarios WHERE email = :email", ["email" => $user['email']]);

        $query = $this->conn->execute_non_query(
            "INSERT INTO usuarios(email, nome, senha, key_user, chave_recuperacao, hora, data_acesso) VALUES (:email, :nome, :senha, :key_user, :chave_recuperacao, CURRENT_TIME(), CURRENT_DATE())",
            [
                "email" => $user['email'],
                "nome" => $user['name'],
                "senha" => $this->Helpers->hashPassword($user['pass']),
                "key_user" => $this->key_user,
                "chave_recuperacao" => $this->chave_recuperacao
            ]
        );
        try {

            $this->return = $this->conn->execute_query("SELECT id from usuarios WHERE email = :email", ["email" => $user['email']]);

            if ($this->return->results > 1) {
                return;
            } else {
                $this->conn->execute_non_query(
                    "INSERT INTO usuarios(email, nome, senha, key_user, chave_recuperacao, hora, data_acesso) VALUES (:email, :nome, :senha, :key_user, :chave_recuperacao, CURRENT_TIME(), CURRENT_DATE())",
                    [
                        "email" => $user['email'],
                        "nome" => $user['name'],
                        "senha" => $user['password'],
                        "key_user" => $this->key_user,
                        "chave_recuperacao" => $this->chave_recuperacao
                    ]
                );
            }
        } catch (PDOException $e) {

            print_r($e);
        }
    }

    public function Auth(array $user)
    {
        if (!empty($user)) {
            $this->dados = $this->return = $this->conn->execute_query(
                "SELECT id, email, nome, key_user FROM usuarios WHERE email = :email AND senha = :pass",
                [
                    "email" => $user['email'],
                    "pass" => $user['pass']
                ]
            );
            return $this->dados;
        } else {
            return;
        } 
    }
    public function RecoverPass () {

        

    }
}

    


