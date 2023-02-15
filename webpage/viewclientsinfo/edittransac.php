<?php include "../../includes/connections.php";
$transacID = $_POST['id'];
$transactionRelease =

$sql = "SELECT * FROM tbltransaction where id='$transacID'";
$result = mysqli_query($con,$sql);
while ($trow = mysqli_fetch_array($result)){ 

?>

<div class = "container">
    <div class = "row">
        <div class ="col-sm-12">          
            <div class="form-group mb-3" style="text-align:center" >
            <input type="hidden" name = "id"  value = "<?=$transacID?>">

                <div class="form-group mb-2 form-floating">
                        <select name="drop_assist" id="drop_assist" class="form-control input-sm input-size form-select" aria-label="Select Barangay" readonly >
                            <option selected readonly><?=$trow['trans_des']?></option>
               
                        </select>
                        <label for ="drop_assist">Transaction</label>
                </div>

                <div class="form-floating mb-2 form-group">
                    <input name="tran_date" id = "tran_date" class="form-control input-sm input-size" type="date" value = "<?=$trow['transacdate']?>" readonly/>
                    <label for ="tran_date">Transaction Date:</label>
                </div>
                <div class="form-floating mb-2 form-group">
                    <input name="tran_release_date" id = "tran_release_date" class="form-control input-sm input-size" type="date" value = "<?=$trow['transacdaterelease']?>"/>
                    <label for ="tran_release_date">Transaction Release Date :</label>
                </div>
        </div>
    </div>
</div>
<?php }?>

