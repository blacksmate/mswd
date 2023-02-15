

<?php
//fetch.php
$condition = $_POST['condition'];


$connect = mysqli_connect("localhost", "root", "", "dbmswd");
$columns = array('c.clientsID','c.image_name','cname','c.lastname','c.firstname','c.middlename','c.age','c.birthdate','c.barangay','c.contactno','c.category','t.transacdate','t.trans_des');
// $query = "SELECT *,CONCAT(lastname ,' , ', firstname,' ', middlename)as cname FROM tblclientinfo WHERE category LIKE '%Solo Parent%' AND";
$query = "SELECT c.*, CONCAT(c.lastname ,' , ', c.firstname,' ', c.middlename)as cname,
                 t.* FROM tblclientinfo c, tbltransaction t 
                 WHERE c.clientsID = t.clientsID AND 
                 c.category LIKE'%$condition%' AND ";
if($_POST["is_date_search"] == "yes")
{
 
 $query .='t.transacdate BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND  ';
}

if(isset($_POST["search"]["value"]))
{

 $query .= '
  (c.lastname LIKE "%' .$_POST["search"]["value"].'%"
  OR c.firstname LIKE "%' .$_POST["search"]["value"].'%"
  OR c.middlename LIKE "%' .$_POST["search"]["value"].'%"
  OR c.age LIKE "%' .$_POST["search"]["value"].'%"
  OR c.birthdate LIKE "%' .$_POST["search"]["value"].'%"
  OR c.barangay LIKE "%' .$_POST["search"]["value"].'%"
  OR t.trans_des LIKE "%' .$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
 
}
else
{
 $query .= ' ORDER BY c.clientsID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
$image_source = basename($row['image_name']);
 $sub_array = array();
 $sub_array[] = $row["clientsID"];
 $sub_array[] = "<img src = 'img/$image_source' height = '60px' width = '80px'/>";
 $sub_array[] = $row['cname'];
 $sub_array[] = $row["age"]; 
 $sub_array[] = $row["birthdate"];
 $sub_array[] = $row["barangay"];
 $sub_array[] = $row["contactno"];
 $sub_array[] = $row["trans_des"];
 $sub_array[] = $row["transacdate"];
 $data[] = $sub_array;
}



function get_all_data($connect)
{
 $query = "SELECT c.*, CONCAT(c.lastname ,' , ', c.firstname,' ', c.middlename)as cname,
 t.* FROM tblclientinfo c, tbltransaction t WHERE c.clientsID =  t.clientsID and c.category";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);


?>
