<?php
session_start();
// handler.php
// handle comment posts, saving to MySQL and redirecting back to the list
require_once "Dao.php";

  if (isset($_POST["createUser"])) {
    $user = $_POST["user"];
	$first = $_POST["first"];
	$last = $_POST["last"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	
	if(preg_match("/@u\.boisestate\.edu$/i",$email) < 1){
		$_SESSION['errors'][] = "Invalid Email";
		header("Location:sign-up.php");
		exit;
	}

    try {
      $dao = new Dao();
      $dao->checkEmail($email);
      $dao->newUser($email,$first,$last,$user,$pass);
	  header("Location:index.php");
	  exit;
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
   }
   if (isset($_POST["createProject"])) {
    $proj_name = $_POST['proj_name'];
	$user = $_SESSION['uid'];
    try {
      $dao = new Dao();
      $dao->verifyProjectName($proj_name,$user);
      $dao->newProject($proj_name,$user);
	  header("Location:index.php");
	  exit;
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
   }
   if (isset($_POST["login"])) {
    $user = $_POST["user"];
	$pass = $_POST["pass"];
	
	if ($user == null || $pass == null) {
		header("Location:index.php");
		exit;
	}
	
    try {
      $dao = new Dao();
      $ret = $dao->verifyUser($user,$pass);
	  header("Location:index.php");
	  exit;
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
	
   }
   if(isset($_GET['logout'])){
	   $dao = new Dao();
	   $dao->logout();
	   header("Location:index.php");
		exit;
   }
  