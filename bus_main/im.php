<?php
error_reporting(0);
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "images/".$filename;
		
	$db = mysqli_connect("localhost", "root", "", "bus");

		// Get all the submitted data from the form
		$sql = "INSERT INTO bus_arrival (img) VALUES ('$filename')";

		// Execute query
		mysqli_query($db, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
$result = mysqli_query($db, "SELECT * FROM bus_arrival");
while($row=mysqli_fetch_array($result))
{
echo "<img src=".$row['img'].">";
}

?>
