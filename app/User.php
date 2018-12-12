<?php

class User {

    public $result, $id;

    public function __construct($id = null)
    {
        $this->id = $id;

        if ($id != null) {
            $pdo = new PDOConnect();
            $query = $pdo->pdo_start()->prepare("SELECT * FROM users WHERE id = ?");
            $query->execute([$this->id]);
            $this->result = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getFirstName() {
        return $this->result['firstname'];
    }
    public function getLastName() {
        return $this->result['lastname'];
    }

    public function getEmail() {
        return $this->result['email'];
    }

    public function getPhone() {
        return $this->result['phone'];
    }

    public function getPostal() {
        return $this->result['postal'];
    }

    public function getBirthday() {
        return $this->result['birthday'];
    }

    public function getPermission() {
        return $this->result['permission'];
    }

    public function isAdmin() {
        return $this->result['permission'] == "ADMIN" ? true : false;
    }

    /* affichage de l'age de la personne selon sa date de naissance */
    public function getAge() {
        $dobObject = new DateTime(date("Y/m/d",strtotime($this->getBirthday())));
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        return $diff->y;
    }

    public function PasswordReset() {
        //
    }

    public function createUser($email, $firstname, $lastname, $phone, $password, $birthday, $postal)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT email, phone FROM users WHERE email = ? OR phone = ?");
        $query->execute([
            $email,
            $phone
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount()) {
            return 0;
        } else {
            $query = $pdo->pdo_start()->prepare("INSERT INTO `users`(`email`, `firstname`, `lastname`, `password`, `phone`, `birthday`, `postal`) VALUES (?,?,?,?,?,?,?)");
            $query->execute([
                $email,
                $firstname,
                $lastname,
                md5($password),
                $phone,
                $birthday,
                $postal
            ]);
            /*
             * mail system (ne marche pas sans serveur SMTP) !!
             *
             */

            /*
            $to = $email;
            $subject = 'Inscription de ' . $lastname . ' ' . $firstname;
            $message = 'Bonjour ' . $lastname . ' je confirme ton inscription sur ' . SITE_NAME . ' avec l\'email : ' . $email;
            $headers = array(
                'From' => 'webmaster@localhost',
                'Reply-To' => 'webmaster@localhost',
                'X-Mailer' => 'PHP/' . phpversion()
            );

            mail($to, $subject, $message, $headers);
            */
            return 1;
        }
    }


}