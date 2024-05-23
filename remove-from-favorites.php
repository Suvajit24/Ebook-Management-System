<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_favorites'])) {
                $book_id = $_POST['book_id'];
                $servername = "";
        $username = "";
        $password = "";
        $database = "";
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
                $sql = "DELETE FROM bookmark WHERE user_id = $user_id AND book_id = $book_id";
        if ($conn->query($sql) === TRUE) {
            header("location:favorite.php");
        } else {
            echo "Error removing book from favorites: " . $conn->error;
        }
                $conn->close();
    }
} else {
    echo "User not logged in";
}
?>
