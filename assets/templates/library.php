<?php
    function dbconnect() {
        $dsn = 'mysql:dbname=218vy_mydb;host=mysql90.conoha.ne.jp;charset=utf8mb4';
        $user = '218vy_noboru';
        $password = 'tsu9689da2!';
        
        try{
            $dbh = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,`
            ]);
            return $dbh;
        } catch(PDOException $e){
            echo '接続失敗'. $e->getMessage();
            exit();
        };
    };