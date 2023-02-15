<?php
$con  = mysqli_connect('localhost','root','','dbmswd');
if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}


$output= array();
$sql = "SELECT *,CONCAT(lastname ,' , ', firstname,' ', middlename)as cname FROM tblclientinfo ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'clientsID',
	1 => 'image_name',
	2 => 'cname',
	3 => 'age',
	4 => 'birthdate',
    5 => 'barangay',
    6 => 'contactno',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE lastname like '%".$search_value."%'";
	$sql .= " OR firstname like '%".$search_value."%'";
	$sql .= " OR middlename like '%".$search_value."%'";
    $sql .= " OR age like '%".$search_value."%'";
	$sql .= " OR birthdate like '%".$search_value."%'";
    $sql .= " OR barangay like '%".$search_value."%'";
    $sql .= " OR contactno like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY clientsID desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))	
{
    $image_source = basename($row['image_name']);
	$sub_array = array();
	$sub_array[] = $row['clientsID'];
	$sub_array[] = "<img src = 'img/$image_source' height = '60px' width = '80px'/>";
	$sub_array[] = $row['cname'];
	$sub_array[] = $row['age'];
	$sub_array[] = $row['birthdate'];
    $sub_array[] = $row['barangay'];
    $sub_array[] = $row['contactno'];
	$sub_array[] = '
    <a href="javascript:void();" data-id="'.$row['clientsID'].'"  class="btn btn-primary btn-sm transac" >
        <i class="fa fa-plus-circle" aria-hidden = "true"> </i> Transaction</a> 
    <a href="javascript:void();" data-id="'.$row['clientsID'].'"  class="btn btn-success btn-sm edit" >
        <i class="fas fa-pencil-alt" aria-hidden = "true"> </i> Update</a>  

    <a href="javascript:void();" data-id="'.$row['clientsID'].'"  class="btn btn-secondary btn-sm view" > 
        <i class="fas fa-eye" aria-hidden = "true"> </i> View</a>';
	
    $data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
