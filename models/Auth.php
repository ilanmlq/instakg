<?php

class User{

    public static function isConnected() : bool {
        return false;
    }

    public static function readUserByEmail(string $email) : mixed {
        $query = 'SELECT * FROM USER WHERE emailUser = ?';
        $params = [$email];

        $req = MonPdo::getInstance()->prepare($query);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute($params);

        return $req->fetch();
    }

    public static function login(string $email, string $pwd) : bool {

        $user = User::readUserByEmail($email);

        if ($user && $email == $user->emailUser) {
            if (password_verify($pwd, $user->pwdHash)) {
                
                return 0;
            } else {
                return 1;
            }
        }
    }

    public static function register(string $email, string $username, string $pwd) : bool{
        $query = "INSERT INTO USER (nameUser, emailUser, pwdHash, idRole) VALUES (?, ?, ?, 2)";
        $params = [$email, $username, password_hash($pwd, PASSWORD_DEFAULT)];

        $req = MonPdo::getInstance()->prepare($query);
        return $req->execute($params);   
    }

}