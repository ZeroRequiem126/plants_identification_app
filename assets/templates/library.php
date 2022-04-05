<?php
    function dbconnect() {
        $dsn = 'mysql:dbname=tree_identification_app;host=localhost:8889';
        $user = 'root';
        $password = 'root';

        try{
            $dbh = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
            return $dbh;
        } catch(PDOException $e){
            echo '接続失敗'. $e->getMessage();
            exit();
        };
    };