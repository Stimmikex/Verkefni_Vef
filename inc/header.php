<?php 
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url = trim($actual_link, '/');
  $page_name1 = substr($url, strrpos($url, '/')+1);
  $page_name2 = substr($page_name1, count($page_name1)-1, -4); 
  /*echo substr($url, strrpos($url, '/')+1);*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<nav>
  <div class="nav-wrapper">
    <a href="index.php" class="brand-logo"><img src="img/carpool.png"></a>
    <ul id="nav-mobile" class="right">
      <li><a href="search.php">Search</a></li>
      <?php
        if ($logged === 'in')
        {
          echo '<li><a href="profile.php">Profile</a></li>';
          echo '<li><a href="insert_request.php">Ask ride</a></li>';
          echo '<li><a href="insert_ride.php">Add ride</a></li>';
          echo '<li><a href="logout.php">Log out</a></li>';
        }
        else
        {
          echo '<li><a href="register.php">Register</a></li>';
          echo '<li><a href="login.php">Login</a></li>';
        }
      ?>
    </ul>
  </div>
</nav>
<div class="nav-drop"> 
  <button class='dropdown-button btn' href='#' data-activates='dropdown1'>Menu</button>
  <ul id='dropdown1' class='dropdown-content'>
      <li><a href="search.php">Search</a></li>
      <li class="divider"></li>
      <?php
        if ($logged === 'in')
        {
          echo '<li><a href="profile.php">Profile</a></li>';
          echo '<li class="divider"></li>';
          echo '<li><a href="insert_request.php">Ask ride</a></li>';
          echo '<li class="divider"></li>';
          echo '<li><a href="insert_ride.php">Add ride</a></li>';
          echo '<li class="divider"></li>';
          echo '<li><a href="logout.php">Log out</a></li>';
          echo '<li class="divider"></li>';
        }
        else
        {
          echo '<li><a href="register.php">Register</a></li>';
          echo '<li class="divider"></li>';
          echo '<li><a href="login.php">Login</a></li>';
          echo '<li class="divider"></li>';
        }
      ?>
      <li class="end-nav">close</li>
  </ul>
</div>
<li class="divider"></li>
<div class="main">