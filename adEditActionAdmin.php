<?php
// Include the database connection file
$db = mysqli_connect("localhost", "root", "", "stock_managment");


var_dump($_POST);
echo "<br>";
var_dump($_FILES);
if (empty($_FILES['image']['name'])) {
    $new_name = $_POST['old-image'];
} else {
    $errors = array();
    $file_name = $_FILES['image']['name']; //ចាប់ឈ្មោះ
    $file_size = $_FILES['image']['size']; //ចាប់ទំហំ
    $file_tmp = $_FILES['image']['tmp_name']; //​  ចាប់ទីតាំង
    $file_type = $_FILES['image']['type']; // ចាប់ប្រភេទ
    $file_ext = strtolower(end(explode('.', $file_name))); //check file type (file extension)
    $extensions = array("jpeg", "jpg", "png");
    // print_r($_FILES['new-image']);die();
    if (in_array($file_ext, $extensions) === false) { // check ថាតើfile's extension នៃរូបភាពខាងលើគ្មាននៅក្នុង​ $extensions = array("jpeg","jpg","png"); ឬទេ?
        // បើគ្មានត្រូវបង្ហាញmessage
        $errors[] = "This extension file not allowed, Please choose a JPG or PNG image.";
    }

    if ($file_size > 2097152) {  //check file size 
        $errors[] = "File size must be 2mb or lower.";
    }

    $new_name = time() . "-" . basename($file_name); // បង្កើតឈ្មោះថ្មីឲ្យ file ដោយតភ្ជាប់ជាមួួយពេលវេលាជាក់លាក់

    $target = "image/" . $new_name; // កំណត់ទីតាំងដែលត្រូវupload
    if (empty($errors)) { // ប្រសិនបើ គ្មាន ករណីណាមួួយerror ទេ move file ទៅកាន់ ទីតាំងដែលាបានកំណត់
        unlink("image".$_POST['old-image']);
        move_uploaded_file($file_tmp, $target);
    } else {
        // ប្រសិនបើ មាន ករណីណាមួួយerror បង្ហាញមូលហេតុនៃការ​error
        print_r($errors);
        die();
    }

}

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($db, $_POST['id']);
	$Fname = mysqli_real_escape_string($db, $_POST['first_name']);
	$Lname = mysqli_real_escape_string($db, $_POST['last_name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);	
	
	// Check for empty fields
	if (empty($Fname) || empty($Lname) || empty($email)) {
		if (empty($Fname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($Lname)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($db, "UPDATE admin SET `first_name` = '$Fname', `last_name` = '$Lname', `email` = '$email' ,image='$new_name' WHERE `id` = $id");
		
		// Display success message
		header("Location: ad_das.php");
        
	}
}
?>
