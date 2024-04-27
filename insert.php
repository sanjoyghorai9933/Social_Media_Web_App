<?php

include 'db.php';

          $heading=$_POST['heading'];
          $floor_plan=$_POST['floor_plan'];
          $price=$_POST['price'];
          $additonal_content=$_POST['add_content'];
          $location=$_POST['location'];

          $target_dir="imgs/";
          $target_file= $target_dir . basename($_FILES["logo"]["name"]);
          $temp_file=$_FILES["logo"]["name"];
          move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);




             $sql= mysqli_query($conn,"INSERT INTO social_media(heading, logo, floor_plan, price, additonal_content, location) VALUES('".$heading."','".$temp_file."','".$floor_plan."','".$price."','".$additonal_content."','".$location."')");

         
       
if ($conn->query($sql) === TRUE) {
    echo "data inserted";
}
else 
{
    echo "failed";
}
 ?>