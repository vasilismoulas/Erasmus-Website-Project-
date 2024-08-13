<?php
include('dbconnect.php');
session_start();

$name = $_POST['name'];
$lastname = $_POST['lastName'];
$am = $_POST['am'];
$university1 = $_POST['university1'];
$university2 = $_POST['university2'];
$university3 = $_POST['university3'];
$percentPassed = $_POST['percentPassed'];
$averagePassed = $_POST['averagePassed'];
$engLevel = $_POST['engLevel'];
$addLang = $_POST['addLang'];
$grades = $_FILES['grades'];
$certEng = $_FILES['certEng'];
$certOtherLang = isset($_FILES['certOtherLang']) ? $_FILES['certOtherLang'] : null;

$con = dbconnect();
if (!$con)
{
echo json_encode("problem in the connection");
}
else
{
    // Generate a unique folder name based on request ID or timestamp
$requestFolderName = uniqid(); // You can use uniqid() to generate a unique folder name

// Directory where the uploaded files will be stored
$uploadDir = '../requests/';

// Create the new folder for the current request
$requestFolder = $uploadDir . $requestFolderName;
if (!mkdir($requestFolder, 0777, true)) {
    echo json_encode("Unable to create request folder");
    exit; // Stop further execution if folder creation fails
}

    
    // Move uploaded files to the server directory
    if (isset($grades['name']) && $grades['name'] && isset($grades['size']) && $grades['size'] > 0) {
        // Prepare file names
        $gradesFileName = $requestFolder . '/' . basename($_FILES['grades']['name']);
        // File is uploaded
        move_uploaded_file($grades['tmp_name'], $gradesFileName);
        $gradesContent = file_get_contents($gradesFileName);
        $gradesFileName2 = 'requests/' .$requestFolderName.'/'. basename($_FILES['grades']['name']);
    } else {
        // File is not uploaded
        $gradesContent = NULL;
    }
    
    // Repeat the same logic for $certEng, with additional checks
    
    if (isset($certEng['name']) && $certEng['name'] && isset($certEng['size']) && $certEng['size'] > 0) {
        $certEngFileName = $requestFolder . '/' . basename($_FILES['certEng']['name']);
        // File is uploaded
        move_uploaded_file($certEng['tmp_name'], $certEngFileName);
        $certEngContent = file_get_contents($certEngFileName);
        $certEngFileName2 = 'requests/' .$requestFolderName.'/'. basename($_FILES['certEng']['name']);
    } else {
        // File is not uploaded
        $certEngContent = NULL;
    }
    
    // Check if certOtherLang file is uploaded
    if (isset($certOtherLang['name']) && $certOtherLang['name'] && isset($certOtherLang['size']) && $certOtherLang['size'] > 0) {
        $certOtherLangFileName = $requestFolder . '/' . basename($_FILES['certOtherLang']['name']);
        // File is uploaded
        move_uploaded_file($certOtherLang['tmp_name'], $certOtherLangFileName);
        $certOtherLangContent = file_get_contents($certOtherLangFileName);
        $certOtherLangFileName2 = 'requests/' .$requestFolderName.'/'. basename($_FILES['certOtherLang']['name']);
    } else {
        $certOtherLangFileName = NULL;
        // File is not uploaded
        $certOtherLangContent = NULL;
    }
    
    // Επιλογή της βάσης δεδομένων
    mysqli_select_db($con, "vasilis");

     
     // Prepare the SQL statement with placeholders
$sql = "INSERT INTO requests (name, lastname, am, university1, university2, university3, percentPassed, averagePassed, engLevel, addLang, grades, gradesPath, certEng, certEngPath, certOtherLang, certOtherLangPath) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Create a prepared statement
$stmt = mysqli_prepare($con, $sql);

// Bind the parameters to the statement
mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $name, $lastname, $am, $university1, $university2, $university3, $percentPassed, $averagePassed, $engLevel, $addLang, $gradesContent, $gradesFileName2, $certEngContent, $certEngFileName2, $certOtherLangContent, $certOtherLangFileName2);

     mysqli_stmt_execute($stmt);
 
     // Close the statement
     mysqli_stmt_close($stmt);
    
}
mysqli_close($con);
echo $uploadDir;

?>