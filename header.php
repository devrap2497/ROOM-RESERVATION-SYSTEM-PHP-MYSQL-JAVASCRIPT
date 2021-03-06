<?php
 
  session_start();

  require "includes/dbh.inc.php";

  if(isset($_SESSION['id']))
  {

  $id = $_SESSION['id'];
  
  $mysqli = new mysqli('localhost','id12292815_root', 'password', 'id12292815_loginsystem') or die (mysqli_error($mysqli));
  $result = $mysqli->query("SELECT user_type FROM users WHERE idUsers = $id ") or die ($mysqli->error);
  $row = $result->fetch_assoc();

    if($row['user_type'] != "user")
    {
      header("Location: adminindex.php");
    }
  
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" tpye="text/css" href="jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>


    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.jpg">
        </a>
        <ul>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="rooms.php">Rooms</a></li>
          <li><a href="roomreserved.php">Room Reserved</a></li>
          
        </ul>
      </nav>
      <div class="header-login">
      
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">

            <input type="text" name="mailuid" placeholder="E-mail/Username" autocomplete="off" required>
            <input type="password" name="pwd" placeholder="Password" required>
            <button type="submit" name="login-submit">Login</button>
            <a href="forgotpassword.php">Forgot password?</a>
          </form>
          ';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
          </form>';
        }
        ?>
      </div>
    </header>
    <script type="text/javascript" src="jquery.js"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="jquery.datetimepicker.full.js"></script>


