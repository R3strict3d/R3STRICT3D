<?php
error_reporting(0);
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$search = $_POST['search'];
$author = isset($_POST['author'])?$_POST['author']:'';
$category = isset($_POST['category'])?$_POST['category']:'';
$rec = isset($_POST['rec'])?$_POST['rec']:'';
$q = "select * from book_details where";

if (!empty($search)) {
	$q.=" bookname LIKE '".'%'.$search.'%'."'";
}
if (!empty($author)) {
	$q.=" OR author LIKE '".'%'.$author.'%'."'";
}
if (!empty($category)) {
	$q.=" OR category LIKE '".'%'.$category.'%'."'";
}
if (!empty($rec)) {
	$q.=" ORDER BY id ".$rec;
}
if (empty($search) && empty($author) && empty($category) && empty($rec)) {
    $q = "select * from book_details";
}
// print_r($q);
$result = mysqli_query($conn, $q);
 if (mysqli_num_rows($result) > 0) {
 	$data['status'] = 1;
    $data['data'] = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $data['data'][] = $row;

        }
    echo json_encode($data);
 } else {
 	$data['status'] = 0;
    echo json_encode($data);
 }
$conn->close();
?>
