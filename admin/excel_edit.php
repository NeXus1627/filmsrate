<?php
include 'security.php';
include 'includes/db_admin.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/user_bar.php';
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit mark</h6>
  </div>

  <div class="card-body">
<?php

	if (isset($_POST['edit_btn_excel1'])) {
		$id = $_POST['edit_id'];
		$query = $link->query("SELECT * FROM course_1e WHERE id = '$id'");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        foreach ($row as $key) {
        	$id = $key['id'];
        	$name = $key['name'];
        	$lastname= $key['lastname'];
          $lastname= $key['lastname'];
        }
	}

  if (isset($_POST['edit_btn_excel2'])) {
		$id = $_POST['edit_id'];
		$query = $link->query("SELECT * FROM course_2e WHERE id = '$id'");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        foreach ($row as $key) {
        	$id = $key['id'];
        	$name = $key['name'];
        	$lastname= $key['lastname'];
          $lastname= $key['lastname'];
        }
	}

  if (isset($_POST['edit_btn_excel3'])) {
		$id = $_POST['edit_id'];
		$query = $link->query("SELECT * FROM course_3e WHERE id = '$id'");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        foreach ($row as $key) {
        	$id = $key['id'];
        	$name = $key['name'];
        	$lastname= $key['lastname'];
          $lastname= $key['lastname'];
        }
	}

  if (isset($_POST['edit_btn_excel4'])) {
		$id = $_POST['edit_id'];
		$query = $link->query("SELECT * FROM course_4e WHERE id = '$id'");
        $row = $query->fetch_all(MYSQLI_ASSOC);
        foreach ($row as $key) {
        	$id = $key['id'];
        	$name = $key['name'];
        	$lastname= $key['lastname'];
          $lastname= $key['lastname'];
        }
	}

 ?>
  <div class="col-3">
    	<form action="actions.php" method="post" enctype="multipart/form-data">
      	<input type="hidden" name="edit_id" value="<?php echo $key['id'];?>">
  	   <div class="form-group">
                <label>Category name</label>
                <input type="text" name="mark" class="form-control" placeholder="Enter mark" value="<?php echo $key['mark'];?>">
        </div>
             <div class="form-group">
                <a class="btn btn-danger" href="excel.php">Cancel</a>

                <?php if (isset($_POST['edit_btn_excel1'])): ?>
                <button name="update_btn_excel1" class="btn btn-info" type="submit">Update</button>
              <?php endif; ?>
                <?php if (isset($_POST['edit_btn_excel2'])): ?>
                <button name="update_btn_excel2" class="btn btn-info" type="submit">Update</button>
              <?php endif; ?>

                <?php if (isset($_POST['edit_btn_excel3'])): ?>
                <button name="update_btn_excel3" class="btn btn-info" type="submit">Update</button>
              <?php endif; ?>

                <?php if (isset($_POST['edit_btn_excel4'])): ?>
                <button name="update_btn_excel4" class="btn btn-info" type="submit">Update</button>
              <?php endif; ?>
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
