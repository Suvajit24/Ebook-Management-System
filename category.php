<?php
 
                $conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['category'])) {
    $category = $_GET['category'];
        $sql = "SELECT * FROM book WHERE category = '$category' ORDER BY category ASC";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        echo '<div class="trend-book" onclick="handleBookClick(\'' . $row["name"] . '\')">';
            echo '<img src="' . $row["pic"] . '" alt="' . $row["name"] . '" />';
            echo '<a href="#">' . $row["name"] . '</a>';
            echo '<p>' . $row["author"] . '</p>';
            echo '</div>';
        }
    } else {
        echo "No books found in the selected category";
    }
} else {
    echo "Category parameter not set";
}
$conn->close();
?>
<script>
    function handleBookClick(bookName) {
        <?php if (isset($user_firstname)) : ?>
            window.location.href = 'book-info.php?bookName=' + encodeURIComponent(bookName);
        <?php else : ?>
            window.location.href = 'login.php';
        <?php endif; ?>
    }
</script>
