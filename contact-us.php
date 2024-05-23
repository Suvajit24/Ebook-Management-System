<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $username = $_POST['emri'];
  $message = $_POST['message'];
  storeFeedback($email, $username, $message);
  echo "Thank you, $username! We will contact you soon. Your message: $message";
}
function storeFeedback($email, $username, $message) {
  $servername = "";
        $username = "";
        $password = "";
        $database = "";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $email = mysqli_real_escape_string($conn, $email);
  $username = mysqli_real_escape_string($conn, $username);
  $message = mysqli_real_escape_string($conn, $message);
  $query = "INSERT INTO feedback (email, username, message) VALUES ('$email', '$username', '$message')";
  $result = $conn->query($query);
  if (!$result) {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <style>/*ngjyrat: #4f1f4a,  #11d15f, #f2e5d0*/
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&family=Raleway:ital,wght@0,300;0,400;1,300&family=Roboto:ital,wght@0,400;0,700;1,500&family=Source+Sans+Pro&display=swap");
      *,
      ::after,
      ::before {
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 1em;
      }
      header {
        width: 75vw;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        color: #4f1f4a;
        max-width: 1080px;
        margin: auto;
        margin-top: 3em;
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
        width: auto;
        height: 100vh;
        background-color: white;
      }
      .send-message {
        width: 60vw;
        height: 70vh;
        background-color: #f2e5d0;
        border-radius: 0.5em;
        margin: 4em 0em 0em 20em;
        display: inline-block;
        position: relative;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      }
      .contact-us {
        width: 25vw;
        height: 55vh;
        background-color: #4f1f4a;
        margin: -23.5em 0em 8em 10em;
        color: #f2e5d0;
        position: absolute;
        font-size: 1.2rem;
        padding: 1em;
        border-radius: 0.5em;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      }
      .contact-us h2 {
        font-size: 1.5rem;
        padding: 0.7em 0em;
      }
      .form {
        width: 60%;
        height: 70%;
        margin: 2em 0em 0em 20em;
      }
      .form h1 {
        font-size: 2.5rem;
        color: #4f1f4a;
      }
      .send-message a {
        width: 10vw;
        height: auto;
        padding: 0.5em;
        background-color: #4f1f4a;
        color: #f2e5d0;
        border-radius: 0.5em;
        margin-top: 1em;
        display: inline-block;
        text-decoration: none;
        text-align: center;
      }
      input[type="text"],
      input[type="email"],
      textarea {
        width: 70%;
        height: 10%;
        padding: 0.5em;
        display: block;
        border-radius: 0.2em;
        margin-top: 0.7em;
        border: 1px solid #ccc;
        background-color: white;
      }
      input[type="text"]:focus,
      input[type="email"]:focus, textarea:focus  {
        outline: none;
        box-shadow: 0 0 3px #4f1f4a;
      }
      textarea {
        resize: none;
      }
      .contact-us a{
      text-decoration: none;
      color: #f2e5d0
      }
      .contact-us ion-icon {
        font-size: 1.5em;
        color: #f2e5d0;
      }
      /*****FOOTER*****/
      footer {
        margin-top: 2em;
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
      footer a:hover{
        border-bottom: 1px solid #4f1f4a;
        color: black;
        transition: all 0.3s ease;
      }
      .kontakti-footer h1,
      .social-media h1,
      .nav-footer h1 {
        text-transform: uppercase;
      }
      .social-media, .nav-footer, .kontakti-footer {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      .social-media{
        align-items: center;
      }
      .social-media ion-icon {
        font-size: 1.5em;
      }
      .kontakti-footer ion-icon{
        font-size: 1.1em;
      }
      </style>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("contactForm");
        form.addEventListener("submit", function (event) {
          event.preventDefault();
          const username = document.getElementById("emri").value;
          const email = document.getElementById("email").value;
          const message = document.getElementById("message").value;
          const isEmailRegistered = false;
          if (isEmailRegistered) {
            alert("Email is already registered!");
          } else {
            const messageBox = document.getElementById("messageBox");
            messageBox.innerHTML = `Thank you, ${username}! We will contact you soon. Your message: ${message}`;
            form.reset(); // Reset the form after submission
          }
        });
      });
    </script>
  </head>
  <body>
    <header>
      <img src="Fotografite/SVG/Book-Logo.svg" alt="logo" class="logo" />
      <nav>
        <ul class="nav-links">
          <li><a href="index.php">Home</a></li>
         </ul>
      </nav>
    </header>
    <div class="container">
      <div class="send-message">
<div class="form">
  <h1>Get in Touch</h1>
  <form id="contactForm" method="post" action="index.php">
    <div id="messageBox"></div>
    <input type="email" id="email" name="email" placeholder="Email" required />
    <input type="text" id="emri" name="emri" placeholder="Username" required />
    <textarea id="message" name="message" placeholder="Your Message" rows="4" required></textarea>
    <center><button type="submit">SEND</button></center>
  </form>
</div>
      </div>
      <div class="contact-us">
        <h2>Contact Details</h2>
        <p>
          <a href="https://www.google.com/maps?q=chitkara+baddi&rlz=1C1SQJL_enIN923IN923&um=1&ie=UTF-8&sa=X&ved=2ahUKEwj0tcOYjaT6AhXdgGMGHe0jBg4Q_AUoAnoECAMQBA"
            ><ion-icon name="location-outline"></ion-icon>Dr. B.C. Roy Engineering College,  Durgapur</a
          >
        </p>
        <p>
          <a href="mailto:funkyjaeger@gmail.com"
            ><ion-icon name="mail-outline"></ion-icon>librosphere00@gmail.com</a
          >
        </p>
        <p>
          <a href="tel:+383(0)45 123 123"
            ><ion-icon name="call-outline"></ion-icon> +91 1234567890</a
          >
        </p>
      </div>
    </div>
  </body>
</html>
