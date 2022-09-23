<?php

class Posts
{

    public static function listAll(){
        $query = 'SELECT idPost, USER.pseudo, POST.Desc, COUNT(), tweet.date from users join tweet on tweet.idUser = users.idUser ORDER BY DATE DESC';
        $params = [];

        $req = MonPdo::getInstance()->prepare($query);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute($params);

        return $req->fetch();
    }
}
