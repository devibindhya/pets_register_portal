<?php
      $conn = "";
  
      try {
         
         
        $dbh=new PDO("mysql:host=localhost;dbname=petcare","root","");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          
            
      } catch(PDOException $e) {
          echo "Connection failed: " 
              . $e->getMessage();
      }
      
      
      ?>