<?php
/* Displaying already inserted data to textbox  based on the dropdown selection using xml*/
require_once("dbconnect.php");
$_SESSION['pet_attr_ID']=rand(1000,1000000);
/* Getting userid of the logged in person from session*/
//$id=$_SESSION["u_id"];  
/* Getting the pet_details_id of the seleceted dropdown which passed as a parameter to XML*/     
$id=$_REQUEST['id'];
if($id!=="")
{
	$qury=$dbh->prepare("select * from pet_attributes where pet_det_ID='$id'");
	$execu=$qury->execute();
	$qury->setFetchMode(PDO::FETCH_ASSOC);
	$res=$qury->fetch();
	$pet_attr_id=$res['pet_attr_ID'];
	$height= $res['height'];
	$weight = $res['weight'];
	$length = $res['length'];
	$color= $res['color'];
	$heat_period= $res['heat_period'];
    $result = array("$pet_attr_id","$height","$weight","$length","$color","$heat_period",);
	$myjson=json_encode($result);
	echo $myjson;
}

?>