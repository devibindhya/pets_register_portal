<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Pet_Category</title>
</head>
<body>
<?php
              
      /*Fetching pet category from database using pet_id and return it to ajax*/         
      $pettype=$_POST['p_ID'];
      require_once("dbconnect.php"); 
      $sql2="select * from pet_category where pet_ID='".$pettype."'";
      $result2=$dbh->query($sql2);
      $result2->setFetchMode(PDO::FETCH_ASSOC);
        while ( $d=$result2->fetch()) 
        { ?>
          <option value="<?php echo $d['cat_ID'];?>">
          <?php echo $d['breed_name']; ?>
          </option>  
  <?php } ?>
               
</body>
</html>
