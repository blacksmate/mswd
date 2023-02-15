<?php session_start();
$now  = time();
    if(!isset($_SESSION["username"])) {
        $_SESSION['message'] = "Please log-in first to continue";
        header("location: ../index.php");
        }
    else if($now > $_SESSION['expire']){
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
    
            <a href = "" ><img class="mb-4" src="../img/DSWD-Logo.png"  style="height:68px;"></a> DSWD</div>
                <div class="list-group list-group-flush my-3">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="./4Psuser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-hand-holding-heart me-2"></i>4P'S</a>
                    <a href="./senioruser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-hand-holding-heart me-2"></i>Senior Citizen</a>
                    <a href="./PWDuser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-users me-2"></i>PWD</a>
                    <a href="./Solouser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-wheelchair me-2"></i>Solo Parent</a>
                    <a href="./Othersuser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
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
                    <h2 class="fs-2 m-0">Dashboard</h2>
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
                <!-- start of Clients/Beneficiaries -->
                <button class="btn btn-success btn-sm mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addClients">
                <i class="fa fa-user-plus" aria-hidden = "true"></i> Add Clients</button>
                <?php require_once "addclients/addClientsModal.php" ?>

                <?php require_once "../includes/totalclients.php" ?>
                <!-- end summary of Clients/Beneficiaries -->

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Client's Information</h3>
                    <div class="col">
                        <!-- Starts Table -->
                        <?php include "../includes/connections.php" ?>
                        <div class="box-body table-responsive mt-3">
                            <table id="table" class="table table-bordered table-success table-striped table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Picture</th>
                                    <th>Complete Name</th>
                                    <th>Age</th>
                                    <th>Birthdate</th>
                                    <th>Barangay</th>
                                    <th>Contact No.</th> 
                                    <th> Action</th>
                                    </tr>
                                </thead>  
                                <tbody>
                                    
                                <?php
                                    $sql = "SELECT 	clientsID, CONCAT(lastname, ', ', firstname, ' ', middlename) as cname,contactno,firstname, lastname, middlename, householdnum,age ,street,image_name,birthdate,barangay FROM tblclientinfo order by clientsID";
                                    $query = mysqli_query($con, $sql);
                                    
                                    while($row = mysqli_fetch_array($query))
                                    {
                                    ?>
                                    <?php $image_source = basename($row['image_name'])?>
                                    

                                        <tr>
                                            <td><?php echo $row['clientsID'] ?></td>
                                            <td style="width:70px;"><image src="img/<?php echo $image_source?>" style="width:100px;height:60px;"/> </td>
                                            <td><?php echo $row['cname'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['birthdate'] ?></td>
                                            <td><?php echo $row['barangay'] ?></td>
                                            <td><?php echo $row['contactno'] ?></td>
                                            <td>
                                       
                                            <button id="transac" data-id = "<?=$row['clientsID']?>" class = "btn btn-primary btn-sm transac">
                                            <i class="fa fa-plus-circle" aria-hidden = "true"> 
                                            </i> Transaction </button>
                          
                                     
                                            <!-- add new button here for another action -->
                                            </td>
                                            
                                        </tr>
                                                
                                    <?php }  ?>
                                </tbody>
                            </table>
                            
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        
    <!-- /#page-content-wrapper -->
    </div>
    <?php require_once "addtransaction/addTransactionModal.php"?>
    <?php require_once "viewclientsinfo/viewClientsModal.php"?>
    <?php include "../includes/script.php"?>
   <!-- home javascript start -->
   
<script>
    
        // toggle button for nav bar
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle"); 
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
        //for datatable
        $(document).ready(function () {
            $('#table').DataTable();
        });

    

        $(document).ready(function(){
        $('.transac').click(function(){
            var id = $(this).data('id');
            // alert(id);
            $.ajax({
                url : 'addtransaction/addTransactionStructure.php',
                type : 'post',
                data : {id : id},
                success : function(respose){
                    $('#addTransactionModal').modal('show');
                    $('.modal-bodyTransaction').html(respose);
                    $('#editClients').modal('hide');
                }
            });
        });
    });

</script>

<!-- home javascript end -->
<?php include "../includes/footer.php"?>
