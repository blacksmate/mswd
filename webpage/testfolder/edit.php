<?php 
    include "../../includes/connections.php";

    if(isset($_POST['submit'])){
        $ID = $_POST['id'];
        
        $category = $_POST['category'];
        $chkcat = implode(", " ,$category);
        $query = "UPDATE  test SET category = '$chkcat' where id = '$ID'";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<script> alert('Successfully Updated');window.location.href='../testfolder/index.php'</script>";
        }
        else{
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    }
?>