<?php session_start();
    if(!isset($_SESSION["username"])) {
        $_SESSION['message'] = "Please log-in first to continue";
        header("location: ../index.php");
        }
    else if(time() > $_SESSION['expire']){
        $_SESSION['message'] = "Session Expired!";
        header("location: ../index.php");
        session_destroy();

    }
?>
<?php include "../includes/head.php" ?>
<body>
<label  id="error" class="badge bg-danger"></label> 
    <div class="d-flex" id="wrapper"> 
        <!--start Sidebar -->

        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
    
            <a href = "#" ><img class="mb-4" src="../img/DSWD-Logo.png"  style="height:68px;"></a> DSWD</div>
                <div class="list-group list-group-flush my-3">
                    <a href="./home.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="./4Ps.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-hand-holding-heart me-2"></i>4P'S</a>
                    <a href="./senior.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                            class="fas fa-hand-holding-heart me-2"></i>Senior Citizen</a>
                    <a href="./PWD.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i
                            class="fas fa-users me-2"></i>PWD</a>
                    <a href="./Solo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-wheelchair me-2"></i>Solo Parent</a>
                    <a href="./Others.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                            class="fas fa-wheelchair me-2"></i>Others</a>
                    <a href="../webpage/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-2"></i>Logout</a>
                </div>
        </div>
        <!-- End side bar -->

        <!-- /#start sidebar-wrapper -->

        <div id="page-content-wrapper">
            <!-- /#end sidebar-wrapper -->
            <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Persons With Disability Page</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo strtoupper($_SESSION['username']); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Page Content -->
            <div class="container-fluid px-4">

                <div class="col my-5">
                    <h3 class="fs-4 mb-3">Client's Information</h3>
                    <div class="box-body table-responsive mt-3">

                    <div class="row">
                        <!-- Starts Table -->
                            <!-- date -->
                        
                            <div class = "input-daterange">
                            <div class="row">

                                    <div class="col-md-2 my-2">
                                        <div class="form-floating">
                                            <input name="start_date" id = "start_date" class="form-control input-sm input-size min" autocomplete="off" type="text" />
                                            <label for ="start_date">From</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-2">
                                        <div class="form-floating">    
                                            <input name="end_date" id = "end_date" class=" form-control input-sm input-size max" type="text" autocomplete="off"/>
                                            <label for ="end_date">To</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div> 
                            <div class="col-md-1 mt-2 mb-3">  
                                    <input type="button" name="search" id="search" value="Filter" class="btn btn-success" />  
                            </div> 
                            <div class="col-md-3 mt-2 mb-3">  
                                    <input type="button" name="clear" id="clear" value="Clear" class="btn btn-primary" />  
                            </div>  
                                
                                   
                            
                               
                        <!-- date -->
                            <table id="order_data" class="order_data table-bordered table-success table-striped table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Picture</th>
                                    <th>Complete Name </th>
                                    <th>Age</th>
                                    <th>Birthdate</th>
                                    <th>Barangay</th>
                                    <th>Contact No.</th> 
                                    <th>Assistance</th>
                                    <th>Transaction Date</th> 
                                    
                                    </tr>
                                </thead>  
                             
                            </table>
                            
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        
    <!-- /#page-content-wrapper -->
    </div>
    <?php include "../includes/script.php"?>
<script type="text/javascript" language="javascript" >
        // toggle button for nav bar
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle"); 
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
$(document).ready(function(){
 fetch_data('no');
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
 function fetch_data(is_date_search, start_date='', end_date='', condition = '')
 {
  var dataTable = $('#order_data').DataTable({
    
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"./filter/filter.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date, condition:"PWD"
    }
   }

 });

 }

 $('#clear').click(function(){
   
    if(start != '' && end !=''){
        var start = $('#start_date').val("");
        var end = $('#end_date').val("");
        $('#order_data').DataTable().destroy();
        fetch_data('no');
    }
})

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }

});



});

</script>
<?php include "../includes/footer.php"?>