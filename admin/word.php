<?php
include 'security.php';
include 'includes/db_admin.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/user_bar.php';
?>
<?php  if(isset($_SESSION['success']) && $_SESSION['success']!=""): ?>
      <h3 class="text-success text-center"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></h3>
    <?php  endif;?>
<div class="modal fade" id="addfilm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Film </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="actions.php" method="post">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Film name </label>
                        <input type="text" name="filmname" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="desc" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control" placeholder="Logo">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_btn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="row m-2">
        <button type="button" class="ml-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#addfilm">
            Add Film
        </button>
</div>
		<!-- Earnings (Monthly) Card Example -->
    <?php

        $query = $link->query("SELECT * FROM films");
        $row = $query->fetch_all(MYSQLI_ASSOC);

     ?>

     <table class="table table-bordered">
  <thead>
    <tr>
        <th scope="col">Film ID</th>
      <th scope="col">Film Rate</th>
      <th scope="col">Film Name</th>
      <th scope="col">Description</th>
        <th scope="col">Logo</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($row as $key): ?>
    <tr>
        <td><?php echo $key['film_id']; ?></td>
      <td><?php echo $key['film_rate']; ?></td>
      <td><?php echo $key['film_name']; ?></td>
      <td><?php echo $key['film_description']; ?></td>
        <td><img src="../<?php echo $key['film_logo']; ?>" height="200" width="150"  alt=""></td>
      <td>
<form action="word_edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="edit_id" value="<?php echo $key['film_id'];?>">
<button type="submit" name="edit1_btn" class="btn btn-sm btn-primary mr-3">Update</button>
</form>
      </td>
      <td>
<form action="actions.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="delete_id" value="<?php echo $key['film_id'];?>">
<button type="submit" name="delete_btn_word1" class="btn btn-sm btn-danger">Delete</button>
</form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
 <?php
include 'includes/scripts.php';
include 'includes/footer.php';
  ?>
