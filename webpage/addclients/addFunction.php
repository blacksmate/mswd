<?php
session_start();
include "../../includes/connections.php";
$checkidquery = " SELECT * FROM tblclientinfo ORDER BY clientsID DESC LIMIT 1";
$checkresult = mysqli_query($con,$checkidquery);


if(isset($_POST['btn_add'])) {    
   if (!isset($_POST['category'])){
        echo "<script type = 'text/javascript'>alert('Please select category first');window.location.href='../../webpage';</script>";
    }
    $userlname = $_POST['txt_lname'];
    $userfname = $_POST['txt_fname'];
    $usermname = $_POST['txt_mname'];
    $userbday = $_POST['txt_bdate'];
    // $category = $_POST['drop_categ'];

    
    // getting the category in checkbox
    $categ =  $_POST['category'];
    $category = implode(", " ,$categ); //implode para pag samahin
   
 
    $status = $_POST['drop_civilstatus'];

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

    // spouse data
    $spouselname = '';
    $spousefname = '';
    $spousemname = '';
    $spousebdate ='';


    //Mothers Data
    $motherlname = '';
    $motherfname = '';
    $mothermname ='';
    $motherbdate = '';


    //Mothers Data
    $fatherlname ='';
    $fatherfname ='';
    $fathermname ='';
    $fatherbdate ='';
    // code for inserting image file as profile
    $noofsiblings = '';

    $file_name = basename($_FILES['upload_file']['name']);
    $temp = $_FILES['upload_file']['tmp_name'];
    $imagetype = $_FILES['upload_file']['type'];
    $size = $_FILES['upload_file']['size'];
    // para sa status lagay tayo variable
    $username = $_SESSION["username"];
    $query =
    "INSERT INTO tblclientinfo(clientsID,image_name,lastname,firstname,middlename,birthdate,age,householdnum,street,barangay,contactno,gender,category,stat)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $query2 = 
    "INSERT INTO tblclientotherinfo(clients_ID,clientsID,SpouseLastname,SpouseFirstname,SpouseMiddlename,SpouseBirthdate,
                               fatherLastname,fatherFirstname,fatherMiddlename,fatherBirthdate,
                               MotherLastname,MotherFirstname,MotherMiddlename,MotherBirthdate,
                               nochildren)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($con);
    $stmt2 = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt,$query)){
        // echo "SQL ERROR";
        var_dump(mysqli_stmt_prepare($stmt,$query));
    }
    else if(!mysqli_stmt_prepare($stmt2,$query2))
    {
        var_dump(mysqli_stmt_prepare($stmt2,$query2));
    }

    else{
        $spouselname = $_POST['txt_slname'];
        $spousefname = $_POST['txt_sfname'];
        $spousemname = $_POST['txt_smname'];
        $spousebdate = $_POST['txt_sbdate'];
    
    
        //Mothers Data
        $motherlname = $_POST['txt_mlname'];
        $motherfname = $_POST['txt_mfname'];
        $mothermname = $_POST['txt_smname'];
        $motherbdate = $_POST['txt_mbdate'];
    
    
        //Mothers Data
        $fatherlname = $_POST['txt_flname'];
        $fatherfname = $_POST['txt_ffname'];
        $fathermname = $_POST['txt_fmname'];
        $fatherbdate = $_POST['txt_fbdate'];
        // code for inserting image file as profile
        $noofsiblings = $_POST['txtsiblingsno'];
        if(mysqli_num_rows($checkresult)>0){
            if($row = mysqli_fetch_assoc($checkresult)){
                $clientsID = $row['clientsID'];
                $get_numbers = str_replace("MSWD","",$clientsID);
                $id_increase = ++$get_numbers;
                $get_string = str_pad($id_increase,6,0,STR_PAD_LEFT); //changing 6 to 1
                $newID = "MSWD".$get_string;
            
                if($file_name!=""){

                    if (file_exists("../img/".$file_name)) {
                        echo "<script type = 'text/javascript'>alert('Image is already been used');window.location.href='../../webpage';</script>";
                        // 
                    }
                    else{
                
                        if(($imagetype=="image/jpeg" || $imagetype=="image/png" || $imagetype=="image/bmp") && $size<=2048000){
                        
                            if(move_uploaded_file($temp, '../img/'.$file_name)){
                                $image = $file_name;
                                mysqli_stmt_bind_param($stmt,'sssssssssssssss',$newID,$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender,$category,$status,$stat);
                                mysqli_stmt_execute($stmt);
                                
                                mysqli_stmt_bind_param($stmt2,'sssssssssssssss',$newID,$newID,$spouselname,$spousefname,$spousemname,$spousebdate,
                                                                            $motherlname,$motherfname,$mothermname,$motherbdate,
                                                                            $fatherlname,$fatherfname,$fathermname,$fatherbdate,$noofsiblings);
                                mysqli_stmt_execute($stmt2);
                                if($username == "admin"){
                                    echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";

                                }
                                else{
                                    echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage/homeuser.php';</script>";
                                    
                                }
                              
                         
                            }
                        }
                    }
                }
                else{
                        $image = 'default.png';
                        mysqli_stmt_bind_param($stmt, 'sssssssssssssss',$newID,$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender,$category,$status,$stat);
                        mysqli_stmt_bind_param($stmt2,'sssssssssssssss',$newID,$newID,$spouselname,$spousefname,$spousemname,$spousebdate,
                                                                    $motherlname,$motherfname,$mothermname,$motherbdate,
                                                                    $fatherlname,$fatherfname,$fathermname,$fatherbdate,$noofsiblings);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_execute($stmt2);
                        if($username == "admin"){
                            echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";

                        }
                        else{
                            echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage/homeuser.php';</script>";
                            
                        }
          
                }
           
            }
        }
        else{
            $newID = "MSWD000001";
            if($file_name!=""){

                if (file_exists("../img/".$file_name)) {
                    echo "<script type = 'text/javascript'>alert('Image is already been used');window.location.href='../../webpage';</script>";
                    // 
                }
                else{
            
                    if(($imagetype=="image/jpeg" || $imagetype=="image/png" || $imagetype=="image/bmp") && $size<=2048000){
                    
                        if(move_uploaded_file($temp, '../img/'.$file_name)){
                            $image = $file_name;
                            mysqli_stmt_bind_param($stmt,'sssssssssssssss',$newID,$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender,$category,$status,$stat);
                            mysqli_stmt_execute($stmt);
                            
                            mysqli_stmt_bind_param($stmt2,'sssssssssssssss',$newID,$newID,$spouselname,$spousefname,$spousemname,$spousebdate,
                                                                        $motherlname,$motherfname,$mothermname,$motherbdate,
                                                                        $fatherlname,$fatherfname,$fathermname,$fatherbdate,$noofsiblings);
                            mysqli_stmt_execute($stmt2);
                            if($username == "admin"){
                                echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";
    
                            }
                            else{
                                echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage/homeuser.php';</script>";
                                
                            }
                        }
                    }
                }
            }
            else{
                    $image = 'default.png';
                    mysqli_stmt_bind_param($stmt, 'ssssssssssssss',$newID,$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender,$category,$status);
                    mysqli_stmt_bind_param($stmt2,'sssssssssssssss',$newID,$newID,$spouselname,$spousefname,$spousemname,$spousebdate,
                                                                $motherlname,$motherfname,$mothermname,$motherbdate,
                                                                $fatherlname,$fatherfname,$fathermname,$fatherbdate,$noofsiblings);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_execute($stmt2);
                    if($username == "admin"){
                        echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";

                    }
                    else{
                        echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage/homeuser.php';</script>";
                        
                    }

            }
        }
        
}

    
}

?>

