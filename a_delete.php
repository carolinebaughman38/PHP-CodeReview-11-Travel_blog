<?php 

require_once "dbconnect.php";
if($_POST){
	$item_id = $_POST["id"];
		$sql = "DELETE FROM concert WHERE id = $id";
		if($conn->query($sql)===TRUE){
			echo"<p>Successfully deleted!</p>";
			echo "<a href='admin.php' class='btn btn-success'>Back to admin Home-Page</a>";
		}else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}
 ?>