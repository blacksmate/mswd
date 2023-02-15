<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class = "row">
    <div class = "col-md-12">
        
        <div class = "panel-body">
            <div class="table-responsive">
                <table class = "table table-bordered">
                    <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    </tr>
                    </thead>
                    <?php
                        include "../../includes/connections.php";
                        
                        $query = "SELECT * FROM test";
                        $result = mysqli_query($con,$query);
                        ?>
                    <tbody>
                            <?php while ($row = mysqli_fetch_array($result)){ ?> 
                                <tr>   
                                <td> <?=$row['id']; ?></td>
                                <td> <?=$row['category']; ?></td>
                                <td>
                                    <button id="edit" data-id = "<?=$row['id']?>" class = "btn btn-primary btn-sm edit">
                                    <i class="fa fa-plus-circle" aria-hidden = "true"> 
                                    </i> Edit </button>
                                </td>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "../testfolder/index.add.php">
    <h5> Category </h5>  
        <div class="form-check form-check-inline">
                <input class="form-check-input" name ="category[]" type="checkbox" value="4Ps" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        4P'S
                    </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Senior Citizen" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Senior Citizen
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input"name ="category[]"  type="checkbox" value="PWD" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    PWD
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name ="category[]" type="checkbox" value="Solo Parent" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Solo Parent
                </label>
        </div>
        <input type="submit" class="btn btn-primary btn-sm" name="test" id="test" value="Add category"/>
    </form>

    
</div>
    
</div>

<style>
p {
  font-size: 20px;
}
</style>
<!-- ========================= MODAL ======================= -->

<!-- try the youtube approach by using ajax -->

<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
<form class="form-horizontal"  method="post" enctype="multipart/form-data" action = "../testfolder/edit.php">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodal">Clients Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body-edit">
                    <!-- start body -->
                
                    <!-- end body -->
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" value="Cancel"/>
                <input type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" value="Update"/>
            </div>
        </div>
    </div>
</form>
</div>


    <!-- Start  -->
    <?php include "../../includes/footer.php"?>
    <!-- End  -->
<script>
  $(document).ready(function(){
        $('.edit').click(function(){
            var id = $(this).data('id');
            // alert(id);
            $.ajax({
                url : '../testfolder/editview.php',
                type : 'post',
                data : {id : id},
                success : function(respose){
                    $('#editmodal').modal('show');
                    $('.modal-body-edit').html(respose);
                }
            });
        });
    });
</script>

</body>
</html>