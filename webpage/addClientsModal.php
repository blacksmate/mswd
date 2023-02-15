
<style>
p {
  font-size: 20px;
}
</style>


<!-- ========================= MODAL ======================= -->
<body>
<div class="modal fade" id="addClients" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "addFunction.php">
    
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Clients Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
                    <!-- start body -->
            <div class = "container">
                    <div class = "row">
                        <div class ="form-floating col-md-6 col-sm-12">
                            <!-- image file start -->
                            <div class="form-group mb-2">
                                <input  type="file" name="upload_file" class="form-control" id= "upload_file" onchange ="getImagePreview(event)"  accept = ".jpg, .jpeg, .png"/>
                            </div>
                            <div class = "form-group mb-3" id = "preview" style="text-align:center">
                                <i id = "preview" width = "300" height = "300"></i>
                            </div>
                                <!-- assign as three col -->
                         

                            <div class = "row g-3">
                                <div class="form-floating col-md-4 mb-2 form-group">
                                <input name="txt_lname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" required/>
                                    <label for="txt_lname">Lastname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                <input name="txt_fname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" required/>
                                    <label for="txt_fname">Firstname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                <input name="txt_mname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" required/>
                                    <label for="txt_mname">Middlename</label>
                                </div>
                            </div>
                                    <!-- end here -->
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_bdate" id = "txt_bdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" required/>
                                <label for ="txt_bdate">Birthdate:</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #" autocomplete = "off"/>
                                <label for="txt_householdnum">Household no.</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_street" class="form-control input-sm input-size" type="text" min="1" placeholder="Street" autocomplete = "off" required/>
                                <label for="txt_street">Street </label>
                            
                            </div>
                            <div class="form-group mb-2 form-floating">
                                <select name="drop_brgy" id="drop_brgy" class="form-control input-sm input-size form-select" aria-label="Select Barangay" required>
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
                                <label for ="drop_brgy">Select Barangay</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                    <input name="txt_cno" class="form-control input-sm input-size" type="text" placeholder="Cellphone Number" autocomplete = "off" required/>
                                    <label for="txt_cno">Contact Number:</label>
                            </div>
                            <div class="form-group mb-2 form-floating">
                                <select name="drop_civilstatus" id="drop_civilstatus" class="form-control input-sm input-size form-select" aria-label="Select Barangay" required>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widowed </option>
                                </select>
                                <label for ="drop_civilstatus">Civil Status</label>
                            </div>
                            <div class="form-group mb-2 form-floating">
                                <select select name="drop_gender" id="drop_civilstatus" class="form-control input-sm input-size form-select" aria-label="Select Barangay" required>
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                                <label for="drop_gender">Gender</label>
                            </div>
                        </div>
                        <!-- end of Personal Background -->

                        
                        <div class ="form-floating col-md-6 col-sm-12">
                            <!-- Spouse's Information -->
                            <p> Spouse's Information </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            
                            <div class = "row g-3">
                                <!-- assign as three col -->
                                <div class="form-floating col-md-4 mb-2 form-group">
                                    <input name="txt_slname" class="form-control input-sm col-sm-4" type="text" placeholder="Lastname"/>
                                    <label for="txt_slname">Lastname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_sfname" class="form-control input-sm col-sm-4 " type="text" placeholder="Firstname" />
                                    <label for="txt_sfname">Firstname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_smname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"  />
                                    <label for="txt_smname">Middlename</label>
                                </div>
                            </div>

                            <div class="form-floating mb-5 form-group">
                                <input name="txt_sbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" />
                                <label for ="txt_sbdate">Birthdate:</label>
                            </div>
                        
                            <!-- Mother's Information -->
                            <p> Mother's Information </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            
                            <div class = "row g-3">
                                <div class="form-floating col-md-4 mb-2 form-group">
                                    <input name="txt_mlname" class="form-control input-sm col-sm-4" type="text" placeholder="Lastname"/>
                                    <label for="txt_mlname">Lastname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_mfname" class="form-control input-sm col-sm-4 " type="text" placeholder="Firstname" />
                                    <label for="txt_mfname">Firstname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_mmname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"  />
                                    <label for="txt_mmname">Middlename</label>
                                </div>
                            </div>

                            <div class="form-floating mb-5 form-group">
                                <input name="txt_mbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" />
                                <label for ="txt_mbdate">Birthdate:</label>
                            </div>

                                <!-- Father's Information -->
                            <p> Father's Information </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            
                            <div class = "row g-3">
                                <div class="form-floating col-md-4 mb-2 form-group">
                                    <input name="txt_flname" class="form-control input-sm col-sm-4" type="text" placeholder="Lastname"/>
                                    <label for="txt_flname">Lastname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_ffname" class="form-control input-sm col-sm-4 " type="text" placeholder="Firstname" />
                                    <label for="txt_ffname">Firstname</label>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_fmname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"  />
                                    <label for="txt_fmname">Middlename</label>
                                </div>
                            </div>

                            <div class="form-floating mb-2 form-group">
                                <input name="txt_fbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" />
                                <label for ="txt_fbdate">Birthdate:</label>
                            </div>
                        </div>
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


<?php include "../includes/footer.php";?>
<script type ="text/javascript">

function getImagePreview(event){
    var image = URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('preview');
    var newimg = document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width = "300";
    newimg.height = "150";
    imagediv.appendChild(newimg);

}
</script>
</html>