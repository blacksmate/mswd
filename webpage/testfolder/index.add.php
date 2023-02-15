<?php 
include "../../includes/connections.php";
if(isset($_POST['test'])) {  
    // echo "<script> alert('boy gumana!');</script>";

    if(isset($_POST['category'])){
        $category = $_POST['category'];
        $chkcat = implode(", " ,$category);
         
        $query ="INSERT INTO test(category) 
                VALUES ('$chkcat')";
        if (mysqli_query($con, $query)) {
            echo "<script> alert('Successfully Inserted');window.location.href='../testfolder/index.php'</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
        
        mysqli_close($con);

        // echo "<script> alert('$chkcat');window.location.href='../testfolder/test2.php'</script>";
    }
    else{
        echo "<script> alert('select something');window.location.href='../testfolder/index.php'</script>";
    }
  }
?>