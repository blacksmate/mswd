<?php
include "../includes/connections.php";
if(isset($_POST['btn_add'])) {    
    $userlname = $_POST['txt_lname'];
    $userfname = $_POST['txt_fname'];
    $usermname = $_POST['txt_mname'];
    $userbday = $_POST['txt_bdate'];
    // how to get age
    $dateOfBirth = $userbday;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $userage = $diff->format('%y');

    $userhouseholdno = $_POST['txt_householdnum'];
    $userstreet = $_POST['txt_street'];
    $userbrgy = $_POST['drop_brgy'];
    $usercno = $_POST['txt_cno'];
    $usergender = $_POST['drop_gender'];

    // code for inserting image file as profile

    $file_name = basename($_FILES['upload_file']['name']);
    $temp = $_FILES['upload_file']['tmp_name'];
    $imagetype = $_FILES['upload_file']['type'];
    $size = $_FILES['upload_file']['size'];


    
    $query =
    "INSERT INTO tblclientinfo(image_name,lastname,firstname,middlename,birthdate,age,householdnum,street,barangay,contactno,gender)
                VALUES(?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$query)){
        echo "SQL ERROR";
    }
    if($file_name!=""){
   
        if (file_exists("img/".$file_name)) {
            echo "<script type = 'text/javascript'>alert('Image is already been used');window.location.href='../webpage';</script>";
            // 
        }
        else{
        
            if(($imagetype=="image/jpeg" || $imagetype=="image/png" || $imagetype=="image/bmp") && $size<=2048000){
            
                if(move_uploaded_file($temp, 'img/'.$file_name)){
                    $image = $file_name;
                    mysqli_stmt_bind_param($stmt,'sssssssssss',$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender);
                    mysqli_stmt_execute($stmt);
                    echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../webpage';</script>";
                }
            }
        }
      }
    else{
        $image = 'default.png';
        mysqli_stmt_bind_param($stmt,'sssssssssss',$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender);
                mysqli_stmt_execute($stmt);
                echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../webpage';</script>";
    }
  
 
}
?>