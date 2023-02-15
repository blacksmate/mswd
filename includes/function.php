<?php 

function getCategory ($condition){
include "connections.php";

    $sql = "SELECT COUNT(*) as total FROM tblclientinfo WHERE category LIKE '%$condition%'"; //'$condition'
    if ($result = mysqli_query($con, $sql)) {
        // Return the number of rows in result set
        $rowcount = mysqli_fetch_assoc( $result );
        
        // Display result
        printf( $rowcount['total']);
        
     }
}
?>