<?php 
session_start();
include "../../includes/connections.php";
$userID = $_POST['id'];

$sql = "SELECT * FROM tblclientinfo where clientsID='$userID'";
$result = mysqli_query($con,$sql);
while ($trow = mysqli_fetch_array($result)){ 
    $lastname = $trow['lastname'];
    $firstname = $trow['firstname'];
    $middlename = $trow['middlename'];
    $category = $trow['category'];
    $street = $trow['street'];
    $barangay = $trow['barangay'];
    $birthdate = $trow['birthdate'];
    ?> 


<div class = "container">
    <div class = "row">
        <div class ="col-sm-12">          
            <div class="form-group mb-3" style="text-align:center" >
            <input type="hidden" name = "id"  value = "<?=$userID?>">
                <image src="img/<?=$trow['image_name']?>" style="width:200px;height:150px; border-style: solid;"/> 
                </div>
                <div class="form-group mb-2 form-floating">
                        <select name="drop_assist" id="drop_assist" class="form-control input-sm input-size form-select" aria-label="Select Barangay" required >
                            <option selected readonly>Add Transaction</option>
                            <option>Financial Assistance</option>
                            <option>Educational Assistance</option>
                            <option>Medical Assistance</option>
                            <option>Burial Assistance</option>
                            <option>Emergency Shelter</option>
                            <option>Social Case Study Report</option>
                            <option  disabled>--Certificate of Indigency--</option>
                            <option>PAO</option>
                            <option>Philhealth</option>
                            <option>Hospital</option>
                            <option>MCR</option>
                        </select>
                        <label for ="drop_assist">Transaction</label>
                </div>
                
                <div class="form-floating mb-2 form-group">
                    <input name="transac_date" id = "transac_date" class="form-control input-sm input-size" type="date" />
                    <label for ="transac_date">Transaction Date:</label>
                </div>
                <div class = "row g-3">
                    <div class="form-floating col-md-4 mb-2 form-group">
                        <input name="tran_txt_lname" id ="tran_txt_lname"  class="form-control input-sm input-size" type="text" value = "<?=$lastname?>" readonly/>
                        <label for="tran_txt_lname">Lastname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="tran_txt_fname" id ="tran_txt_fname" class="form-control input-sm input-size" type="text" value = "<?=$firstname?>" readonly/>
                        <label for="tran_txt_fname">Firstname</label>
                    </div>
                    <div class="form-floating col-md-4  mb-2 form-group">
                        <input name="tran_txt_mname" id = "tran_txt_mname"class="form-control input-sm input-size" type="text"value = "<?=$middlename?>"readonly />
                        <label for="tran_txt_mname">Middlename</label>
                    </div>
                </div>
                <div class="form-group mb-2 form-floating">
                        <select name="tran_drop_category" id="tran_drop_category" class="form-control input-sm input-size form-select" aria-label="Select Category"readonly >
                        <option selected readonly><?=$category?></option>
                        </select>
                        <label for ="tran_drop_category">Category</label>
                </div>
               
                <div class="form-group  mb-2 form-floating">
                        <input name="tran_txt_street" id = "tran_txt_street" class="form-control input-sm input-size" type="text"value = "<?=$street?>" readonly/>
                        <label for="tran_txt_street">Street</label>
                </div>
                <div class="form-group mb-2 form-floating">
                        <select name="tran_drop_brgy" id="tran_drop_brgy" class="form-control input-sm input-size form-select" aria-label="Select Category"readonly >
                        <option selected readonly><?=$barangay?></option>
                        </select>
                        <label for ="tran_drop_brgy">Barangay</label>
                </div>
                <div class="form-floating mb-2 form-group">
                    <input name="tran_txt_bdate" id = "tran_txt_bdate" class="form-control input-sm input-size" type="date" value = "<?=$birthdate?>" readonly/>
                    <label for ="tran_txt_bdate">Birthdate:</label>
                </div>
        </div>
    </div>
</div>

<?php }?>
<script type = "text/javascript">
    $(document).ready(function(){
        const dateInput = document.getElementById('transac_date');

// ✅ Using the visitor's timezone
dateInput.value = formatDate();

console.log(formatDate());

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}

// ✅ Using UTC (universal coordinated time)
// dateInput.value = new Date().toISOString().split('T')[0];

// console.log(new Date().toISOString().split('T')[0]);

    });
</script>