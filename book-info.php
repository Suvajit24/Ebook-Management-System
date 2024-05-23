<?php
session_start();
if (isset($_SESSION['user_firstname'])) {
  $user_firstname = $_SESSION['user_firstname'];
}
$userID = $_SESSION['user_id'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Info</title>
  <link rel="stylesheet" href="media_book-info.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <style>
    /*ngjyrat: #4f1f4a,  #11d15f, #f2e5d0*/
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&family=Raleway:ital,wght@0,300;0,400;1,300&family=Roboto:ital,wght@0,400;0,700;1,500&family=Source+Sans+Pro&display=swap");

    *,
    ::after,
    ::before {
      box-sizing: border-box;
      font-family: Roboto;
      font-size: 1em;
      margin: 0;
      padding: 0;
    }

    .navbar {
      grid-column: 1/6;
      min-height: 4.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 2em 6em;
    }

    .nav-menu {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 2rem;
    }

    .hamburger {
      display: none;
      cursor: pointer;
    }

    .bar {
      display: block;
      width: 1.5rem;
      height: 3px;
      margin: 5px auto;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      background-color: #4f1f4a;
    }

    .logo {
      width: 5vw;
      height: 5vh;
    }

    .nav-menu li {
      display: inline-block;
      padding: 0px 1em;
    }

    .nav-menu a,
    .kycu {
      text-decoration: none;
      color: #4f1f4a;
    }

    .nav-menu a:hover {
      border-bottom: solid 2px #4f1f4a;
      transition: all 0.2s ease;
    }

    .kycu,
    .regjistrohu {
      margin-left: auto;
    }

    .nav-menu .regjistrohu {
      background-color: #11d15f;
      color: white;
      padding: 0.5em 1em;
      border-bottom: none;
    }

    .nav-menu .regjistrohu:hover {
      border-bottom: none;
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: auto;
      padding-top: 3em;
      margin-bottom: 5em;
    }

    .book-image {
      display: flex;
      justify-content: center;
      align-content: center;
      position: relative;
    }

    .book-image img {
      position: absolute;
      width: 20vw;
      border-radius: 0.5em;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .book-image::before,
    .book-image::after {
      content: "";
      display: inline-block;
      padding-bottom: 58vh;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .book-image::after {
      background-color: rgba(79, 31, 74, 0.2);
      width: 50%;
      padding-bottom: 50%;
      z-index: -1;
    }

    .book-image::before {
      background-color: rgba(79, 31, 74, 0.1);
      width: 60%;
      padding-bottom: 60%;
      z-index: -2;
    }

    .book-info p {
      width: 70%;
      color: #3a3a3a;
    }

    .book-info h1 {
      font-size: 2rem;
      margin-bottom: 0.8em;
      color: #4f1f4a;
    }

    .book-description {
      line-height: 1.7;
      margin-bottom: 0.5em;
    }

    .book-description:nth-last-child(2) {
      padding-bottom: 1em;
      border-bottom: 1px solid #4f1f4a;
    }

    .product-details {
      height: 10em;
      display: flex;
      flex-direction: column;
      justify-content: space-around;
    }

    .purple-box {
      background-color: #4f1f4a;
      height: 40vh;
    }

    .white-box {
      background-color: #fff;
      height: 60vh;
    }

    .whats-inside-container {
      position: relative;
    }

    .chapter-1 {
      width: 37vw;
      background-color: #f2f2f2;
      position: absolute;
      border-radius: 1em;
      left: 5%;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .chapter-1 h1 {
      width: 90%;
      margin: auto;
      font-size: 2rem;
      padding-top: 1em;
      padding-bottom: 0.5em;
    }

    .chapter-text {
      margin: auto;
      width: 90%;
      background-color: #ffffff;
      overflow: auto;
      line-height: 1.5;
      padding: 1em;
    }

    .whats-inside-lists {
      display: grid;
      grid-template-columns: auto auto;
      grid-template-rows: auto auto auto;
      width: 50vw;
      position: absolute;
      left: 50%;
      top: 25%;
    }

    .whats-inside-lists h1 {
      margin-bottom: 0.5em;
      grid-column: 1/-1;
      font-size: 3rem;
      text-transform: uppercase;
    }

    .whats-inside-lists p {
      margin: 0.5em;
      font-size: 1rem;
      color: #4f1f4a;
      font-weight: 600;
    }

    .square {
      width: 0.5em;
      height: 0.5em;
      stroke: #4f1f4a;
      fill: #4f1f4a;
      margin-right: 0.5em;
    }

    .chapter-details {
      width: 28vw;
      position: absolute;
      left: 50%;
      bottom: 10%;
      color: white;
    }

    .numeric-details {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .chapter-info {
      margin-top: 2em;
    }

    .num {
      font-size: 3.5rem;
    }

    .numeric-details p {
      font-size: 1.5rem;
    }

    .buy {
      padding: 1em;
      background-color: #4f1f4a;
      border: 1px solid #f2f2f2;
      color: #f2e5d0;
      border-radius: 1em;
      margin-top: 2em;
      display: inline-block;
      text-decoration: none;
      text-align: center;
      max-width: 150px;
    }

    .buy:hover {
      background-color: #532a4f;
    }

    .buy.short {
      padding: 0.5em 1em;
      font-size: 0.8rem;
    }

    .buy-buttons {
      display: flex;
      gap: 1em;
    }

    .buy-buttons .buy {
      flex: 1;
    }

    footer {
      margin-top: 4em;
      min-height: 12em;
      padding: 2em;
      display: flex;
      color: #1e1e1e;
      justify-content: space-between;
      border-top: 2px solid #4f1f4a;
    }

    .logo-footer {
      width: 5vw;
      height: 5vh;
      margin-top: 0.8em;
    }

    .info-kompania {
      width: 20%;
      line-height: 1.5;
      overflow: hidden;
    }

    footer a {
      display: block;
      color: #1e1e1e;
      text-decoration: none;
    }

    footer a:hover {
      border-bottom: 1px solid #4f1f4a;
      color: black;
      transition: all 0.3s ease;
    }

    .kontakti-footer h1,
    .social-media h1,
    .nav-footer h1 {
      text-transform: uppercase;
    }

    .social-media,
    .nav-footer,
    .kontakti-footer {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .social-media {
      align-items: center;
    }

    .social-media ion-icon {
      font-size: 1.5em;
    }

    .kontakti-footer ion-icon {
      font-size: 1.1em;
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
  </style>
</head>

<body>
  <nav class="navbar">
    <img src="Fotografite/SVG/Book-Logo.svg" alt="logo" class="logo" />
    <ul class="nav-menu">
      <li class="nav-item"><a href="index.php">Home</a></li>
      <li class="nav-item">
        <a href="contact-us.php">Contact Us</a>
      </li>
      <?php if (isset($user_firstname)) : ?>
        <li class="nav-item dropdown">
          <a class="kycu" href="#">Hello, <?php echo $user_firstname; ?></a>
          <div class="dropdown-content">
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
  <?php
  $bookName = $_GET['bookName'] ?? '';
  $servername = "";
  $username = "";
  $password = "";
  $database = "";
  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM book WHERE name = '$bookName'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $bookDetails = $result->fetch_assoc();
    $Bookid = $bookDetails["book_id"];
  } else {
    echo "Book details not found";
  }
  $userId = $_SESSION['user_id'] ?? null;
  $sqlBookmarkCheck = "SELECT * FROM bookmark WHERE user_id = '$userId' AND book_id = '$Bookid'";
  $resultBookmarkCheck = $conn->query($sqlBookmarkCheck);
  $bookmarked = $resultBookmarkCheck ? ($resultBookmarkCheck->num_rows > 0) : false;
  $conn->close();
  ?>
  <div class="container">
    <div class="book-image">
      <img src="Fotografite/Foto/zero-to-one-large.jpg" alt="Zero to One book" />
      <?php $photoLink = $bookDetails["pic"];
      echo '<img src="' . $photoLink . '" alt="' . $bookDetails["name"] . ' Photo" />';
      ?>
    </div>
    <div class="book-info">
      <h1 class="book-title"><?php echo '<h1>' . $bookDetails["name"] . '</h1>'; ?></h1>
      <p class="book-description">
        <?php echo   $bookDetails["description"]; ?>
      </p>
      <div class="product-details">
        <h3>Details of the book</h3>
        <p>
          <strong>Author:</strong> <?php echo   $bookDetails["author"]; ?>
        </p>
        <p>
          <strong>Publication:</strong> <?php echo   $bookDetails["publisher"]; ?>
        </p>
        <p><strong>Language:</strong> <?php echo   $bookDetails["Language"]; ?></p>
        <div class="buy-buttons">
          <?php if ($bookmarked) : ?>
            <button class="buy" disabled>Bookmarked</button>
          <?php else : ?>
            <button class="buy" onclick="bookmarkBook(<?php echo $Bookid; ?>);">Add to Favorites</button>
          <?php endif; ?>
          <button class="buy" onclick="window.location.href='<?php echo $bookDetails["Link"]; ?>'">Amazon</button>
          <button class="buy" onclick="window.location.href='<?php echo $bookDetails["flip"]; ?>'">Flipkart</button>
        </div>
      </div>
    </div>
  </div>
  <div class="whats-inside-container">
    <div class="white-box">
      <div class="chapter-1">
        <h1>Summary</h1>
        <p class="chapter-text">
          <?php echo   $bookDetails["Summary"]; ?>
        </p>
      </div>
    </div>
    <div class="purple-box">
      <div class="chapter-details">
        <div class="numeric-details">
          <div class="chapter-number">
          </div>
          <div class="page-number">
          </div>
        </div>
      </div>
    </div>
  </div>
  </script>
  <script>
    function bookmarkBook(bookId) {
      <?php if (isset($user_firstname)) : ?>
        <?php if ($bookmarked) : ?>
          alert('Book already bookmarked');
        <?php else : ?>
          window.location.href = 'bookmark.php?bookId=' + encodeURIComponent(<?php echo $Bookid; ?>);
        <?php endif; ?>
      <?php else : ?>
        window.location.href = 'sign-up.html';
      <?php endif; ?>
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>