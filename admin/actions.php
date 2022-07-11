<?php
include 'security.php';
include 'includes/db_admin.php';


// Create admins
if (isset($_POST['register_btn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usertype = '1';

	$query = $link->query("INSERT INTO users(user_login,user_password,user_rights) VALUES('$username','$password','$usertype')");
	if ($query) {
		$_SESSION['success'] = 'Your Data is updated';
		header('Location: register.php');
	}
	else {
		$_SESSION['status'] = 'Your Data is not updated';
		header('Location: word.php');
	}

}


// Update admins

if (isset($_POST['update_btn'])) {
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$password = $_POST['edit_password'];
	$usertype = $_POST['edit_usertype'];

	$query = $link->query("UPDATE `users` SET `user_login` = '$username', `user_password` = '$password', `user_rights` = '$usertype' WHERE `users`.`id` = $id  ");
	var_dump($query);
	if ($query) {
		$_SESSION['success'] = 'Your Data is updated';
		header('Location: register.php');
	}
	else {
		$_SESSION['status'] = 'Your Data is not updated';
		header('Location: register.php');
	}

}

// Delete admins
if (isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];
	$query = $link->query("DELETE FROM users WHERE id = '$id'");
	if ($query) {
		$_SESSION['success'] = 'Your Data is deleted';
		header('Location: register.php');
	}
	else {
		$_SESSION['status'] = 'Your Data is not deleted';
		header('Location: register.php');
	}
}



//Login

if (isset($_POST['login_btn'])) {
	$email_login = $_POST['email'];
	$password_login = $_POST['password'];

	$query = $link->query("SELECT * FROM users WHERE user_login = '$email_login' AND user_password = '$password_login'");
	$auth = $query->fetch_assoc();
		if ($auth['user_rights'] == '1') {
			$_SESSION['user_login'] = $email_login;
			header('Location: ../admin/admin_index.php');
		}
		elseif ($auth['user_rights'] == '0') {
			$_SESSION['status'] = 'You do not have enough permissions';
			header('Location: login.php');
		}
		else {
			$_SESSION['status'] = 'Email or password is invalible';
			header('Location: login.php');
		}
}
// Add Film
if (isset($_POST['add_btn'])) {
	$name = $_POST['filmname'];
	$desc = $_POST['desc'];
	$logo = $_POST['logo'];

	$query = $link->query("INSERT INTO films(film_name,film_description,film_logo) VALUES('$name','$desc','$logo')");

	if ($query) {
		$_SESSION['success'] = 'Your Data is updated';
		header('Location: word.php');
	}
	else {
		$_SESSION['status'] = 'Your Data is not updated';
		header('Location: word.php');
	}

}




// Update film

if (isset($_POST['update_btn_word1'])) {
	$id = $_POST['edit_id'];
	$name = $_POST['name'];
	$rate = $_POST['rate'];
	$desc = $_POST['description'];

	$query = $link->query("UPDATE `films` SET `film_name` = '$name',`film_rate` = '$rate' ,`film_description` = '$desc'  WHERE `films`.`film_id`  = $id");

	if ($query) {
		$_SESSION['success'] = 'Film is updated';
		header('Location: word.php');
		}
		else {
			$_SESSION['status'] = 'Film is not updated';
		header('Location: word.php');
		}
}



// Delete film
if (isset($_POST['delete_btn_word1'])) {
	$id = $_POST['delete_id'];

//	$lab = $link->query("SELECT lab FROM films WHERE id = '$id'");
//	$result = $lab->fetch_assoc();
//	$labpath ='../'. $result['lab'];
//	unlink($labpath);

	$query = $link->query("DELETE  FROM films WHERE film_id = $id");
	var_dump($query);
	if ($query) {
		$_SESSION['success'] = 'Your Word lab is deleted';
		header('Location: word.php');
	}
	else {
		$_SESSION['status'] = 'Your Word lab is not deleted';
		header('Location: word.php');
	}
}



// Update Excel

if (isset($_POST['update_btn_excel4'])) {
	$id = $_POST['edit_id'];
	$mark = $_POST['mark'];


	$query = $link->query("UPDATE course_4e SET mark = $mark WHERE id = $id");

	if ($query) {
		$_SESSION['success'] = 'Mark is updated';
		header('Location: excel.php');
		}
		else {
			$_SESSION['status'] = 'Mark is not updated';
		header('Location: excel.php');
		}
}


// Delete Excel
if (isset($_POST['delete_btn_excel1'])) {
	$id = $_POST['delete_id'];

	$lab = $link->query("SELECT lab FROM course_1e WHERE id = '$id'");
	$result = $lab->fetch_assoc();
	$labpath ='../'. $result['lab'];
	unlink($labpath);

	$query = $link->query("DELETE FROM course_1e WHERE id = '$id'");
	if ($query) {
		$_SESSION['success'] = 'Your Excel lab is deleted';
		header('Location: excel.php');
	}
	else {
		$_SESSION['status'] = 'Your Excel lab is not deleted';
		header('Location: excel.php');
	}
}

 ?>
