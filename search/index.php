<?php include('search.php'); 
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Search</title>
  </head>
  <body style="padding:5px;">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Jobify</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="http://localhost/jobPrep/index.php" class="nav-link">
          Home
        </a>
      </li>
      <?php
      if(isset($_SESSION['user_id'])){
      ?>
      <li class="nav-item">
        <a href="http://localhost/jobPrep/profile/?user_id=<?php echo $_SESSION['user_id'] ?>" class="nav-link">
          Profile
        </a>
      </li>
    <?php 
         }
    ?>
    </ul>
  </div>
</nav>
  <div>
    <h1>Search for companies</h1>
      <form method="POST">
          <input type="text" name="search" size="50"><button name="submit">search</button>
      </form>
  </div>   
  <table> 
  <?php
  if(isset($_POST['submit'])){
    $search=new Search();
    $data=$search->search_result($_POST['search']);
    while ($row=mysqli_fetch_array($data)) {
      ?>

      <?php
        echo "<tr><td><a href='https://localhost/jobPrep/company/?company_id=".$row['id']."'>".$row['name']."</a></td></tr>";
    }
  }
  ?>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>