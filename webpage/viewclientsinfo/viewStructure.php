<?php 

include "../../includes/connections.php";
$userID = $_POST['id'];
$sql = "SELECT * FROM tblclientinfo where clientsID='$userID'";
$result = mysqli_query($con,$sql);
while ($erow = mysqli_fetch_array($result)){ 
 ?>

    
     <div class = "container">
        <div class = "row">
       
            <div class ="form-floating col-md-6 col-sm-12">
                <!-- image file start -->
                <input type = "hidden" name = "id" value = "<?= $userID ?>"/>
             
                <div class = "form-group mb-3" id = "preview" style="text-align:center">
                    <i id = "edit_preview" width = "200" height = "150">
                    <image src="img/<?=$erow['image_name']?>" style="width:200px;height:150px;border-style: solid; "/> 

                    </i>                                
                    
                </div>
                    <!-- assign as three col -->
                

                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                    <input name="edittxt_lname" class="form-control input-sm input-size" type="text" placeholder="Lastname" autocomplete = "off" value = "<?=$erow['lastname']?>" readonly/>
                        <label for="edittxt_lname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                    <input name="edittxt_fname" class="form-control input-sm input-size" type="text" placeholder="Firstname" autocomplete = "off" value = "<?=$erow['firstname']?>" readonly/>
                        <label for="edittxt_fname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                    <input name="edittxt_mname" class="form-control input-sm input-size" type="text" placeholder="Middlename" autocomplete = "off" value = "<?=$erow['middlename']?>" readonly/>
                        <label for="edittxt_mname">Middlename</label>
                    </div>
                </div>
                        <!-- end here -->
                <div class="form-floating mb-2 form-group">
                    <input name="edittxt_bdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate"value = "<?=$erow['birthdate']?>" readonly/>
                    <label for ="edittxt_bdate">Birthdate:</label>
                </div>
                <div class="form-floating mb-2 form-group">
                    <input name="edittxt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #" value = "<?=$erow['householdnum']?>"autocomplete = "off" readonly/>
                    <label for="edittxt_householdnum">Household no.</label>
                </div>
                <div class="form-floating mb-2 form-group">
                    <input name="edittxt_street" class="form-control input-sm input-size" type="text" min="1" placeholder="Street" autocomplete = "off" value = "<?=$erow['street']?>" readonly/>
                    <label for="edittxt_street">Street </label>
                
                </div>
                <div class="form-group mb-2 form-floating">
                    <select name="editdrop_brgy" id="editdrop_brgy" class="form-control input-sm input-size form-select" aria-label="Select Barangay" readonly>
                    <option selected><?=$erow['barangay']?></option>
                   
                    </select>
                    <label for ="editdrop_brgy">Select Barangay</label>
                </div>
                <div class="form-floating mb-2 form-group">
                        <input name="edittxt_cno" class="form-control input-sm input-size" type="text" placeholder="Cellphone Number" value = "<?=$erow['contactno']?>"  autocomplete = "off" readonly/>
                        <label for="edittxt_cno">Contact Number:</label>
                </div>
                <div class="form-group mb-2 form-floating">
                    <select name="editdrop_civilstatus" id="drop_civilstatus" class="form-control input-sm input-size form-select" aria-label="Select Status" readonly>
                    <option selected ><?=$erow['stat']?></option>
               
                    </select>
                    <label for ="editdrop_civilstatus">Civil Status</label>
                </div>
                <div class="form-group mb-2 form-floating">
                    <select  name="editdrop_gender" id="editdrop_gender" class="form-control input-sm input-size form-select" aria-label="Select Barangay" readonly>
                    <option selected ><?=$erow['gender']?></option>
                
                    </select>
                    <label for="editdrop_gender">Gender</label>
                </div>

                
                <div class="form-group mb-2 form-floating">
                    <select  name="editdrop_categ" id="editdrop_categ" class="form-control input-sm input-size form-select" aria-label="Select Category" readonly>
                    <option selected ><?=$erow['category']?></option>
             
                    </select>
                    <label for="editdrop_categ">Category</label>
                </div>
            </div>
            <!-- end of Personal Background -->
            <?php }?>
            <?php 
            $sqlother = "SELECT * FROM tblclientotherinfo where clientsID='$userID'";
            // $sqlother1 = "SELECT 
            //             c.* , 
            //             co.* 
            //             FROM tblclientinfo c, tblclientotherinfo co 
            //      WHERE c.clientsID = co.clients_ID";
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
                        <input name="txt_slname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['SpouseLastname']?>"  placeholder="Lastname" readonly/>
                        <label for="txt_slname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_sfname" class="form-control input-sm col-sm-4 " type="text" value = "<?=$orow['SpouseFirstname']?>"  placeholder="Firstname" readonly />
                        <label for="txt_sfname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_smname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['SpouseMiddlename']?>" placeholder="Middlename"  readonly/>
                        <label for="txt_smname">Middlename</label>
                    </div>
                </div>

                <div class="form-floating mb-5 form-group">
                    <input name="txt_sbdate" class="form-control input-sm input-size" type="date" value = "<?=$orow['SpouseBirthdate']?>" placeholder="Birthdate" readonly/>
                    <label for ="txt_sbdate">Birthdate:</label>
                </div>
            
                <!-- Mother's Information -->
                <p> Mother's Information </p>
                <hr class ="bg-success border-3 border-top border-success">
                
                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                        <input name="txt_mlname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['MotherLastname']?>" placeholder="Lastname" readonly/>
                        <label for="txt_mlname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_mfname" class="form-control input-sm col-sm-4 " type="text" value = "<?=$orow['MotherFirstname']?>" placeholder="Firstname" readonly />
                        <label for="txt_mfname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_mmname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['MotherMiddlename']?>" placeholder="Middlename" readonly />
                        <label for="txt_mmname">Middlename</label>
                    </div>
                </div>

                <div class="form-floating mb-5 form-group">
                    <input name="txt_mbdate" class="form-control input-sm input-size" type="date" placeholder="Birthdate" value = "<?=$orow['MotherBirthdate']?>" readonly/>
                    <label for ="txt_mbdate">Birthdate:</label>
                </div>

                    <!-- Father's Information -->
                <p> Father's Information </p>
                <hr class ="bg-success border-3 border-top border-success">
                
                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                        <input name="txt_flname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['fatherLastname']?>" placeholder="Lastname" readonly/>
                        <label for="txt_flname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_ffname" class="form-control input-sm col-sm-4 " type="text" value = "<?=$orow['fatherFirstname']?>" placeholder="Firstname" readonly/>
                        <label for="txt_ffname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="txt_fmname" class="form-control input-sm col-sm-4" type="text" value = "<?=$orow['fatherMiddlename']?>" placeholder="Middlename" readonly />
                        <label for="txt_fmname">Middlename</label>
                    </div>
                </div>

                <div class="form-floating mb-5 form-group">
                    <input name="txt_fbdate" class="form-control input-sm input-size" type="date" value = "<?=$orow['fatherBirthdate']?>" placeholder="Birthdate" readonly/>
                    <label for ="txt_fbdate">Birthdate:</label>
                </div>

                    <!-- Number of Siblings -->
                    <p>Sibling's Number</p>
                <hr class ="bg-success border-3 border-top border-success">

                <div class="form-floating mb-4 form-group">
                                <input name="txtsiblingsno" class="form-control input-sm input-size" type="number" min="1" placeholder="Number of Siblings #" value = "<?= $orow['nochildren']?>" readonly/>
                                <label for="txtsiblingsno">Number of Siblings</label>
                </div>
            </div>
            <?php }?>
     <!-- viewing the transaction / assistance -->
<div class="box-body table-responsive mt-3">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Transaction Description</th>
                <th>Transaction Date</th>
                <th>Transaction Release Date</th>
                <th>Transaction Release Action</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                $mysqli = "SELECT   id ,clientsid,
                trans_des, transacdate,transacdaterelease, category,birthdate,
                CONCAT(street, ', ',barangay) as c_address
                FROM tbltransaction WHERE clientsid =  '$userID' ORDER BY transacdate DESC";
                $mysquery = mysqli_query($con, $mysqli);
                while($tranrow = mysqli_fetch_array($mysquery))
                {
                ?>
            <tr>
                <td><?php echo $tranrow['trans_des'] ?></td>
                <td><?php echo $tranrow['transacdate'] ?></td>
                <td><?php echo $tranrow['transacdaterelease'] ?></td>
                <td><button id="update_date" data-id = "<?=$tranrow['id']?>" class = "btn btn-success btn-sm update_date">
                                            <i class="fas fa-pencil-alt" aria-hidden = "true"> 
                                            </i> Update</button>
                  
                </td>
            </tr>
                <?php }?>
        </tbody>
    </table>
</div>
<!-- end of table -->
        </div>
    </div>
    



<script>
  
        //for datatable
        $(document).ready(function () {
            $('#example').DataTable();
        });



        $(document).ready(function(){
        $('.update_date').click(function(){
            var id = $(this).data('id');
            // alert(id);
            $.ajax({
                url : 'viewclientsinfo/edittransac.php',
                type : 'post',
                data : {id : id},
                success : function(respose){
                    $('#modal2').modal('show');
                    // $('#viewclientsModal').modal('hide');
                    $('.modal-view-date').html(respose);
                }
            });
        });
        
    });
</script>
<style>
.modal { overflow-y: auto }

</style>