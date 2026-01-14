<?php include "dbHandler.php";

function ErrorChecks(){
    global $dbHandler;

    $prdc = filter_input(INPUT_POST["product"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ver = filter_input(INPUT_POST["version"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hw = filter_input(INPUT_POST["hw"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $os = filter_input(INPUT_POST["os"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $frq = filter_input(INPUT_POST["frq"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sol = filter_input(INPUT_POST["solution"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $errors = array();

    if (empty($prdc)) {
        $errors[] = "Product field is empty.";
    }
    if (empty($ver)) {
        $errors[] = "Version field is empty.";
    }
    if (empty($hw)) {
        $errors[] = "Hardware field is empty.";
    }
    if (empty($os)) {
        $errors[] = "OS field is empty.";
    }
    if (empty($frq)) {
        $errors[] = "Frequency field is empty.";
    }
    if (empty($sol)) {
        $errors[] = "Solution field is empty.";
    }

    if(!empty($errors)){
        foreach($errors as $error){
            echo "<div>$error<div>";
        }
    }

    else{
        if ($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("INSERT INTO `bugs` (`product`, `version`, `hardware`, `os`, `frequency`, `solution`) VALUES (:product, :version, :hardware, :os, :frequency, :solution)");
                $stmt->bindParam(':product', $prdc, PDO::PARAM_STR);
                $stmt->bindParam(':version', $ver, PDO::PARAM_STR);
                $stmt->bindParam(':hardware', $hw, PDO::PARAM_STR);
                $stmt->bindParam(':os', $os, PDO::PARAM_STR);
                $stmt->bindParam(':frequency', $frq, PDO::PARAM_STR);
                $stmt->bindParam(':solution', $sol, PDO::PARAM_STR);
                $stmt->execute();
            } catch (exception $ex) {
                printError($ex);
            }
        }
        echo "<div>Bug Submitted Successfully<div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bug</title>
</head>

<body>
   <?php if ($_SERVER["REQUEST_METHOD"] === "POST") {
         ErrorChecks();} ?>
    <form action="" method="POST">
        <p>
            <label for="prdc">Product Name:</label>
            <input type="text" name="product" id="prdc">
        </p>

        <p>
            <label for="ver">Version:</label>
            <input type="text" name="version" id="ver">
        </p>
        
        <p>
            <label for="hw">Hardware:</label>
            <input type="text" name="hw" id="hw">
        </p>

        <p>
            <label for="os">OS:</label>
            <input type="text" name="os" id="os">
        </p>

        <p>
            <label for="frq">Frequency:</label>
            <input type="text" name="frq" id="frq">
        </p>

        <p>
    
            <label for="sol">Solutions:</label>
            <input type="text" name="solution" id="sol">
        </p>
        <input type="submit" value="Sumbit Bug">
    </form>
</body>

</html>