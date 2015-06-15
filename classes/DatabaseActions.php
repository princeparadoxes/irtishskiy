<?php

class DatabaseActions {

    private $_pdo;

    public function __construct() {
        $host = "mysql.hostinger.ru";
        $db = "u710697054_spir";
        $charset = "utf8";
        $user = "u710697054_root";
        $pass = "westside";
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $this->_pdo = new PDO($dsn, $user, $pass, $opt);
    }

    public function addRequest($name, $phone, $email, $from, $to) {
        $stmt = $this->_pdo->
                prepare("INSERT INTO `request`(`name`, `phone`,`email`, `arrival_date`, `check_out_date`) VALUES (:name, :phone,:email, :from, :to)");
        $stmt->execute(array('name' => $name, 'phone' => str_replace("+", "", str_replace("-", "", str_replace(")", "", 
                str_replace("(", "", str_replace(" ", "", $phone))))), 'email' => $email, 'from' =>$from, 'to' => $to));
    }

    public function getAllFromRequest() {
        $data = $this->_pdo->query("SELECT * FROM  `request`")->fetchAll();
        return $data;
    }

    public function delete_request($id) {
        $data = $this->_pdo->query("DELETE FROM `request` WHERE `id` = '$id'")->execute();
        return $data;
    }

    public function obtain_request($id) {
        $data = $this->_pdo->query("SELECT * FROM  `request` WHERE `id` = '$id'")->fetch();
        $email = $data["email"];
        $name = $data["name"];
        $obtain = $data["obtain"];
        if ($obtain == 1) {
            mail($email, "Санаторий Иртышский", "Уважаемы(-ая) $name Ваша заявка была отменена. Ждите звонка администратора, для уточнения причин");
            $obtain = 0;
        } else {
            mail($email, "Санаторий Иртышский", "Уважаемы(-ая) $name Ваша заявка принята. Ждите звонка администратора, для уточнения времени и сроков проживания");
            $obtain = 1;
        }
        $data = $this->_pdo->query("UPDATE `request` SET `obtain`='$obtain'  WHERE `id` = '$id'")->execute();
        return $data;
    }

    public function addReview($about, $review) {
        $stmt = $this->_pdo->prepare("INSERT INTO `review`(`about`, `text`,`date`) VALUES (:about, :text,:date)");
        $stmt->execute(array('about' => $about, 'text' => $review, 'date' => time()));
    }
    
    public function getAllFromReview() {
        $data = $this->_pdo->query("SELECT * FROM  `review`")->fetchAll();
        return $data;
    }

}
