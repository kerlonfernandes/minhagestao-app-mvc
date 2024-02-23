<?php

namespace app\database\models;

use app\database\Connect;

class User extends Model
{
    protected string $table = 'usuarios';

    public function insert(array $data)
    {
        try {
            $connect = Connect::connect();
            $prepare = $connect->prepare("INSERT INTO $this->table (nome, sobrenome, email, profile_pic) VALUES (:firstName, :lastName, :email, :avatar)");
    
            $result = $prepare->execute($data);
    
            if (!$result) {
                var_dump($prepare->errorInfo()); // Exibe informações detalhadas sobre o erro
            }
    
            return $result;
        } catch (\PDOException $th) {
            var_dump($th->getMessage());
            return false;
        }
    }
    
}
