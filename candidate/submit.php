<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["description"]) && isset($_FILES["cv"])) {

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $description = $_POST["description"];
        $cv = $_FILES["cv"]["name"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Adresse e-mail invalide'); window.location='index.php';</script>";
        }

        $allowed_extensions = array("pdf", "docx");
        $cv_extension = pathinfo($cv, PATHINFO_EXTENSION);
        if (!in_array($cv_extension, $allowed_extensions)) {
            echo "<script>alert('Extension de fichier CV invalide'); window.location='index.php';</script>";
        }

        $data = array(
            "firstName" => $firstName,
            "lastName" => $lastName,
            "email" => $email,
            "description" => $description,
            "cv" => $cv
        );

        $json = json_encode($data);

        file_put_contents("data.json", $json);

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
        move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file);

        echo "<script>alert('Votre message a bien été envoyé'); window.location='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Données du formulaire manquantes'); window.location='index.php';</script>";
    }
}

?>


