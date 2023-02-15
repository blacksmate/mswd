
<style>
p {
  font-size: 20px;
}
</style>
<!-- ========================= MODAL ======================= -->

<!-- try the youtube approach by using ajax -->
<div class="modal fade" id="viewclientsModal" >
    
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewclientsModal">Clients Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-view-body">
                    <!-- start body -->
                
                    <!-- end body -->
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" value="Cancel"/>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal2" >
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "viewclientsinfo/edittransacfunction.php">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal2">Transaction Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" href="#viewclientsModal" aria-label="Close"></button>
            </div>
            <div class="modal-view-date">
                    <!-- start body -->
      
                    <!-- end body -->
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" href="#modal2" data-bs-toggle="modal" href="#viewclientsModal" value="Cancel"/>
                <input type="submit" class="btn btn-primary btn-sm" name="btn_update_date" id="btn_update_date" value="Save"/>

            </div>
        </div>
    </div>
</form>
</div>