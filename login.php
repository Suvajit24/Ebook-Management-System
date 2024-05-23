<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['Password'];
      $servername = "";
        $username = "";
        $password = "";
        $database = "";
                $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
                $stmt = $conn->prepare("SELECT user_id,email, password,firstName FROM registration WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($user_id,$dbemail, $dbpassword, $dbfirstName);
        $stmt->fetch();
        if ($dbemail === $email && $password === $dbpassword) {
             $_SESSION['user_firstname'] = $dbfirstName;
            $_SESSION['user_id'] = $user_id; 
            header('Location: index.php');
            exit();
        } else {
                        echo "Invalid email or password. Please try again.";
        }
        $stmt->close();
        $conn->close();
    }
}
?>
