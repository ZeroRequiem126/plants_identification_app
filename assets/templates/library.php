<?php
    function dbconnect() {
        $dsn = 'mysql:dbname=heroku_40d84b790f4e885;host=us-cdbr-east-05.cleardb.net;charset=utf8mb4';
        $user = 'b2e469a773bc99';
        $password = '2c381f19';

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