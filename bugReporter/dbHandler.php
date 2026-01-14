<?php

function printError(String $err){
        echo "<h1>The following error has occurred</h1>
            <p>{$err}</p>";
    }
    $dbhandler = null;

    try {
        $dbhandler = new PDO("mysql:host=mysql;dbname=bugsDB;charset=utf8", "root", "qwerty");
    } catch (exception $ex) {
        printError($ex);
    }


    if($dbhandler){
        try{
            $stmt = $dbhandler ->prepare('SELECT * FROM bugs');
            $stmt->execute();
        }catch(exception $ex) {
            printError($ex);
        }
    }


?>