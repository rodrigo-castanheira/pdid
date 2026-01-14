<?php

function printError(String $err){
        echo "<h1>The following error has occurred</h1>
            <p>{$err}</p>";
    }
    $dbHandler = null;

    try {
        $dbHandler = new PDO("mysql:host=mysql;dbname=bugsDB;charset=utf8", "root", "qwerty");
    } catch (exception $ex) {
        printError($ex);
    }


    if($dbHandler){
        try{
            $stmt = $dbHandler ->prepare('SELECT * FROM bugs');
            $stmt->execute();
        }catch(exception $ex) {
            printError($ex);
        }
    }


?>