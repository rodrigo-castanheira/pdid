<?php
include("dbHandler.php");

    $id=filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if(empty($id)){
        die('Invalid or missing bug ID');
    }
    
    try{
        $stmt = $dbHandler->prepare('DELETE FROM bugs WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();
    }
    catch(PDOException $e){
        die("Delete error: " . $e->getMessage());
    }

    header('Location: bugReporter.php');
?>