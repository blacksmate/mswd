<?php
    include "../../includes/connections.php";
$clientsID = $_POST['id'];
$query = "SELECT * FROM test WHERE id = '$clientsID'";
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result)){ 
    $chkcat = explode(", " ,$row['category']);

?>
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "../testfolder/edit.php">
    <h5> Category </h5>  
        <div class="form-check form-check-inline">
        <input type = "hidden" name = "id" value = "<?= $clientsID ?>"/>
                <input class="form-check-input" name ="category[]" type="checkbox" value="4Ps" id="flexCheckDefault" <?php  if (in_array("4Ps",$chkcat)){echo "checked";}?>>
                
                    <label class="form-check-label" for="flexCheckDefault">
                        4P'S
                    </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Senior Citizen" id="Senior" <?php  if (in_array("Senior Citizen",$chkcat)){echo "checked";}?> >
                <label class="form-check-label" for="Senior">
                    Senior Citizen
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input"name ="category[]"  type="checkbox" value="PWD" id="PWD" <?php  if (in_array("PWD",$chkcat)){echo "checked";}?> >
                <label class="form-check-label" for="PWD">
                    PWD
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Solo Parent" id="flexCheckDefault" <?php  if (in_array("Solo Parent",$chkcat)){echo "checked";}?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Solo Parent
                </label>
        </div>

    </form>
<?php 
}

?>