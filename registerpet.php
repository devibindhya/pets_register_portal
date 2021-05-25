<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true">
    <title>Register Pet</title>
    <style>
* {
  box-sizing:border-box;
  margin:0;
  padding:0;
}
.web-content{
  
  position:absolute;
 
  min-height:100vh;
  
  width:100%;
 padding:3%;
}
.web-content {
  background: url("image/login.jpeg"); 
  background-size: cover;
 background-repeat: no-repeat;
 
  color:#efeff0;
}

#container {
background-color:rgba(12, 12, 12, 0.829);
width:20rem;

 margin: auto;  
position: relative;
align:center;
top: 0;

left: 0;
right: 0;
bottom: 0;

box-shadow: rgba(22, 22, 27, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

}
header {
text-align: center;
vertical-align: top;
line-height: 3rem;
height: 3rem;
/* background: rgba(3, 3, 90, 0.7); */
background: rgba(10, 37, 90, 1);
font-size: 1.4rem;
color: #d3d3d3;

/* border-radius: 80% 20% / 10% 90%; */
/*margin-top: 5%;*/

}

fieldset {
border: 0;
text-align: center;
}

input[type="submit"] {
background: rgba(235, 30, 54, 1);
border: 0;
display: block;
width: 50%;
margin: 0 auto;
color: white;
padding: 0.7rem;
cursor: pointer;
position: relative;

}

.contentinput {
background: transparent;
border: 0;
border-left: 4px solid;
border-color: #FF0000;
padding: 10px;
color:white;
width:300px;
border-radius: 1rem;
position: relative;
margin-right: 7%;
margin-left: 5%;

}
.radiocontent
{
  
border: 0;
text-align: left;
width: 10px;
margin-left: 5%;
margin-right:10px;
color: white;
cursor: pointer;
position: relative;
} 

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,select:focus{
outline: 0;
background: rgba(235, 30, 54, 0.7);
border-radius: 1.2rem;
border-color: transparent;
position: relative;
}

::placeholder {
color: white;
}



/*Media queries */

@media all and (min-width: 280px) and (max-width: 568px) {
#container {
  margin-top: 15%;
  margin-bottom: 10%;
  position: relative;
  overflow: hidden;
}
}
@media all and (min-width: 569px) and (max-width: 768px) {
  #container {
      margin-top: 15%;
      margin-bottom: 10%;
      position: relative;
      overflow: hidden;
      
  }
}
/*====================For all media================*/
@media all and (min-width: 280px) and (max-width: 568px) {
  .web-content,
.office-content {
  margin-top: 0;
  margin-bottom: 0;
  position: relative;
  text-align: right;
  
  
}
}
@media all and (min-width: 569px) and (max-width: 768px) {
  .web-content,
.office-content {
      margin-top: 0;
      margin-bottom: 0;
      position: relative;
      text-align: right;
      
  }
}
    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/ajax.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
/* Fetching all the categories from database when the user select the pet type */
$(document).ready(function() {
  $("#pettype").change(function() {
    var pet_ID=$("#pettype").val();

        $.ajax({
        method: "POST",
        url: "category.php",
        data: {p_ID:pet_ID} 
        
        }).done(function(data){
        $("#Categoryname").html(data);
          });
  });
});

</script>     
</head>
<body>

<?php   
session_start();
  /*Get the userid from session variable while login */
  //$user_id=$_SESSION['u_id'];
  require_once("dbconnect.php");
  $_SESSION['pet_det_ID']=rand(1000,1000000);
  /*Using ajax while the page load all the pet types  are displaying on select menu */
  $sql1="select * from pet";
  $result1=$dbh->query($sql1);
  $result1->setFetchMode(PDO::FETCH_ASSOC);
?>
  
  <div class="web-content" style="overflow: hidden;">
      <div id="container" style="overflow: hidden;"  >
          <header>Register Pet Details  </header>

          <!-- Registration Form for enetering Pet Details -->
          <form method="post" id="regform" >
             <fieldset>
                <br/>
                <input type="text" name="petname" id="petname" placeholder="PET NAME" required autofocus class="contentinput" autocomplete="off">
                <br/><br/><br/>
              
                  <select  name="pettype" id="pettype" placeholder="PET TYPE" required class="contentinput" > 
                  
                  <option value="">-- PET TYPE --</option> 
                  <?php
                                   
                    while ( $d=$result1->fetch()) 
                    { ?>
                        <option value="<?php echo $d['pet_ID'];?>">
                        <?php
                         echo $d['pet_type'];
                         ?>
                        </option>  
                      <?php                
                    } ?>
                  
                  </select>

                <br/><br/><br/>
                <select name="Categoryname" id="Categoryname" placeholder="BREED NAME" 
                 required class="contentinput">
                 <option value="notKnown">-- BREED NAME --</option>  
                </select> <br/><br/><br/>
               
                <input type="text" name="sire" id="sire" placeholder="SIRE ID ( Male Parent )" 
                 required class="contentinput" list="sireId" autocomplete="off">
                <datalist id="sireId">
                      <option value="unKnown">
                </datalist> <br/> <br/><br/>
                
                <input type="text" name="dam" id="dam" placeholder="DAM ID ( Female Parent )" 
                 required class="contentinput" list="damID" autocomplete="off">
                <datalist id="damID">
                      <option value="unKnown">
                </datalist> <br/><br/>
                
            
                <fieldset style="border: #FF0000 3px solid; padding: 5px;text-align: left;border-radius: 1rem; margin-left:5%;width:90%;overflow:hidden" >

                <legend>Gender</legend>
                <input type="radio" id="male" name="gender" value="male" class="radiocontent" >
                <label for="female">Male</label>
                             
                <input type="radio" id="female" name="gender" value="female" class="radiocontent">
                <label for="female">Female</label>
                          
                </fieldset><br/>
                <fieldset style="border: #FF0000 3px solid; padding: 10px;text-align: left;border-radius: 1rem; margin-left:5%;width:90%;overflow:hidden" >
                <legend>Date of Birth</legend>
                <input type="date" id="dob" name="dob" required style="width:100%;" >
                </fieldset> <br/>

                <label for="submit"></label>
                <b> <input type="submit" name="submit" id="submit" value="SUBMIT" class="contentinput"></b><br/>
                </fieldset>
                <a href="features.php" style="color:white;"> BACK TO PREVIOUS PAGE</a>
          </form>
<?php
  if(isset($_POST['submit']))
  {

   $pet_det_ID=$_SESSION['pet_det_ID'];
   $petname=$_POST['petname'];
   $petID=$_POST['pettype'];
   $CatID=$_POST['Categoryname'];
   $sire=$_POST['sire'];
   $dam=$_POST['dam'];
   $gender=$_POST['gender']; 
   $dob=$_POST['dob'];

try{
    require_once("dbconnect.php");
    /*Inserting pet deatails from form to database*/
    $sql= "INSERT INTO pet_details(pet_det_ID,user_ID,pet_ID,cat_ID,pet_name,sire_ID,dam_ID,gender,dob) VALUES 
              ($pet_det_ID,'17','$petID','$CatID','$petname','$sire','$dam','$gender','$dob')";
    $dbh->exec($sql);
    echo "<script>alert('Yor Pet is Registered successfully')</script>";
  }
catch(PDOException $e)
 {
    echo $sql . "<br>" . $e->getMessage();
 }
  
} 
?>
       </div>
      </div>
</body>
</html>