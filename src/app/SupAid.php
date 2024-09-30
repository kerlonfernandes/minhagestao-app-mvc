<?php

namespace HelpersClass;

use DateTime;

class SupAid
{
    public function getCurrentDate()
    {
        date_default_timezone_set('America/Sao_Paulo'); // Configura o fuso horário para Brasília (BRT)
        return date("Y-m-d");
    }

    public function getCurrentTime()
    {
        date_default_timezone_set('America/Sao_Paulo'); // Configura o fuso horário para Brasília (BRT)
        return date("H:i:s");
    }

    public function generateNumKey($len, $min, $max)
    {
        $sequence = array();

        for ($i = 0; $i < $len; $i++) {
            $sequence[] = rand($min, $max);
        }
        return $sequence;
    }

    public function generateRandomLetterHash($length = 20)
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lettersLength = strlen($letters);
        $hash = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, $lettersLength - 1);
            $hash .= $letters[$randomIndex];
        }

        return $hash;
    }

    public function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function validatePhoneNumber($phoneNumber)
    {
        return preg_match("/^\d{10}$/", $phoneNumber);
    }

    public function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags(trim($input)));
    }

    public function generateRandomPassword($length = 8)
    {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
    }

    public function sendEmail($to, $subject, $message, $headers)
    {
        return mail($to, $subject, $message, $headers);
    }

    public function calculateAge($birthDate)
    {
        $today = new DateTime();
        $birthdate = new DateTime($birthDate);
        $age = $today->diff($birthdate);
        return $age->y;
    }

    ///////////// ENCODE URL /////////////////////
    function encodeURL($str)
    {
        $prfx = array(
            'AFVxaIF', 'Vzc2ddS', 'ZEca3d1', 'aOdhlVq', 'QhdFmVJ', 'VTUaU5U',
            'QRVMuiZ', 'lRZnhnU', 'Hi10dX1', 'GbT9nUV', 'TPnZGZz', 'ZGiZnZG',
            'dodHJe5', 'dGcl0NT', 'Y0NeTZy', 'dGhnlNj', 'azc5lOD', 'BqbWedo',
            'bFmR0Mz', 'Q1MFjNy', 'ZmFMkdm', 'dkaDIF1', 'hrMaTk3', 'aGVFsbG'
        );
        for ($i = 0; $i < 3; $i++) {
            $str = $prfx[array_rand($prfx)] . strrev(base64_encode($str));
        }
        $str = strtr($str, "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2");
        return $str;
    }

    ///////////// DECODE URL /////////////////////
    function decodeURL($str)
    {
        $str = strtr($str, "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2", "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
        for ($i = 0; $i < 3; $i++) {
            $str = base64_decode(strrev(substr($str, 7)));
        }
        return $str;
    }


    public function fileExists($filePath)
    {
        return file_exists($filePath);
    }

    public function sortAssocArrayByValue($array)
    {
        asort($array);
        return $array;
    }

    public function sumArray($array)
    {
        return array_sum($array);
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    public function hashPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $hashedPassword;
    }
    public function verifyPassword($password, $hashedPassword)
    {

        $passwordMatch = password_verify($password, $hashedPassword);
        return $passwordMatch;
    }
    public function numeroPorExtenso($numero) {
        $numeros = array(
            1 => 'um', 2 => 'dois', 3 => 'três', 4 => 'quatro', 5 => 'cinco',
            6 => 'seis', 7 => 'sete', 8 => 'oito', 9 => 'nove', 10 => 'dez',
            11 => 'onze', 12 => 'doze', 13 => 'treze', 14 => 'quatorze', 15 => 'quinze',
            16 => 'dezesseis', 17 => 'dezessete', 18 => 'dezoito', 19 => 'dezenove', 20 => 'vinte',
            30 => 'trinta', 40 => 'quarenta', 50 => 'cinquenta'
        );
    
        if ($numero <= 20 || ($numero % 10 == 0 && $numero < 100)) {
            return $numeros[$numero];
        } else {
            $dezena = $numeros[$numero - $numero % 10];
            $unidade = $numeros[$numero % 10];
            return $dezena . '-' . $unidade;
        }
    }
}
