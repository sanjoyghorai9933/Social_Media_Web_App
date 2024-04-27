<?php
// database connection
include 'db.php';

// retrieve the data from the database
$result = mysqli_query($conn, "SELECT * FROM social_media WHERE id ='1' ");
$row = mysqli_fetch_array($result);

// create a new image resource
$image = imagecreatetruecolor(1080, 1080);

// set the background color of the image to white
$bg = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, 800, 600, $bg);

$bg = imagecreatefrompng(__DIR__.'/imgs/bg-img.png');
imagecopy($image, $bg, 50, 50, 0, 0, 100, 100);

// add the logo image to the main image
$logo_image = imagecreatefrompng(__DIR__.'/imgs/'.$row["logo"]);
imagecopy($image, $logo_image, 50, 50, 0, 0, 100, 100);

// add the heading text to the main image
$black = imagecolorallocate($image, 0, 0, 0);
imagettftext($image, 20, 0, 150, 50, $black, __DIR__.'/fonts/arial.ttf', $row["heading"]);

// add the location text to the main image
imagettftext($image, 20, 0, 150, 100, $black, __DIR__.'/fonts/arial.ttf', $row["location"]);

// add the floor plan text to the main image
imagettftext($image, 20, 0, 150, 150, $black, __DIR__.'/fonts/arial.ttf', $row["floor_plan"]);

// add the price text to the main image
imagettftext($image, 20, 0, 150, 200, $black, __DIR__.'/fonts/arial.ttf', $row["price"]);

// add the additional content text to the main image
imagettftext($image, 20, 0, 150, 250, $black, __DIR__.'/fonts/arial.ttf', $row["additonal_content"]);

// get the HTML content
$html = file_get_contents(__DIR__.'/html_template.html');

// split the HTML data into multiple lines
$html_lines = explode("\n", $html);

// add each line of the HTML data to the main image
$y = 300;
foreach ($html_lines as $line) {
    imagettftext($image, 20, 0, 50, $y, $black, __DIR__.'/fonts/arial.ttf', $line);
    $y += 20;
}

// output the image as a PNG
$image_path = 'output.png';
imagepng($image, $image_path);

// free up memory
imagedestroy($image);
imagedestroy($logo_image);

// provide a download link to the user
echo '<a href="'.$image_path.'" download="image.png">Download Image</a>';

?>