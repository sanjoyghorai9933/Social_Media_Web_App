
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
<div class="container mt-5">
  <div class="row row-cols-2">
    <div class="col col-md-6">
        <h2>Image Viewing</h2>
<div id="content"></div> 
</div>
    <div class="col col-md-6">
    <h3>Editing</h3>
    <div class="form-group">
                    <label for="heading">Heading</label>
                        <input type="text" class="form-control" id="heading" name="heading"  placeholder="Enter email">
                    </div>

                     <div class="form-group">
                    <label for="location">Location</label>
                        <input type="text" id="location"  name="location" class="form-control" placeholder="Location">
                    </div>
                    
                    <div class="form-group">
                    <label for="heading">Logo</label>
                        <input type="file" id="logo"  name="logo" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="heading">Floor Plan</label>
                        <input type="text" class="form-control" id="floor_plan" name="floor_plan"  placeholder="Floor Plan">
                    </div>
                    <div class="form-group">
                    <label for="heading">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="price">
                    </div> 
                    <div class="form-group">
                    <label for="heading">Additonal content</label>
                        <input type="text" class="form-control" id="add_content" name="add_content" placeholder="additonal content">
                    </div>  
                    <!-- <div class="form-group">
                    <label for="heading">Background Image</label>
                        <input type="file" id="bg_image"  name="bg_image" class="form-control">
                    </div> -->

                <br>
                    <div class="form-group">
                        <input type="submit" id="submit" class="btn btn-primary btn-block" value="Submit">
                    </div>  
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
     $(document).ready(function(){
        $("#submit").click(function() {
            var heading = $("#heading").val();
            var form_data = new FormData();
            var floor_plan = $("#floor_plan").val();
            var price = $("#price").val();
            var add_content = $("#add_content").val();
            var location = $("#location").val();


              // Handle file input for logo
    var logo = $("#logo")[0].files[0];
    form_data.append("logo", logo);

    // Append all form data to the form_data object
    form_data.append("heading", heading);
    form_data.append("floor_plan", floor_plan);
    form_data.append("price", price);
    form_data.append("add_content", add_content);
    form_data.append("location", location);
                

                $.ajax({
                    url: 'insert.php',
                    method: 'POST',
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        alert("sucess");
                    }
                });
                $.ajax({
            //data :{action: "showroom"},
            type: "GET",
            url  :"view.php", //php page URL where we post this data to view from database
            dataType: "html", 
          
            success: function(data){
                $("#content").html(data);
            }
        });
          


            });
      
        });



        </script>
       


</body>

</html>
