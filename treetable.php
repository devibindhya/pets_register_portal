<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family View</title>
</head>
<style>
.tbl {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.tbl td, .tbl th {
  border: 1px solid #ddd;
  padding: 8px;
}

.tbl tr:nth-child(even){background-color: #f2f2f2;}

.tbl tr:hover {background-color: #ddd;}

.tbl th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<body>
<h2> Family Structure</h2>
<table class="tbl" border solid 1px>
<tr>
<td>pet name</td>
<td>pet id</td>
<td>pet owner id</td>
<td>pet owner name</td>
<td>father id</td>
<td>father name</td>

<td>father owner id</td>
<td>father owner name</td>
<td>mother id</td>
<td>mother name</td>

<td>mother owner id</td>
<td>mother owner name</td>

</tr>
	<?php
    require_once("dbconnect.php");
    /* Table to show the each pets owner and their sire and dam details*/
    $sql1="SELECT 

    PD.pet_name AS PET_NAME,PD.pet_det_ID AS PET_ID,RL.user_id AS PET_OWNER_ID,RL.first_name AS PET_OWNER,
    
    PDLF.pet_det_ID AS FATHER_ID,PDLF.pet_name AS FATHER_NAME,RLF.user_id  AS FATHER_OWNER_ID,RLF.first_name AS FATHER_OWNER_NAME ,
    
    PDLM.pet_det_ID AS MOTHER_ID, PDLM.pet_name AS MOTHER_NAME,RLM.user_id AS MOTHER_OWNER_ID,RLM.first_name AS MOTHER_OWNER_NAME 

    from pet_details PD 
    
    LEFT JOIN pet_details PDLF ON PDLF.pet_det_ID=PD.sire_ID
    LEFT JOIN pet_details PDLM ON PDLM.pet_det_ID=PD.dam_ID
    
    LEFT JOIN register RL ON RL.user_id=PD.user_ID
    LEFT JOIN register RLF ON RLF.user_id=PDLF.user_ID
    LEFT JOIN register RLM ON RLM.user_id=PDLM.user_ID
    
    WHERE PD.pet_ID='P001'" ;

     $query = $dbh -> prepare($sql1);
     $excu=$query -> execute();
     $query->setFetchMode(PDO::FETCH_ASSOC);
     while($res=$query->fetch())
     { ?>
        <tr>
        
        <td><?php echo json_encode($res['PET_NAME']);?></td>
        <td><?php echo json_encode($res['PET_ID']);?></td>
        <td><?php echo json_encode($res['PET_OWNER_ID']);?></td>
        <td><?php echo json_encode($res['PET_OWNER']);?></td>
       
        <td><?php echo json_encode($res['FATHER_ID']);?></td>
        <td><?php echo json_encode($res['FATHER_NAME']);?></td>
        <td><?php echo json_encode($res['FATHER_OWNER_ID']);?></td>
        <td><?php echo json_encode($res['FATHER_OWNER_NAME']);?></td>
        <td><?php echo json_encode($res['MOTHER_ID']);?></td>
        <td><?php echo json_encode($res['MOTHER_NAME']);?></td>
        <td><?php echo json_encode($res['MOTHER_OWNER_ID']);?></td>
        <td><?php echo json_encode($res['MOTHER_OWNER_NAME']);?></td>
        </tr>
<?php
    }
   ?>       
       
</table>
<button style="color:black;"><a href="features.php" style="color:white;"> Home </a></button>
</body>
</html>

