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
    <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
  </div>

  <div class="card-body">
<?php


	if (isset($_POST['edit1_btn'])){
		$id = $_POST['edit_id'];

            $query = $link->query("SELECT * FROM films WHERE film_id = '$id'");


        $row = $query->fetch_all(MYSQLI_ASSOC);
        foreach ($row as $key){
        	$id = $key['film_id'];



        }
      }




 ?>
  <div class="col-3">
    	<form action="actions.php" method="post" enctype="multipart/form-data">
      	<input type="hidden" name="edit_id" value="<?php echo $key['film_id'];?>">
  	   <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter mark" value="<?php echo $key['film_name'];?>">
        </div>
            <div class="form-group">
                <input type="text" name="rate" class="form-control" placeholder="Enter mark" value="<?php echo $key['film_rate'];?>">
            </div>
            <div class="form-group">
                <textarea name="description" value ="<?php echo $key['film_description'];?>" style="width:500px; height:400px;">

                    </textarea>

            </div>
             <div class="form-group">
                <a class="btn btn-danger" href="word.php">Cancel</a>
                <?php if (isset($_POST['edit1_btn'])):  ?>
                <button name="update_btn_word1" class="btn btn-info" type="submit">Update</button>
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
