<?php
session_start(); 
include 'includes/db_admin.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/user_bar.php'; 
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
  </div>

  <div class="card-body">

  <?php 

  	// Редагування та оновлення

	if (isset($_POST['edit_btn'])) {
		$id = $_POST['edit_id'];

		$query = $link->query("SELECT * FROM users WHERE id = '$id'");
		$row = $query->fetch_all(MYSQLI_ASSOC);
		foreach ($row as $key) {
            $id = $key['id'];
			$username = $key['user_login'];
			$password = $key['user_password'];
		}
	}

   ?>

  <div class="col-3">
    <form action="actions.php" method="post">
      <input type="hidden" name="edit_id" value="<?php echo $id;?>">
  	   <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" class="form-control" placeholder="Enter Username" value="<?php echo $username;?>">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" class="form-control" placeholder="Enter Password" value="<?php echo $password;?>">
            </div>
            <div class="form-group">
                <label>UserType</label>
               <select class="form-control" name="edit_usertype">
                 <option value="1">1</option>
                 <option value="0">0</option>
               </select>
            </div>
             <div class="form-group">
                <a class="btn btn-danger" href="register.php">Cancel</a>
                <button name="update_btn" class="btn btn-info" type="submit">Update</button>
            </div>
          </form>
  </div>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

 <?php 
include 'includes/scripts.php';
include 'includes/footer.php';
  ?>