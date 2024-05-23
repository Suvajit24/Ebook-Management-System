<?php
 $servername = "";
        $username = "";
        $password = "";
        $database = "";
                $conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$searchTerm = $_GET['searchTerm'] ?? '';
$sql = "SELECT name FROM book WHERE name LIKE '%$searchTerm%' LIMIT 5";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $suggestions = array();
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['name'];
    }
    echo json_encode($suggestions);
} else {
    echo json_encode(array());
}
$conn->close();
?>
