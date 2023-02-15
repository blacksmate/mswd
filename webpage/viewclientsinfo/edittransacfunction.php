<?php include "../../includes/connections.php";
if(isset($_POST['btn_update_date'])) {    
    $transaction_date_id = $_POST['id'];

    $transaction_release = $_POST['tran_release_date'];
    $query = "UPDATE  tbltransaction
    SET transacdaterelease = '$transaction_release'  WHERE id ='$transaction_date_id'";

    $result = mysqli_query($con,$query);
    if($result){
        echo "<script type = 'text/javascript'>alert('Updated Successfully');window.location.href='../../webpage';</script>";
        //  echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";
        }
        else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($con);

        }
}        
?>
