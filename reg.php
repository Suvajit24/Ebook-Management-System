<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST['Name'];
    $lastName = $_POST['Mbiemri'];
    $email = $_POST['Email'];
    $password = $_POST['Pasword'];
    $cpass = $_POST['cpass'];
    if ($password !== $cpass) {
        echo "Password and Confirm Password do not match.";
    } else {
        $servername = "";
        $username = "";
        $password = "";
        $database = "";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die('Connection failed... ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT * FROM registration WHERE email=?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                header('location: sign-up.html?error=email_exists');
            } else {
                $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, email, password, cpass) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param('sssss', $firstName, $lastName, $email, $password, $cpass);
                if ($stmt->execute()) {
                    header('location: sign-up.html');
                } else {
                    echo "Error: " . $conn->error;
                }
            }
            $stmt->close();
            $conn->close();
        }
    }
}
?>
