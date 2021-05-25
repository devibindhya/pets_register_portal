<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Attribute Form</title>
    <style>
        
        body {
                font-size: 14px;
                line-height: 1.8;
                color:#222;
                font-weight: 500;
                font-family: 'Poppins';
                margin: 0px;
                background: #282828;
                padding: 8px;
                border-radius: 1rem;
            }

            .main {
                position: relative; 
              }

            .container {
                overflow: hidden;
                width: 1320px;
                margin: 0 auto;
                background:rgb(252, 252, 252);
             }
        
            .signup-form {
                width: 1015px;
                margin-top: -2px;
                margin-bottom: -8px;
                overflow: hidden; 
             }
             .signup-content {
                display:flex;
                border-radius: 1rem;
               
             }
             img {
                width: 100%;
                margin:auto;
                /* height: 123vh;  */
                overflow: hidden;
               
             }
             .signup-img {
                overflow: hidden;
                position: relative;
                width: 500px;
                background-image: url("image/home2.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                
                
             }
             .signup-img-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform:translate(-50%, -350%);
                text-align: center;
                width: 100%;
                color:white;
                
                
             }
             .register-form {
                padding: 20px 115px 90px 80px;     
                margin-bottom: -8px;
                
             }
             .form-row {
                display:flex;
                margin: 0 -30px;
             }
             .form-group {                                                   
                width: 50%;
                padding: 0 30px;
               
             }
             .form-input, .form-select, .form-radio {
                margin-bottom: 23px;
                
                
             }         
              label, input,select {
                display:block;
                width: 100%;
                position:relative;                             
             }
              label {
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 7px;
             }
              label.required {
                position: relative;
             }
             label.required:after {
                content: '*';
                margin-left: 2px;
                color: #b90000;
             }
             input {
                box-sizing: border-box;
                border: 1px solid rgb(120, 124, 120);
                padding: 14px 20px;
                border-radius:5px;
                font-size: 14px;
                font-family: 'Poppins';

             }
             input:focus {
                border: 1px solid green;
             }
             select {
                position: relative;
                box-sizing: border-box;
                border: 1px solid rgb(120, 124, 120);
                padding: 14px 20px;
                border-radius:5px;
                font-size: 14px;
                font-family: 'Poppins';
                margin-left: auto;
                left:0;
             }
             select:focus {
                border: 1px solid green;
             }

            .label-flex {
                justify-content:space-between;
             }
             .label-flex:label {
                width: auto;
             }
             .form-submit {
                text-align: center;   
             }
             .submit {
                width: 200px;
                height: 50px;
                display: inline-block;
                font-family: 'Poppins';
                font-weight: bold;
                font-size: 14px;
                padding: 10px;
                border: none;
                cursor: pointer;
                text-transform: uppercase;
                border-radius:5px;
                background: rgba(105, 190, 142, 0.418);
                
            }
            
/*=========For all Media Style=====================*/
@media screen and (max-width: 1024px) {
    .container {
        width: calc( 100% - 30px);
        max-width: 100%;
        margin: 0 auto;
    }
    .signup-img {
        display: none;
    }
    .signup-form {
        width: 100%;
    }
    .register-form {
        padding: 93px 80px 90px 80px;
    }
}

@media screen and (max-width: 992px) {

    .signup-content {
        width: 100%;
    }
    .form-radio-item {
        margin-right: 15px;
    }
    .register-form {
        padding: 93px 30px 90px 30px;
    }
}

@media screen and (max-width: 768px)  {
    .form-row {
        flex-direction:column;
        margin: 0px;
    }
    .form-row .form-group {
        width: 100%;
        padding: 0 0px;
    }
}


/*end 480px*/
@media screen and (max-width: 480px) {
    .submit {
        width: 100%;
    }
    #submit {
        margin-bottom: 20px;
        margin-right: 0px;
    }
    .form-radio-group {
     flex-direction:column;
    }
}
    </style>
</head>
<body>
    <?php
       
        require_once("dbconnect.php");
        $_SESSION['pet_attr_ID']=rand(1000,1000000);
        //$userid=$_SESSION["u_id"];

        //$sql="select * from pet_details where user_id=$userid";
        $sql="select * from pet_details where user_id=17";
        $res=$dbh->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <div class="main">
       <!--  Form for adding additional pet information (pet attributes)-->
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <div class="signup-img-content">
                        <h1>Add Pet Growth Details</h1>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="pet_det_id" class="required">Choose your pet ID</label>
                                <!--Showing all the registered pets of the logged in user in the select menu  -->
                                    <select name="pet_det_id" id="pet_det_id" onchange="GetDetail(this.value)" >
                                       <?php
                                            while($d=$res->fetch()){
                                       ?>
                                        <option id="pdid" value="<?php echo $d['pet_det_ID']?>" >
                                        <?php
                                            echo $d['pet_name']." ( ".$d['pet_det_ID']." ) ";
                                        ?>
                                        </option>
                                        <?php
                                            }
                                        ?>   
                                    </select>
                                </div>
                               <input type="hidden" id="hid_atr_id" name="petatrid">
                                <div class="form-input">                                    
                                    <label for="height" class="required">Height</label>
                                    <input type="number" name="height" id="height" value="0" step="0.1" style="width: 70%;"> 
                                    <select name="hmeasure" id="hmeasure" style="width: 30%;margin-top:-47px;text-align: left;">
                                        <option value="cm">cm</option>
                                        <option value="meter">meter</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="weight" class="required">Weight</label>
                                    <input type="number" name="weight" id="weight" value="0" step="0.1" style="width: 70%;">
                                    <select name="Wmeasure" id="Wmeasure" style="width: 30%;margin-top:-47px;text-align: left;">
                                        <option value="Kg">Kg</option>
                                        <option value="gram">gram</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="lenght" class="required">Length</label>
                                    <input type="number" name="lenght" id="length" value="0" step="0.1" style="width: 70%;">
                                    <select name="lmeasure" id="lmeasure" style="width: 30%;margin-top:-47px;text-align: left;">
                                        <option value="cm">cm</option>
                                        <option value="meter">meter</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="color" class="required">Color</label>
                                    <input type="text" name="color" id="color" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="vaccine" class="required">Vaccination</label>
                                    <select name="vaccine" id="vaccine">
                                        <option value="">unknown</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="nutrient" class="required">Nutrient Availability</label>
                                    <select name="nutrient" id="nutrient">
                                        <option value="">unKnown</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="medicine" class="required">Medicines</label>
                                    <select name="medicine" id="medicine">
                                        <option value="unKnown">unKnown</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="heatperiod" class="required">Heating Period</label>
                                    <input type="date" id="heatperiod" name="heatperiod" required style="width:100%;" >
                                </div>
                                <div class="form-input">
                                    <label for="" class="required">Food Habits</label>
                                    <select name="food" id="food">
                                        <option value="Kibble">Kibble/Dry</option>
                                        <option value="Canned">Canned</option>
                                        <option value="Home Cooked">Home Cooked</option>
                                        <option value="Raw">Raw</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>          
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Update" class="submit" id="submit" name="submit" />
                            
                        </div>
                    </form>
                    <?php
                  
                    if(isset($_POST['submit']))
                        {
                            $petattrid=$_POST['petatrid'];
                            $petdetid=$_POST['pet_det_id'];
                            $height=$_POST['height'];
                            $hunit=$_POST['hmeasure'];
                            $weight=$_POST['weight'];
                            $wunit=$_POST['Wmeasure'];
                            $length=$_POST['lenght'];
                            $lunit=$_POST['lmeasure'];
                            $color=$_POST['color'];
                            $vaccine=$_POST['vaccine'];
                            $nutrient=$_POST['nutrient'];
                            $medicine=$_POST['medicine'];
                            $heatperiod=$_POST['heatperiod'];
                            $food=$_POST['food'];
                            $today=date("Y-m-d");
                            /* Update to database edit form*/
                            $qry=$dbh->prepare("UPDATE `pet_attributes` set pet_det_ID=?,height=?,weight=?,length=?,color=?,vaccination=?,nutrient=?,
                                medicine=?,heat_period=?,food=?,date=? where pet_attr_ID=?");
                            $val=array($petdetid,$height,$weight,$length,$color,$vaccine,$nutrient,$medicine,
                                $heatperiod,$food,$today,$petattrid);
                            $excu=$qry->execute($val);
                            if($excu)
                            {
                             echo "<script>alert('Data updated');window.location='features.php';</script> ";
                            }
                            else
                            {
                             echo "<script>alert('Error in updation')</script>";
                            }
                           
                       }
                    ?>
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <!--Showing the database value in the textbox based on the dropdown selection without page refreshing using XML -->
    <script type="text/javascript">
        function GetDetail(str)
        {
            if(str.length == 0)
            {
                document.getElementById("height").value ="";
                document.getElementById("color").value ="";
                document.getElementById("length").value ="";
               
                return;
            }
            else
            {
                var xmlhttp= new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() 
                {
                  if(this.readyState == 4 && this.status == 200)
                  {
                    var myObj = JSON.parse(this.responseText);
                    document.getElementById("hid_atr_id").value=myObj[0];
                    document.getElementById("height").value=myObj[1];
                    document.getElementById("weight").value=myObj[2];
                    document.getElementById("length").value=myObj[3];
                    document.getElementById("color").value=myObj[4];
                    document.getElementById("heatperiod").value=myObj[5];
                  }
                };
                xmlhttp.open("GET","attrajax.php?id=" + str, true);
                xmlhttp.send();
            }
        }
    </script>



</body>
</html>