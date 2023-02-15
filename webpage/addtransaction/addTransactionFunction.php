<!-- echo "<script>alert('$userID'); </script>"; -->
<?php
session_start();
include "../../includes/connections.php";

if(isset($_POST['btn_add_transac'])) {    
    $username = $_SESSION["username"];
    
    $userID = $_POST['id'];
    $userlname = $_POST['tran_txt_lname'];
    $userfname = $_POST['tran_txt_fname'];
    $usermname = $_POST['tran_txt_mname'];
    $category = $_POST['tran_drop_category'];
    $userstreet = $_POST['tran_txt_street'];
    $userbrgy = $_POST['tran_drop_brgy'];
    $usersbirthdate = $_POST['tran_txt_bdate'];
    $trandate = $_POST['transac_date'];
    $transac = $_POST['drop_assist'];

    
    $query =
    "INSERT INTO tbltransaction(clientsid,trans_des,lastname,firstname,middlename,category,street,barangay,birthdate,transacdate)
                VALUES(?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$query)){
        echo "SQL ERROR";
    }
    else{
      
        if($username == "admin"){
            if ($transac == "Add Transaction"){
                echo "<script>alert ('Please Select a Transaction');window.location.href='../../webpage';</script>";
                
            }
            else{
                mysqli_stmt_bind_param($stmt,'ssssssssss',$userID,$transac,$userlname,$userfname,$usermname,$category,$userstreet, $userbrgy,$usersbirthdate,$trandate);
                mysqli_stmt_execute($stmt);
                echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";
            }
           
        }
        elseif($username == "user"){
            if ($transac == "Add Transaction"){
                echo "<script>alert ('Please select valid  category');window.location.href='../../webpage/homeuser.php';</script>";
                
            }
            else{
                mysqli_stmt_bind_param($stmt,'ssssssssss',$userID,$transac,$userlname,$userfname,$usermname,$category,$userstreet, $userbrgy,$usersbirthdate,$trandate);
                mysqli_stmt_execute($stmt);
                echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage/homeuser.php';</script>";
            }
            
        }
   
    }

 
    $stmt->close();
    $con->close();
}

// 


?>

        <!--  -->