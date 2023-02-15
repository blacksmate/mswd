
<style>
p {
  font-size: 20px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!-- ========================= MODAL ======================= -->
<div class="modal fade" id="addClients" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="2" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<form class="form-horizontal needs-validation" enctype="multipart/form-data" novalidate method="post" action = "addclients/addFunction.php" >
    
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
                                <input id = "txt_lname" name="txt_lname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" required/>
                                    <label for="txt_lname">Lastname</label>
                            
                                <div class="invalid-feedback">
                                    Lastname Required
                                </div>
                                </div>

                                <div class="form-floating col-md-4  mb-2 form-group">
                                <input id = "txt_fname" name="txt_fname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" required/>
                                    <label for="txt_fname">Firstname</label>
                               
                                <div class="invalid-feedback">
                                    Firstname Required
                                </div>
                                </div>

                                <div class="form-floating col-md-4  mb-2 form-group">
                                <input id = "txt_mname" name="txt_mname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" />
                                    <label for="txt_mname">Middlename</label>
                        
                                </div>

                            </div>
                                    <!-- end here -->
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_bdate" id = "txt_bdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" required/>
                                <label for ="txt_bdate">Birthdate:</label>
                             
                                <div class="invalid-feedback">
                                    Birthdate Required
                                </div>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #" autocomplete = "off"/>
                                <label for="txt_householdnum">Household no.</label>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                <input name="txt_street" class="form-control input-sm input-size" type="text" min="1" placeholder="Street" autocomplete = "off" />
                                <label for="txt_street">Street </label>
                                
                                <div class="invalid-feedback">
                                    Street Required
                                </div>
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
                               
                                <div class="invalid-feedback">
                                    Barangay Required
                                </div>
                            </div>
                            <div class="form-floating mb-2 form-group">
                                    <input name="txt_cno" class="form-control input-sm input-size" type="text" placeholder="Cellphone Number" autocomplete = "off" required/>
                                    <label for="txt_cno">Contact Number:</label>
                             
                                <div class="invalid-feedback">
                                    Contact Number Required
                                </div>
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
                                <select select name="drop_gender" id="drop_gender" class="form-control input-sm input-size form-select" aria-label="Select Gender" required>
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                                <label for="drop_gender">Gender</label>
                            </div>
                            <!-- <div class="form-group mb-2 form-floating">
                                <select select name="drop_categ" id="drop_categ" class="form-control input-sm input-size form-select" aria-label="Select Category" required>
                                <option>4Ps</option>
                                <option>Senior Citizen</option>
                                <option>PWD</option>
                                <option>Solo Parent</option>
                                </select>
                                <label for="drop_categ">Category</label>
                            </div> -->

                            <!-- check box -->
    
        <div class = "form-group mb-2">
        <label class = "my-2">Category</label><br>
            <div class="form-check form-check-inline">
                    <input class="form-check-input x" name ="category[]" type="checkbox" value="4Ps" id="4Ps" >
                        <label class="form-check-label" for="4Ps">
                            4P'S
                        </label>
            </div>
            <div class="form-check form-check-inline form-group">
                <input class="form-check-input cate" name ="category[]" type="checkbox" value="Senior Citizen" id="Senior" >
                    <label class="form-check-label" for="Senior">
                        Senior Citizen
                    </label>
            </div>
            <div class="form-check form-check-inline form-group">
                <input class="form-check-input cate"name ="category[]"  type="checkbox" value="PWD" id="PWD" >
                    <label class="form-check-label" for="PWD">
                        PWD
                    </label>
            </div>
            <div class="form-check form-check-inline form-group">
                <input class="form-check-input cate" name ="category[]" type="checkbox" value="Solo Parent" id="Solo Parent" >
                    <label class="form-check-label" for="Solo Parent">
                        Solo Parent
                    </label>
            </div>

            <div class="form-check form-check-inline form-group">
                <input class="form-check-input cate" name ="category[]" type="checkbox" value="Others" id="Others" >
                    <label class="form-check-label" for="Others">
                        Others
                    </label>
            </div>
    


        </div>
  
                            <!--  check box -->
            </div>
                        <!-- end of Personal Background -->

                        
                        <div class ="form-floating col-md-6 col-sm-12">
                            <!-- Spouse's Information -->
                            <p> Spouse's Information </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            
                            <div class = "row g-3">
                                <!-- assign as three col -->
                                <div class="form-floating col-md-4 mb-2 form-group">
                                    <input name="txt_slname" class="form-control input-sm col-sm-4" type="text" placeholder="Lastname" />
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
                         
                            </div>
                        
                            <!-- Mother's Information -->
                            <p> Mother's Information </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            
                            <div class = "row g-3">
                                <div class="form-floating col-md-4 mb-2 form-group">
                                    <input name="txt_mlname" class="form-control input-sm col-sm-4" type="text" placeholder="Lastname" />
                                    <label for="txt_mlname">Lastname</label>
                                    <div class="invalid-feedback">
                                    Lastname Required
                                </div>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_mfname" class="form-control input-sm col-sm-4 " type="text" placeholder="Firstname" />
                                    <label for="txt_mfname">Firstname</label>
                                    <div class="invalid-feedback">
                                        Firstname Required
                                    </div>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_mmname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"  />
                                    <label for="txt_mmname">Middlename</label>
                                 
                                </div>
                            </div>

                            <div class="form-floating mb-5 form-group">
                                <input name="txt_mbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" />
                                <label for ="txt_mbdate">Birthdate:</label>
                                    <div class="invalid-feedback">
                                        Birthdate Required
                                    </div>
                            </div>

                                <!-- Father's Information -->
                            <p> Father's Information </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            
                            <div class = "row g-3">
                                <div class="form-floating col-md-4 mb-2 form-group">
                                    <input name="txt_flname" class="form-control input-sm col-sm-4" type="text" placeholder="Lastname" />
                                    <label for="txt_flname">Lastname</label>
                                    <div class="invalid-feedback">
                                        Lastname Required
                                    </div>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_ffname" class="form-control input-sm col-sm-4 " type="text" placeholder="Firstname" />
                                    <label for="txt_ffname">Firstname</label>
                                    <div class="invalid-feedback">
                                        Firstname Required
                                    </div>
                                </div>
                                <div class="form-floating col-md-4  mb-2 form-group">
                                    <input name="txt_fmname" class="form-control input-sm col-sm-4" type="text" placeholder="Middlename"  />
                                    <label for="txt_fmname">Middlename</label>
                                 
                                </div>
                            </div>

                            <div class="form-floating mb-4 form-group">
                                <input name="txt_fbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" />
                                <label for ="txt_fbdate">Birthdate:</label>
                                    <div class="invalid-feedback">
                                        Birthdate Required
                                    </div>
                            </div>

                            <p> Sibling's Number </p>
                            <hr class ="bg-success border-3 border-top border-success">
                            <div class="form-floating mb-2 form-group">
                                <input name="txtsiblingsno" class="form-control input-sm input-size" type="number" min="1" placeholder="Number of Siblings #" autocomplete = "off"/>
                                <label for="txtsiblingsno">Siblings no</label>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end body -->
        </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" value="Cancel"/>
                <button  class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Client">Submit</button>
            </div>
    
        </div>
    </div>
    </form>
</div>
           


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
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation');
  var checkCount = $("input[name='category[]']:checked").length;
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()){
            
          event.preventDefault()
          event.stopPropagation()
     
        }

        form.classList.add('was-validated')
      }, false)
    })
})()





$('#btn_add').click(function(e){
    var checkCount = $("input[name='category[]']:checked").length;

    if(checkCount == 0)
    {
        e.preventDefault();
        alert("Category is required.");
    }
});
</script>