

<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbmswd");
$columns = array('clientsID','lastname','firstname','middlename','age','birthdate','barangay','contactno');

$query = "SELECT * FROM tblclientinfo WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'birthdate BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (lastname LIKE "%' .$_POST["search"]["value"].'%"
  OR firstname LIKE "%' .$_POST["search"]["value"].'%"
  OR middlename LIKE "%' .$_POST["search"]["value"].'%"
  OR age LIKE "%' .$_POST["search"]["value"].'%"
  OR birthdate LIKE "%' .$_POST["search"]["value"].'%"
  OR barangay LIKE "%' .$_POST["search"]["value"].'%"
  OR contactno LIKE "%' .$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY clientsID DESC ';
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
 $sub_array = array();
 $sub_array[] = $row["clientsID"];
 $sub_array[] = $row["lastname"];
 $sub_array[] = $row["firstname"];
 $sub_array[] = $row["middlename"];
 $sub_array[] = $row["age"];
 $sub_array[] = $row["birthdate"];
 $sub_array[] = $row["barangay"];
 $sub_array[] = $row["contactno"];

 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tblclientinfo";
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
