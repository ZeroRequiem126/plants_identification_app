<?php
    function dbconnect() {
        $dsn = 'mysql:dbname=heroku_ed09d36c9723ee2;host=us-cdbr-east-05.cleardb.net;charset=utf8mb4';
        $user = 'bd34269043211f';
        $password = '6120bfde';
        
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