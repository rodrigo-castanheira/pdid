<?php include "dbHandler.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$product = "";
$version = "";
$hardware = "";
$os = "";
$frequency = "";
$solution = "";

// 1. Fetch existing data if editing
if ($id) {
    global $dbHandler;
    try {
        $stmt = $dbHandler->prepare("SELECT * FROM bugs WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $product = $row['product'];
            $version = $row['version'];
            $hardware = $row['hardware'];
            $os = $row['os'];
            $frequency = $row['frequency'];
            $solution = $row['solution'];
        }
    } catch (Exception $ex) {
        printError($ex);
    }
}


function ErrorChecks(){
    global $dbHandler;

    $postId = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    $prdc = filter_input(INPUT_POST, "product", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ver = filter_input(INPUT_POST, "version", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hw = filter_input(INPUT_POST, "hw", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $os = filter_input(INPUT_POST, "os", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $frq = filter_input(INPUT_POST, "frq", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sol = filter_input(INPUT_POST, "solution", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
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

else {
        if ($dbHandler) {
            try {
                // 3. Switch between UPDATE and INSERT
                if ($postId) {
                    // Update existing record
                    $stmt = $dbHandler->prepare("UPDATE `bugs` SET `product`=:product, `version`=:version, `hardware`=:hardware, `os`=:os, `frequency`=:frequency, `solution`=:solution WHERE id=:id");
                    $stmt->bindParam(':id', $postId);
                } else {
                    // Insert new record
                    $stmt = $dbHandler->prepare("INSERT INTO `bugs` (`product`, `version`, `hardware`, `os`, `frequency`, `solution`) VALUES (:product, :version, :hardware, :os, :frequency, :solution)");
                }

                $stmt->bindParam(':product', $prdc);
                $stmt->bindParam(':version', $ver);
                $stmt->bindParam(':hardware', $hw);
                $stmt->bindParam(':os', $os);
                $stmt->bindParam(':frequency', $frq);
                $stmt->bindParam(':solution', $sol);
                $stmt->execute();
                
                echo "<div>Bug " . ($postId ? "Updated" : "Submitted") . " Successfully<div>";
                
            } catch (exception $ex) {
                printError($ex);
            }
        }
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
    <input type="hidden" name="id" value="<?php echo $id; ?>">

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
        <p> <a href="./bugReporter.php">Go to Homepage</a></p>
</body>

</html>