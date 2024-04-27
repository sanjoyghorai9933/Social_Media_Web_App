

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
<?php


include 'db.php';


   
    $result = mysqli_query($conn, "SELECT * FROM social_media ");
    while($row = mysqli_fetch_array($result)) {    


?>




        <div class="sd-frame" style="background-image:url(imgs/bg-img.png);">
            <div class="row">
                <div class="col-md-8">
                    <div class="heading">
                        <h2><?php echo $row["heading"]; ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="logo">
                        <img src='imgs/<?php echo $row["logo"]; ?>' class="img-fluid" alt="logo">
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 text-center">
                    <div class="location">
                        <h5><i class="fas fa-map-marker-alt" aria-hidden="true"></i><?php echo $row["location"]; ?> </h5>
                    </div>
                </div>
                <div class="footer-set">
                <div class="row row-cols-3">
                    <div class="col text-center">
                        <div class="box-f">
                        <p>Payment Plan<br>
                        <b><?php echo $row["floor_plan"]; ?></b>
                        </p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="box-f">
                        <p> Investment Starts <br>
                            ₹ <b><?php echo $row["price"]; ?></b> 
                        </p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="box-f" style="border:0">
                            <p><?php echo $row["additonal_content"]; ?></p> 
                        </div>
                    </div>
                 </div>
             </div>
            </div>
            
            
            
        </div>
 
        <?php
}
        ?>
 </div>

 
</body>

</html>
