<?php

class User{

    public static function isConnected() : bool {
        return false;
    }

    public static function readUserByEmail(string $email) : mixed {
        $query = 'SELECT * FROM USER WHERE email = ?';
        $params = [$email];

        $req = MonPdo::getInstance()->prepare($query);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute($params);

        return $req->fetch();
    }

    public static function login(string $email, string $mdpHash) : bool {

        $user = User::readUserByEmail($email);

        if ($user && $email == $user->emailUser) {
            if (password_verify($mdpHash, $user->mdpHash)) {
                
                $_SESSION = [
                    'isConnected' => true,
                    'idUser' => $user->idUser,
                    'email' => $user->email,
                    'idRole' => $user->idRole
                ];

                return 0;
            } else {
                return 1;
            }
        }
    }

    public static function register(string $pseudo, string $email, string $mdpHash, $pp) : bool{
        $query = "INSERT INTO USER (pseudo, email, mdpHash, pp, idRole) VALUES (?, ?, ?, ?, 1)";
        $params = [$pseudo, $email, password_hash($mdpHash, PASSWORD_DEFAULT), $pp];

        $req = MonPdo::getInstance()->prepare($query);
        return $req->execute($params);   
    }

}