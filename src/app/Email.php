<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email {

    /** @var PHPMailer */
    private $mail;

    /** @var array */
    private $data;

    /** @var Error */
    private $Error;

    /**
     * Email constructor.
     */
    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->data = new \stdClass();
        $this->mail->isSMTP();
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = false;
        $this->mail->setLanguage('br');
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->CharSet = 'utf-8';

        $this->mail->Host = MAILHOST;
        $this->mail->Port = MAILPORT;
        $this->mail->Username = MAILUSER;
        $this->mail->Password = MAILPASS;
    }

    /**
     * @param string $subject
     * @param string $body
     * @param string $recipient_email
     * @param string $recipient_name
     * @return Email
     */
    public function add(string $subject, string $body, string $recipient_name, string $recipient_email): Email {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipient_name = $recipient_name;
        $this->data->recipient_email = $recipient_email;
        return $this;
    }

    /**
     * @param string $filePath
     * @param string $fileName
     * @return Email
     */
    public function attach(string $filePath, string $fileName): Email {
        $this->data->attach[$filePath] = $fileName;
        return $this;
    }

    /**
     * @param $from
     * @param $fromName
     */
    public function send(string $from = FROM_EMAIL, string $fromName = FROM_NAME) {
        try {
            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_name);
            $this->mail->setFrom($from, $fromName);

            if (!empty($this->data->attach)) {
                foreach ($this->data->attach as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();
            //return true;
        } catch (Exception $exception) {
            $this->Error = $exception;
            return false;
        }
    }

    /**
     * @return Erros
     */
    public function error() {
        return $this->Error;
    }

}
