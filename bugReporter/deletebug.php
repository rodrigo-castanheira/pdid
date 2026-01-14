<?php
include("dbHandler.php");

    $id=filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if(empty($id)){
        die('Invalid or missing bug ID');
    }
    
    /** @var PDO $dbHandler */
    $dbHandler = createDbHandler();

    try{
        $stmt = $dbHandler->prepare('DELETE FROM bugsDB WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();
    }
    catch(PDOException $e){
        die("Delete error: " . $e->getMessage());
    }

    header('Location: bugReporter.php')
?>