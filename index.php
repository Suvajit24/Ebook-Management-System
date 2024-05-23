<?php
session_start();
if (isset($_SESSION['user_firstname'])) {
    $user_firstname = $_SESSION['user_firstname'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Ebooks</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media_queries_index.css" />
    <style>
        .search-bar {
            display: flex;
            align-items: center;
            position: relative;
        }
        .search-bar input {
            flex: 1;
            padding: 0.5em;
            margin-right: 0.5em;
            border: 1px solid #ccc;
        }
        .search-bar button {
            padding: 0.5em 1em;
            background-color: #4f1f4a;
            color: white;
            border: none;
            cursor: pointer;
        }
        #suggestionsContainer {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        .suggestion {
            padding: 0.5em;
            cursor: pointer;
        }
        .suggestion:hover {
            background-color: #B26C2B;
        }
        .popular-books {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .trend-book {
            width: 23%;
            margin: 10px;
            text-align: center;
        }
        .trend-book img {
            width: 100%;
            height: auto;
        }
        @media screen and (max-width: 768px) {
            .trend-book {
                width: 48%;
            }
        }
        #upperArrow {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4f1f4a;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            display: none;
            z-index: 999;
        }
        #upperArrow ion-icon {
            font-size: 24px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown {
            display: inline-block;
        }
        .dropbtn {
            background-color: #4f1f4a;
            color: white;
            padding: 0.5em;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            cursor: pointer;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
    <script>
        var selectedSuggestion = '';
        function fetchSuggestions() {
            var searchTerm = document.getElementById('bookSearch').value;
            var suggestionsContainer = document.getElementById('suggestionsContainer');
            if (searchTerm.trim() !== '') {
                fetch('search-suggestions.php?searchTerm=' + encodeURIComponent(searchTerm))
                    .then(response => response.json())
                    .then(suggestions => {
                        suggestionsContainer.innerHTML = '';
                        suggestions.forEach(suggestion => {
                            var suggestionItem = document.createElement('div');
                            suggestionItem.classList.add('suggestion');
                            suggestionItem.textContent = suggestion;
                            suggestionItem.addEventListener('click', function() {
                                selectedSuggestion = suggestion;
                                document.getElementById('bookSearch').value = suggestion;
                                suggestionsContainer.innerHTML = '';
                            });
                            suggestionsContainer.appendChild(suggestionItem);
                        });
                    })
                    .catch(error => console.error('Error fetching suggestions:', error));
            } else {
                suggestionsContainer.innerHTML = '';
            }
        }
        function searchBooks() {
            var searchTerm = selectedSuggestion !== '' ? selectedSuggestion : document.getElementById('bookSearch').value;
            if (searchTerm.trim() !== '') {
                <?php if (isset($user_firstname)) : ?>
                    window.location.href = 'book-info.php?bookName=' + encodeURIComponent(searchTerm);
                <?php else : ?>
                    window.location.href = 'sign-up.html?bookName=' + encodeURIComponent(searchTerm);
                <?php endif; ?>
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <img src="Fotografite/SVG/Book-Logo.svg" alt="logo" class="logo" />
            <ul class="nav-menu">
                <div class="dropdown">
                    <button class="dropbtn">Categories</button>
                    <div class="dropdown-content">
                        <?php
                        $servername = "";
                        $username = "";
                        $password = "";
                        $database = "";
                        $conn = new mysqli($servername, $username, $password, $database);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT DISTINCT category FROM book";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<a href="#" onclick="filterByCategory(\'' . $row["category"] . '\')">' . $row["category"] . '</a>';
                            }
                        } else {
                            echo "No categories found";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
                <div class="search-bar">
                    <input type="text" id="bookSearch" placeholder="Search by Book Name" oninput="fetchSuggestions()" />
                    <button onclick="searchBooks()">Search</button>
                    <div id="suggestionsContainer"></div>
                </div>
                <li class="nav-item"><a href="index.php">Home</a></li>
                <li class="nav-item">
                    <a href="contact-us.php">Contact Us</a>
                </li>
                <?php if (isset($user_firstname)) : ?>
                    <li class="nav-item dropdown">
                        <a class="kycu" href="#">Hello,
                            <?php echo $user_firstname; ?>
                        </a>
                        <div class="dropdown-content">
                            <a class="searchsuggestioncontainer" href="#" onclick="showFavorites()">Favorites</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item"><a class="kycu" href="sign-up.html">Sign In</a></li>
                    <li class="nav-item"><a class="regjistrohu" href="regjistrohu.html">Register</a></li>
                <?php endif; ?>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
        <div class="header-section">
            <h1>Read With Us</h1>
            <p>Explore new worlds from world-famous authors</p>
            <a class="read-more" href="javascript:void(0);" onclick="scrollToTrending()">Book Info</a>
        </div>
        <h2 id="trending-section" class="ne-trend">Trending Now</h2>
        <div class="popular-books" id="categoryBooksContainer">
            <?php
            $servername = "";
            $username = "";
            $password = "";
            $database = "";
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM book";
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
                echo "No books found";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <div id="upperArrow" onclick="scrollToTop()">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </div>
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        function toggleUpperArrowVisibility() {
            var upperArrow = document.getElementById('upperArrow');
            if (upperArrow) {
                upperArrow.style.display = window.scrollY > 100 ? 'block' : 'none';
            }
        }
        window.addEventListener('scroll', toggleUpperArrowVisibility);
    </script>
    <script>
        function showFavorites() {
            <?php if (isset($user_firstname)) : ?>
                window.location.href = 'favorite.php';
            <?php else : ?>
                window.location.href = 'sign-up.html';
            <?php endif; ?>
        }
    </script>
    <script>
        function handleBookClick(bookName) {
            <?php if (isset($user_firstname)) : ?>
                window.location.href = 'book-info.php?bookName=' + encodeURIComponent(bookName);
            <?php else : ?>
                window.location.href = 'sign-up.html';
            <?php endif; ?>
        }
        function scrollToTrending() {
            var trendingSection = document.getElementById('trending-section');
            if (trendingSection) {
                trendingSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>
    <script>
        function filterByCategory(category) {
            window.location.href = 'category.php?category=' + encodeURIComponent(category);
        }
    </script>
    <script>
        function filterByCategory(category) {
            fetch('category.php?category=' + encodeURIComponent(category))
                .then(response => response.text())
                .then(data => {
                    document.getElementById('categoryBooksContainer').innerHTML = data;
                    scrollToTrending();
                })
                .catch(error => console.error('Error fetching category books:', error));
        }
    </script>
    <script src="menu.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>