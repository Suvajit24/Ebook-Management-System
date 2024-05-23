<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access");
}
$bookId = $_GET['bookId'] ?? '';
        $conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_SESSION['user_id'];
$sql = "INSERT INTO bookmark (user_id, book_id) VALUES ( ?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ii", $userId, $bookId); 
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        header("location:favorite.php");
    } else {
        echo "Error bookmarking. No rows affected.";
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}
$conn->close();
?>
