<?
session_start();
require_once 'application/utils.php';
if (!is_authenticated())
	redirect_login();

include 'log_inf.php';

if (isset($_POST['token'])) {
	$token = $_POST['token'];
	define('METHOD', 'POST');
} elseif (isset($_GET['token'])) {
	$token = $_GET['token'];
	define('METHOD', 'GET');
} else {
	echo 'no token given!';
	exit();
}
include_once './authorization.php';

$table = $level === 1 ? 'students' : 'professors';
$id_format = $level === 1 ? 'students_no' : 'professor_no';

$err_msg;
$sql;
if ($token == 'uu') { //user update
	$id = $_SESSION['user']['id'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$_SESSION['user']['name'] = $_POST['name'];
	$_SESSION['user']['mobile'] = $_POST['mobile'];
	$_SESSION['user']['email'] = $_POST['email'];
	$modified_by = $_SESSION['user']['name'] . '-' . $_SESSION['user']['id'];
	$table = $level === 1 ? 'students' : 'professors';
	$id_format = $level === 1 ? 'students_no' : 'professor_no';
	$sql = "UPDATE $table SET name='$name', email='$email', mobile='$mobile'
	WHERE $id_format=$id;";
} elseif ($token == 'pr') { //pass reset

	$id = $_SESSION['user']['id'];
	$cur_pass = $_POST['cur_pass'];
	$newPassword = $_POST['newPassword'];
	$temp_sql = "SELECT password from $table where $id_format='$id'";
	$result = mysqli_query($conn, $temp_sql);
	$row = mysqli_fetch_array($result);
	if (!password_verify($cur_pass, $row['password'])) {
		echo json_encode(array("statusCode" => 201, "error" => "Password Incorrect!"));
		exit();
	}
	$new_psw_hashed = password_hash($newPassword, PASSWORD_DEFAULT);
	$sql = "UPDATE $table SET password='$new_psw_hashed'
	WHERE $id_format=$id;";
}

if (METHOD == 'POST') {
	if ($result = mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode" => 200, "id" => mysqli_insert_id($conn)));
	} else {
		echo json_encode(array("statusCode" => 201, "error" => $conn->error, "msg" => $err_msg));
	}
} elseif (METHOD == 'GET') {
	if ($result = mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode" => 200, "data" => $result->fetch_all(MYSQLI_ASSOC)));
	} else {
		echo json_encode(array("statusCode" => 201));
	}
}
mysqli_close($conn);
