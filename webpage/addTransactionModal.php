
<style>
p {
  font-size: 20px;
}
</style>
<!-- ========================= MODAL ======================= -->
<?php 
$id = $row['id'];
$lastname = $row['lastname'];
$firstname = $row['firstname'];
$middlename = $row['middlename'];
$birthdate = $row['birthdate'];
$householdno = $row['householdnum'];
$street = $row['street'];
$barangay = $row['barangay'];
$contactno = $row['contactno'];

?>
<body>
<div class="modal fade" id="addTransaction<?=$row['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "">
    
    <div class="modal-dialog  ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Clients Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <!-- start body -->
                <div class = "container">
                    <div class = "row">
                        <div class ="form-floating col-sm-12">
                            <!-- image file start -->
                            <div class="form-group mb-2">
                                <input  type="file" name="upload_file" class="form-control" id= "upload_file" onchange ="getImagePreview(event)"  accept = ".jpg, .jpeg, .png"/>
                            </div>
                            <div class = "form-group mb-3" id = "preview" style="text-align:center">
                                <i id = "preview" width = "300" height = "300"><?= $id ?></i>
                            </div>
                                <!-- assign as three col -->
                         

                            <div class = "row g-3">
                                <div class="form-floating col-md-4 mb-2 form-group">
                                <input name="txt_lname" class="form-control input-sm input-size" type="text" value ="<?=$lastname?>"/>
                                    <label for="txt_lname">Lastname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                <input name="txt_fname" class="form-control input-sm input-size" type="text" value ="<?=$firstname?>"/>
                                    <label for="txt_fname">Firstname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                <input name="txt_mname" class="form-control input-sm input-size" type="text" value ="<?=$middlename?>"/>
                                    <label for="txt_mname">Middlename</label>
                                </div>
                            </div>
                                    <!-- end here -->
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_bdate" id = "txt_bdate" class="form-control input-sm input-size" value ="<?=$birthdate?>"/>
                                <label for ="txt_bdate">Birthdate:</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_householdnum" class="form-control input-sm input-size" type="number" value ="<?=$householdno?>"/>
                                <label for="txt_householdnum">Household no.</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_street" class="form-control input-sm input-size" type="text" min="1" value ="<?=$street?>"/>
                                <label for="txt_street">Street </label>
                            
                            </div>
                            <div class="form-group mb-2 form-floating">
                                <select name="drop_brgy" id="drop_brgy" class="form-control input-sm input-size form-select" value ="<?=$barangay?>">
                                <option value = "Ambabaay">Ambabaay</option>
                                <option value = "Aporao">Aporao</option>
                                <option value = "Arwas">Arwas</option>
                                <option value = "Ballag">Ballag</option>
                                <option value = "Banog Norte">Banog Norte</option>
                                <option value = "BanogSur">Banog Sur</option>
                                <option value = "Calabeng">Calabeng</option>
                                <option value = "Centro Toma">Centro Toma</option>
                                <option value = "Colayo">Colayo</option>
                                <option value = "Dacap Norte">Dacap Norte</option>
                                <option value = "Dacap Sur">Dacap Sur</option>
                                <option value = "Garrita">Garrita</option>
                                <option value = "Luac">Luac</option>
                                <option value = "Macabit">Macabit</option>
                                <option value = "Masidem">Masidem</option>
                                <option value = "Poblacion">Poblacion</option>
                                <option value = "Quinaoayanan">Quinaoayanan</option>
                                <option value = "Ranao">Ranao</option>
                                <option value = "Ranom Iloco">Ranom Iloco</option>
                                <option value = "San Jose">San Jose</option>
                                <option value = "San Miguel">San Miguel</option>
                                <option value = "San Simon">San Simon</option>
                                <option value = "San Vicente">San Vicente</option>
                                <option value = "Tiep">Tiep</option>
                                <option value = "Tipor">Tipor</option>
                                <option value = "Tugui Grande">Tugui Grande</option>
                                <option value = "Tugui Norte">Tugui Norte</option>
                                </select>
                                <label for ="drop_brgy">Select Barangay</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                    <input name="txt_cno" class="form-control input-sm input-size" type="text" placeholder="Cellphone Number" value = "<?=$contactno?>"  required/>
                                    <label for="txt_cno">Contact Number:</label>
                            </div>
          
                       
                        </div>
                        <!-- end of Personal Background -->
                
                    </div>
            </div>
                <!-- end body -->
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Client"/>
        </div>
        </div>
    </div>
    </form>
</div>
           
</body>
