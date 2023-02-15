<?php 

include "../includes/connections.php";

if(isset($_POST['importSubmit'])){
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

    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values','application/octet-stream',
    'text/csv','application/csv','application/excel','application/vnd.msexcel','text/plain');

    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $csvFile = fopen($_FILES['file']['tmp_name'],'r');
            fgetcsv($csvFile);
            while(($line = fgetcsv($csvFile))!== FALSE){
                $userlname          = $line[2];
                $userfname          = $line[3];
                $usermname          = $line[4];
                $userage            = $line[5];
                $userbday           = $line[6];
                $userhouseholdno    = $line[7];
                $userstreet         = $line[8];
                $userbrgy           = $line[9];
                $usercno            = $line[10];
                $usergender         = $line[11];
                $category           = $line[12];
                $stat               = $line[13];
                $status             = $line[14];
                
                $checkidquery = " SELECT * FROM tblclientinfo ORDER BY clientsID DESC LIMIT 1";
                $checkresult = mysqli_query($con,$checkidquery);
                
                $query =
                "INSERT INTO tblclientinfo(clientsID,image_name,lastname,firstname,middlename,birthdate,age,householdnum,street,barangay,contactno,gender,category,stat,status)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

                $query2 = 
                "INSERT INTO tblclientotherinfo(clients_ID,clientsID,SpouseLastname,SpouseFirstname,SpouseMiddlename,SpouseBirthdate,
                            fatherLastname,fatherFirstname,fatherMiddlename,fatherBirthdate,
                            MotherLastname,MotherFirstname,MotherMiddlename,MotherBirthdate,
                            nochildren)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

                 $stmt = mysqli_stmt_init($con);
                 $stmt2 = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt,$query)){
                    echo "SQL ERROR";
                }
                else if((!mysqli_stmt_prepare($stmt2,$query2)))
                {
                    echo "SQL ERROR";
                }
                else{
        
                    if(mysqli_num_rows($checkresult) > 0){
                        if($row = mysqli_fetch_assoc($checkresult)){
                            $clientsID = $row['clientsID'];
                            $get_numbers = str_replace("MSWD","",$clientsID);
                            $id_increase = ++$get_numbers;
                            $get_string = str_pad($id_increase,6,0,STR_PAD_LEFT); //changing 6 to 1
                            $newID = "MSWD".$get_string;
                        
                            $image = 'default.png';
                            mysqli_stmt_bind_param($stmt, 'sssssssssssssss',$newID,$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender,$category,$stat,$status);
                            mysqli_stmt_execute($stmt);

                            mysqli_stmt_bind_param($stmt2,'sssssssssssssss',$newID,$newID,$spouselname,$spousefname,$spousemname,$spousebdate,
                            $motherlname,$motherfname,$mothermname,$motherbdate,
                            $fatherlname,$fatherfname,$fathermname,$fatherbdate,$noofsiblings);
                            mysqli_stmt_execute($stmt2);
                       
                        }
                    }
                    else{
                        $newID = "MSWD000001";
            
                        $image = 'default.png';
                        mysqli_stmt_bind_param($stmt, 'sssssssssssssss',$newID,$image,$userlname,$userfname,$usermname,$userbday,$userage,$userhouseholdno,$userstreet,$userbrgy,$usercno,$usergender,$category,$stat,$status);
                       
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_param($stmt2,'sssssssssssssss',$newID,$newID,$spouselname,$spousefname,$spousemname,$spousebdate,
                            $motherlname,$motherfname,$mothermname,$motherbdate,
                            $fatherlname,$fatherfname,$fathermname,$fatherbdate,$noofsiblings);
                            mysqli_stmt_execute($stmt2);
         
            
                    }
                    
                }
           
            }//end while
            fclose($csvFile);
            //close the open CSV  File
            $qstring = '?status=succ';
        }
        else{
            $qstring = '?status=err';
        }
    }
    else{
        $qstring = '?status=invalid_file';
    }
}
header("location: ../webpage/home.php".$qstring);
?>