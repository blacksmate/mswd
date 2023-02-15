<?php
  session_start();
  
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <link href="../css/bootstrap.min.css" rel="stylesheet" />
      <!-- font-awesome css code -->
      <link  href="../css/all.min.css" rel="stylesheet" />
      <link  href="../css/fontawesome.min.css" rel="stylesheet"/>
      <!-- data tables  css code-->
      <link rel="stylesheet" href="../css/styles.css" />
      <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
      <title>MSWD RECORD KEEPING SYSTEM</title>

<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}

      </style>
  </head>

<body id = "index" class = "skin-black">

<main class="form-signin">
  <form class="form-signin" role = "form" method = "POST">
    <div class="panel-heading" style="text-align:center;">
      <img class="mb-4" src="../img/DSWD-Logo.png"  style="height:100px;">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <?php include "../message/message.php"; ?>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="EmpUsername"  autocomplete="off" name = "EmpUsername" autofill = false placeholder="Enter Username">
      <label for="EmpUsername">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="EmpPassword"  autocomplete="off" name = "EmpPassword" placeholder="Password">
      <label for="EmpPassword">Password</label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="btn_login">Sign in</button>

  </form>
</main>


<?php
include "../includes/connections.php";
  if(isset($_POST['btn_login']))
  {
    $username = $_POST['EmpUsername'];
    $password = $_POST['EmpPassword'];

    $sql ="SELECT * from tblcredentials where username = ? and password = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss",$username,$password);//bind then execute
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc(); // fetch data   
  
    if($row["type"] == "admin")
    {

        $_SESSION['username'] = $_POST['EmpUsername'];
        $_SESSION['start'] = time(); 
              // Ending a session in 5 hrs from the starting time.
        $_SESSION['expire'] = $_SESSION['start'] + (60*60); 
        header("location: ../webpage/home.php");
      
      //  echo "<script type = 'text/javascript'>alert('you are successfully login');window.location.href='../webpage/home.php';</script>";
    }
    else if ($row["type"]=="user"){
      $_SESSION['username'] = $_POST['EmpUsername'];
      $_SESSION['start'] = time(); 
            // Ending a session in 5 hrs from the starting time.
      $_SESSION['expire'] = $_SESSION['start'] + (60*60); 
      header("location: ../webpage/homeuser.php");
    
    }
    
    else{
      $_SESSION['message'] = "Incorrect Username/Password";
      header("location: ../index.php");
    }
  }


      

?>

<script src = "../js/bootstrap.bundle.min.js"></script>
</body>
</html>
