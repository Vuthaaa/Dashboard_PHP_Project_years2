<?php 
$db = mysqli_connect("localhost", "root", "", "stock_managment");
if ($_SESSION['user_role'] == '0'){
  header("Location: ");
}
if (isset($_POST['submit'])) {

  $id = mysqli_real_escape_string($db,$_POST['id']);
  $Fname = mysqli_real_escape_string($db,$_POST['first_name']);
  $Lname = mysqli_real_escape_string($db,$_POST['last_name']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  //$password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $role = mysqli_real_escape_string($db,$_POST['role']);

  $sql = "UPDATE  Users SET first_name = '{$Fname}', last_name = '{$Lname}', email = '{$email}', role = '{$role}' WHERE id = {$id}";
   
    if (mysqli_query($db, $sql)) {
      header("Location: list.php");
    } 
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php 
            
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM Users WHERE id = {$id}";
                $result = mysqli_query($db, $sql) or die("Connection Failed");
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    
                  
                 ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $row['id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="Last_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php  
                            if($row['role'] == 1) {
                                echo '<option value="0">normal User</option>
                              <option value="1" selected>Admin</option>';
                              }else{ echo '<option value="0" selected>normal User</option>
                              <option value="1">Admin</option>';}
                              ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                    <?php 
                      }
                    }
                     ?>

              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>