
<style>
p {
  font-size: 20px;
}
</style>
<!-- ========================= MODAL ======================= -->

<!-- try the youtube approach by using ajax -->
<div class="modal fade" id="addTransactionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "addtransaction/addTransactionFunction.php">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransactionModal">Clients Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-bodyTransaction">
                    <!-- start body -->
                
                    <!-- end body -->
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" value="Cancel"/>
                <input type="submit" class="btn btn-primary btn-sm" name="btn_add_transac" id="btn_add_transac" value="Add Transaction"/>
            </div>
        </div>
    </div>
</form>
</div>
