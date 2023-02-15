<?php 

include "../../includes/connections.php";
$userID = $_POST['id'];
$sql = "SELECT * FROM tblclientinfo where clientsID='$userID'";
$result = mysqli_query($con,$sql);
while ($erow = mysqli_fetch_array($result)){ 
    $chkcat = explode(", " ,$erow['category']);
?>
    <div class = "container">
        <div class = "row">

            <div class ="form-floating col-md-6 col-sm-12">
                <!-- image file start -->
                <input type = "hidden" name = "id" value = "<?= $userID ?>"/>
                <div class="form-group mb-2">
                    <input  type="file" name="upload_file" class="form-control" id= "upload_file" onchange ="getImagePreview(event)" accept = ".jpg, .jpeg, .png"/>
                    <input type ="hidden" name = "old_img" value = "<?=$erow['image_name']; ?>"/>
                </div>
                <div class = "form-group mb-3" id = "preview" style="text-align:center">
                    <i id = "edit_preview" width = "200" height = "150">
                    <image src="img/<?=$erow['image_name']?>" style="width:200px;height:150px; "/> 

                    </i>                                
                    
                </div>
                    <!-- assign as three col -->
                

                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                    <input name="edittxt_lname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" value = "<?=$erow['lastname']?>" required/>
                        <label for="edittxt_lname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                    <input name="edittxt_fname" class="form-control input-sm input-size" type="text" placeholder="Firstname" autocomplete = "off" value = "<?=$erow['firstname']?>" required/>
                        <label for="edittxt_fname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                    <input name="edittxt_mname" class="form-control input-sm input-size" type="text" placeholder="Middlename" autocomplete = "off" value = "<?=$erow['middlename']?>" />
                        <label for="edittxt_mname">Middlename</label>
                    </div>
                </div>
                        <!-- end here -->
                <div class="form-floating mb-2 form-group">
                    <input name="edittxt_bdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate"value = "<?=$erow['birthdate']?>" required/>
                    <label for ="edittxt_bdate">Birthdate:</label>
                </div>
                <div class="form-floating mb-2 form-group">
                    <input name="edittxt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #" value = "<?=$erow['householdnum']?>"autocomplete = "off"/>
                    <label for="edittxt_householdnum">Household no.</label>
                </div>
                <div class="form-floating mb-2 form-group">
                    <input name="edittxt_street" class="form-control input-sm input-size" type="text" min="1" placeholder="Street" autocomplete = "off" value = "<?=$erow['street']?>" required/>
                    <label for="edittxt_street">Street </label>
                
                </div>
                <div class="form-group mb-2 form-floating">
                    <select name="editdrop_brgy" id="editdrop_brgy" class="form-control input-sm input-size form-select" aria-label="Select Barangay" required>
                    <option selected><?=$erow['barangay']?></option>
                    <option>Ambabaay</option>
                    <option>Aporao</option>
                    <option>Arwas</option>
                    <option>Ballag</option>
                    <option>Banog Norte</option>
                    <option>Banog Sur</option>
                    <option>Calabeng</option>
                    <option>Centro Toma</option>
                    <option>Colayo</option>
                    <option>Dacap Norte</option>
                    <option>Dacap Sur</option>
                    <option>Garrita</option>
                    <option>Luac</option>
                    <option>Macabit</option>
                    <option>Masidem</option>
                    <option>Poblacion</option>
                    <option>Quinaoayanan</option>
                    <option>Ranao</option>
                    <option>Ranom Iloco</option>
                    <option>San Jose</option>
                    <option>San Miguel</option>
                    <option>San Simon</option>
                    <option>San Vicente</option>
                    <option>Tiep</option>
                    <option>Tipor</option>
                    <option>Tugui Grande</option>
                    <option>Tugui Norte</option>
                    </select>
                    <label for ="editdrop_brgy">Select Barangay</label>
                </div>
                <div class="form-floating mb-2 form-group">
                        <input name="edittxt_cno" class="form-control input-sm input-size" type="text" placeholder="Cellphone Number" value = "<?=$erow['contactno']?>"  autocomplete = "off" required/>
                        <label for="edittxt_cno">Contact Number:</label>
                </div>
                <div class="form-group mb-2 form-floating">
                    <select name="editdrop_civilstatus" id="drop_civilstatus" class="form-control input-sm input-size form-select" aria-label="Select Status" required>
                    <option selected ><?=$erow['stat']?></option>
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                    <option>Widowed </option>
                    </select>
                    <label for ="editdrop_civilstatus">Civil Status</label>
                </div>
                <div class="form-group mb-2 form-floating">
                    <select  name="editdrop_gender" id="editdrop_gender" class="form-control input-sm input-size form-select" aria-label="Select Barangay" required>
                    <option selected ><?=$erow['gender']?></option>
                    <option>Male</option>
                    <option>Female</option>
                    </select>
                    <label for="editdrop_gender">Gender</label>
                </div>

                
                <!-- <div class="form-group mb-2 form-floating">
                    <select  name="editdrop_categ" id="editdrop_categ" class="form-control input-sm input-size form-select" aria-label="Select Category" required>
                    <option selected ></option>
                    <option>4Ps</option>
                    <option>Senior Citizen</option>
                    <option>PWD</option>
                    <option>Solo Parent</option>
                    </select>
                    <label for="editdrop_categ">Category</label>
                </div> -->
<!-- start checkbox -->

<div class = "form-group mb-2">
<label class = "my-2">Category</label><br>
        <div class="form-check form-check-inline">
                <input class="form-check-input" name ="category[]" type="checkbox" value="4Ps" id="edit4Ps" <?php  if (in_array("4Ps",$chkcat)){echo "checked";}?>>
                
                    <label class="form-check-label" for="edit4Ps">
                        4P'S
                    </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Senior Citizen" id="editSenior" <?php  if (in_array("Senior Citizen",$chkcat)){echo "checked";}?> >
                <label class="form-check-label" for="editSenior">
                    Senior Citizen
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input"name ="category[]"  type="checkbox" value="PWD" id="editPWD" <?php  if (in_array("PWD",$chkcat)){echo "checked";}?> >
                <label class="form-check-label" for="editPWD">
                    PWD
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Solo Parent" id="editSoloParent" <?php  if (in_array("Solo Parent",$chkcat)){echo "checked";}?>>
                <label class="form-check-label" for="editSoloParent">
                    Solo Parent
                </label>
        </div>  
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Others" id="editOthers" <?php  if (in_array("Others",$chkcat)){echo "checked";}?>>
                <label class="form-check-label" for="editOthers">
                    Others
                </label>
        </div>      
</div>
<!-- end checkbox -->
            </div>
            <!-- end of Personal Background -->
            <?php }?>
            <?php 
            $sqlother = "SELECT * FROM tblclientotherinfo where clientsID='$userID'";
            $resultother = mysqli_query($con,$sqlother);
            while ($orow = mysqli_fetch_array($resultother)){ 
            
            ?>
            <div class ="form-floating col-md-6 col-sm-12">
                <!-- Spouse's Information -->
                <p> Spouse's Information </p>
                <hr class ="bg-success border-3 border-top border-success">
                
                <div class = "row g-3">
                    <!-- assign as three col -->
                    <div class="form-floating col-md-4 mb-2 form-group">
                        <input name="txt_slname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['SpouseLastname']?>"  placeholder="Lastname"/>
                        <label for="txt_slname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_sfname" class="form-control input-sm col-sm-4 " type="text" value = "<?=$orow['SpouseFirstname']?>"  placeholder="Firstname" />
                        <label for="txt_sfname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_smname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['SpouseMiddlename']?>" placeholder="Middlename"  />
                        <label for="txt_smname">Middlename</label>
                    </div>
                </div>

                <div class="form-floating mb-5 form-group">
                    <input name="txt_sbdate" class="form-control input-sm input-size" type="date" value = "<?=$orow['SpouseBirthdate']?>" placeholder="Birthdate" />
                    <label for ="txt_sbdate">Birthdate:</label>
                </div>
            
                <!-- Mother's Information -->
                <p> Mother's Information </p>
                <hr class ="bg-success border-3 border-top border-success">
                
                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                        <input name="txt_mlname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['MotherLastname']?>" placeholder="Lastname"/>
                        <label for="txt_mlname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_mfname" class="form-control input-sm col-sm-4 " type="text" value = "<?=$orow['MotherFirstname']?>" placeholder="Firstname" />
                        <label for="txt_mfname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_mmname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['MotherMiddlename']?>" placeholder="Middlename"  />
                        <label for="txt_mmname">Middlename</label>
                    </div>
                </div>

                <div class="form-floating mb-5 form-group">
                    <input name="txt_mbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" value = "<?=$orow['MotherBirthdate']?>" />
                    <label for ="txt_mbdate">Birthdate:</label>
                </div>

                    <!-- Father's Information -->
                <p> Father's Information </p>
                <hr class ="bg-success border-3 border-top border-success">
                
                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                        <input name="txt_flname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['fatherLastname']?>" placeholder="Lastname"/>
                        <label for="txt_flname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_ffname" class="form-control input-sm col-sm-4 " type="text" value = "<?=$orow['fatherFirstname']?>" placeholder="Firstname" />
                        <label for="txt_ffname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_fmname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['fatherMiddlename']?>" placeholder="Middlename"  />
                        <label for="txt_fmname">Middlename</label>
                    </div>
                </div>

                <div class="form-floating mb-4 form-group">
                    <input name="txt_fbdate" class="form-control input-sm input-size" type="date" value = "<?=$orow['fatherBirthdate']?>" placeholder="Birthdate" />
                    <label for ="txt_fbdate">Birthdate:</label>
                </div>

                
                <p>Number of Siblings </p>
                <hr class ="bg-success border-3 border-top border-success">

                <div class="form-floating mb-2 form-group">
                                <input name="txtsiblingsno" class="form-control input-sm input-size" type="number" min="1" placeholder="Number of Siblings #" value = "<?= $orow['nochildren']?>"/>
                                <label for="txtsiblingsno">Number of Siblings</label>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    


                    <!-- end body -->
<script type ="text/javascript">

function getImagePreview(event){
    var image = URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('edit_preview');
    var newimg = document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width = "300";
    newimg.height = "150";
    imagediv.appendChild(newimg);

}

</script>