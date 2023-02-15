<?php 
include "../../includes/connections.php";
    if(isset($_POST['btn_update'])){
        if (!isset($_POST['category'])){
            echo "<script type = 'text/javascript'>alert('Please select category first');window.location.href='../../webpage';</script>";
        }
         $userID = $_POST['id'];
         $lastname = $_POST['edittxt_lname'];
         $firstname = $_POST['edittxt_fname'];
         $middlename = $_POST['edittxt_mname'];
        //  $category = $_POST['editdrop_categ'];
        //  changing the category into checkbox
        $categ = $_POST['category'];
        $category = implode(", " ,$categ);

         $householdnum = $_POST['edittxt_householdnum'];
         $street = $_POST['edittxt_street'];
         $barangay = $_POST['editdrop_brgy'];
         $birthdate = $_POST['edittxt_bdate'];
         $cnom = $_POST['edittxt_cno'];
         $stat = $_POST['editdrop_civilstatus'];
         $gender = $_POST['editdrop_gender'];
         // getting the birthdate
         $dateOfBirth = $birthdate;
         $today = date("Y-m-d");
         $diff = date_diff(date_create($dateOfBirth), date_create($today));
         $userage = $diff->format('%y');
    

         $file_name = basename($_FILES['upload_file']['name']);
         $temp = $_FILES['upload_file']['tmp_name'];
         $imagetype = $_FILES['upload_file']['type'];
         $size = $_FILES['upload_file']['size'];

         $spouselname = $_POST['txt_slname'];
         $spousefname = $_POST['txt_sfname'];
         $spousemname = $_POST['txt_smname'];
         $spousebdate = $_POST['txt_sbdate'];
     
     
         //Mothers Data
         $motherlname = $_POST['txt_mlname'];
         $motherfname = $_POST['txt_mfname'];
         $mothermname = $_POST['txt_mmname'];
         $motherbdate = $_POST['txt_mbdate'];
     
     
         //Mothers Data
         $fatherlname = $_POST['txt_flname'];
         $fatherfname = $_POST['txt_ffname'];
         $fathermname = $_POST['txt_fmname'];
         $fatherbdate = $_POST['txt_fbdate'];


         $noofsiblings = $_POST['txtsiblingsno'];

         $old_img = $_POST['old_img'];


            if($file_name!=""){  //page daw yong filename e hindi equal sa null
                        
                if(($imagetype=="image/jpeg" || $imagetype=="image/png" || $imagetype=="image/bmp") && $size<=2048000){
                    if(move_uploaded_file($temp, '../img/'.$file_name)){
                        $image = $file_name;
                $query = "UPDATE  tblclientinfo
                SET image_name = '$image', lastname='$lastname', firstname ='$firstname', middlename ='$middlename', category = '$category',
                age = '$userage', stat = '$stat' ,birthdate ='$birthdate', householdnum ='$householdnum', 
                street ='$street', barangay ='$barangay',contactno ='$cnom', gender = '$gender' WHERE clientsID ='$userID'";
                        
                        
                $queryothers = "UPDATE tblclientotherinfo
                SET SpouseLastname = '$spouselname',SpouseFirstname = '$spousefname' ,SpouseMiddlename = '$spousefname', SpouseBirthdate = '$spousebdate'
            ,       fatherLastname = '$fatherlname',fatherFirstname = '$fatherfname' ,fatherMiddlename = '$fathermname', fatherBirthdate = '$fatherbdate'
            ,       MotherLastname = '$motherlname',MotherFirstname = '$motherfname' ,MotherMiddlename = '$mothermname', MotherBirthdate = '$motherbdate'
            ,       nochildren = '$noofsiblings' WHERE clientsID ='$userID'";
                $result = mysqli_query($con,$query);
                $resultother = mysqli_query($con,$queryothers);

                if(($result)&&($resultother)) {
                echo "<script type = 'text/javascript'>alert('Updated Successfully');window.location.href='../../webpage';</script>";
                //  echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";
                }
                else{
                    echo "ERROR: Could not able to execute $query. " . mysqli_error($con);

                }
                    }
                }
               
            }

            else{
               
                $old_img;
                $query = "UPDATE  tblclientinfo
                SET image_name = '$old_img', lastname='$lastname', firstname ='$firstname', middlename ='$middlename', category = '$category',
                age = '$userage', stat = '$stat' ,birthdate ='$birthdate', householdnum ='$householdnum', 
                street ='$street', barangay ='$barangay',contactno ='$cnom', gender = '$gender' WHERE clientsID ='$userID'";

                $queryothers = "UPDATE tblclientotherinfo
                SET SpouseLastname = '$spouselname',SpouseFirstname = '$spousefname' ,SpouseMiddlename = '$spousemname', SpouseBirthdate = '$spousebdate'
                ,       fatherLastname = '$fatherlname',fatherFirstname = '$fatherfname' ,fatherMiddlename = '$fathermname', fatherBirthdate = '$fatherbdate'
                ,       MotherLastname = '$motherlname',MotherFirstname = '$motherfname' ,MotherMiddlename = '$mothermname', MotherBirthdate = '$motherbdate'
                ,      nochildren = '$noofsiblings'  WHERE clientsID ='$userID'";
                $result = mysqli_query($con,$query);
                $resultother = mysqli_query($con,$queryothers);

                if(($result)&&($resultother)) {
                echo "<script type = 'text/javascript'>alert('Updated Successfully');window.location.href='../../webpage';</script>";
                //  echo "<script type = 'text/javascript'>alert('Insert Successfully');window.location.href='../../webpage';</script>";
                }
                else{
                    echo "ERROR: Could not able to execute $query. " . mysqli_error($con);

                }
            }
    }

       

        //  query = "UPDATE tblclientinfo SET"   
    
        
    ?>