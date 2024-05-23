<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&family=Raleway:ital,wght@0,300;0,400;1,300&family=Roboto:ital,wght@0,400;0,700;1,500&family=Source+Sans+Pro&display=swap");

    *,
    ::after,
    ::before {
      box-sizing: border-box;
      font-family: Roboto;
      font-size: 1em;
    }

    /*ngjyrat: #4f1f4a,  #11d15f, #f2e5d0*/
    header {
      width: 75vw;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      color: #4f1f4a;
      max-width: 1080px;
      margin: auto;
      margin-top: 3em;
      margin-bottom: 2.3em;
    }

    .logo {
      width: 5vw;
      height: 5vh;
    }

    .nav-links li {
      display: inline-block;
      padding: 0px 1em;
    }

    .nav-links a,
    .kycu,
    .regjistrohu {
      text-decoration: none;
      color: #4f1f4a;
    }

    .cta {
      margin-left: auto;
    }

    .regjistrohu {
      background-color: #11d15f;
      color: white;
      padding: 0.5em 1em;
      margin: 0em 2em;
    }

    .container {
      width: 80vw;
      margin: auto;
      height: auto;
      position: relative;
    }

    .right-box,
    .left-box {
      width: 48%;
      height: 80vh;
      display: inline-block;
      margin: -2px;
    }

    .right-box {
      background-color: #4f1f4a;
      border-radius: 1em 0em 0em 1em;
    }

    .left-box {
      border-radius: 0em 1em 1em 0em;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .sign-up-box {
      width: 35vw;
      height: 65vh;
      background-color: #fff;
      position: absolute;
      display: inline-block;
      margin-top: -30em;
      margin-left: 33em;
      border-radius: 1em;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      overflow-y: auto;
      overflow-x: hidden;
    }

    .sign-up-box h1 {
      font-size: 2.5rem;
      color: #4f1f4a;
      text-align: center;
      margin-bottom: 1em;
    }

    input[type="email"],
    input[type="password"] {
      width: 80%;
      padding: 1em;
      display: block;
      border-radius: 0.2em;
      margin: auto;
      margin-top: 1.5em;
      border: 1px solid #ccc;
      background-color: white;
    }

    .sign-up-box a {
      width: 10vw;
      height: auto;
      padding: 0.5em;
      background-color: #4f1f4a;
      color: #f2e5d0;
      border-radius: 0.5em;
      margin: 4em 7em;
      display: inline-block;
      text-decoration: none;
      text-align: center;
    }

    input[type="password"]:focus,
    input[type="email"]:focus {
      outline: none;
      box-shadow: 0 0 3px #4f1f4a;
    }

    /*****FOOTER*****/
    footer {
      margin-top: 4em;
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

    .scroll-box {
      max-height: 300px;
      overflow-y: scroll;
    }

    .book-item {
      padding: 1em;
      border-bottom: 1px solid #ccc;
    }

    .book-item p {
      margin: 0;
    }

    .book-item form {
      margin-top: 0.5em;
      max-width: 100px;
    }

    .book-item button {
      /* Adjust button styles */
      background-color: #4f1f4a;
      color: white;
      padding: 0.5em 1em;
      border: none;
      border-radius: 0.2em;
      cursor: pointer;
    }
  </style>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <header>
    <img src="Fotografite\SVG\Book-Logo.svg" alt="logo" class="logo" />
    <nav>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <div class="right-box"></div>
    <div class="left-box"></div>
  </div>
  <div class="sign-up-box">
    <h1>FAVORITES</h1>
    <div class="container">
      <div class="scroll-box">
        <?php
        $servername = "";
        $username = "";
        $password = "";
        $database = "";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $userID = $_SESSION['user_id'] ?? null;
        $sql = "SELECT b.* FROM bookmark bm
    JOIN book b ON bm.book_id = b.book_id
    WHERE bm.user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        if ($stmt->errno) {
          echo "Error executing query: " . $stmt->error;
        }
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="book-item">';
            echo '<p>' . $row["name"] . '</p>';
            echo '<form method="post" action="remove-from-favorites.php">';
            echo '<input type="hidden" name="book_id" value="' . $row['book_id'] . '">';
            echo '<button type="submit" name="remove_from_favorites">Remove</button>';
            echo '</form>';
            echo '</div>';
          }
        } else {
          echo "No favorite books found";
        }
        $stmt->close();
        $conn->close();
        ?>
      </div>
    </div>
  </div>
</body>

</html>