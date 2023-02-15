<!-- ========================= MODAL ======================= -->
<div class="modal fade" id="editClients" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "updateclients/updateFunction.php">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Clients Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body-edit">
                    <!-- start body -->
                    <!-- end body -->
        </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" value="Cancel"/>
                <input type="submit" class="btn btn-primary btn-sm" name="btn_update" id="btn_update" value="Update Client"/>
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
</script>