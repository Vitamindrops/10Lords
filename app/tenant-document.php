<?php
// Initialize the session
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: index.html");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon/favicon.ico" sizes="16x16" type="image/png">
  <link rel="shortcut icon" href="ico2.ico" type="image/x-icon">
  <meta charset="utf-8">
  <title>Tenant Documents</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="css/myStyle.css">
  <link href='css/navStyle.css' rel='stylesheet' type='text/css'>
  <link href='css/home-style.css' rel='stylesheet' type='text/css'>

  <script src="js/script.js"></script>
  <link rel="css/stylesheet" href="index-style.css">
</head>

<div id="main" class="main">

</div>
<body>
  <header class="stickyNav">
    <div class="mainHeader background-box background-color ", style="background-color:#B71C1C">
      <div class="mainHeader-grid fs">

        <div class="grid-column-33-per content-align-left">
          <div class="menuNavButton">
            <span onclick="toggleNav()">
              <img class="menuNavImg" width="25" height="25" src="MenuNav.png" alt="Menu Navigation Button">
            </span>
          </div>

          <nav id="navigationBar" class="sideNav background-color">
            <div class="navContainer">
              <ul class="navMenu">

                <li class="navItems">
                  <a href="tenant-home.php">Home</a>
                </li>

                    <li class="navItems">
                      <a href="tenant-chat.php">Chat</a>
                    </li>

                    <li class="navItems">
                      <a href="tenant-account.php">Account </a>
                    </li>

                    <li class="navItems">
                      <a href="tenant-photo.php">Photos</a>
                    </li>

                    <li class="navItems">
                     <a>View Documents</a>
                   </li>

                    <li class="navItems">
                      <a href="logout.php" class="btn btn-danger">Sign Out </a>
                    </li>
              </ul>
            </div>
          </nav>
        </div>

        <div class="grid-column-33-per content-align-center">
          <div class="headerLogo">
            <p id="title"> 10 Lords </p>
          </div>
        </div>

        <div class="grid-column-33-per content-align-right">
          <div class="socialLayout">

          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="main" class="main">

    <h1>View Documents</h1>
    <?php
    $property_id = $_SESSION['property_id'];
    $result = mysqli_query($link, "SELECT document, document_text FROM document WHERE property_id = $property_id ");
    ?>

    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      echo "<img src='images/".$row['document']."' >";
      echo "<p>".$row['document_text']."</p>";
      echo "</div>";
    }
    ?>
  </div>
</body>
</html>
