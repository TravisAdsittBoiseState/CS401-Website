 <?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "us-cdbr-iron-east-01.cleardb.net";
  private $db = "heroku_c2c792228d4d245";
  private $user = "b84af04a6017d9";
  private $pass = "2d944cf4";

  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
          $this->pass);
  }

  public function newUser ($email, $first, $last, $user, $pass) {
		
	  $conn = $this->getConnection();
	  $saveUser = 
		"INSERT INTO users 
		(first_name, last_name, username, email, password)
		VALUES
		(:first, :last, :user, :email, :pass);";
	  $q = $conn->prepare($saveUser);
	  $q->bindParam(":first",$first);
	  $q->bindParam(":email",$email);
	  $q->bindParam(":user",$user);
	  $q->bindParam(":pass",$pass);
	  $q->bindParam(":last",$last);
	  try{
	  $q->execute();
	  }catch(PDOException $e){
	  echo 'Error: ' . $e->getMessage();
	  }
	  
	  
  }
  public function newProject ($proj_name,$user) {
	  
	  $conn = $this->getConnection();
	  
	  
	  
	  $saveUser = 
		"INSERT INTO user_project 
		(project_name,uid)
		VALUES
		(:project_name,:uid);";
	  $q = $conn->prepare($saveUser);
	  $q->bindParam(":project_name",$proj_name);
	  $q->bindParam(":uid",$user);
	  $q->execute();
	  
	  
  }
  public function checkEmail($email){
  
	  $conn = $this->getConnection();
	  $sql = "SELECT * FROM users";
	  foreach($conn->query($sql) as $row){
		  if($row['email'] == $email){
			  $_SESSION['errors'][] = "Email Exists";
			  header("Location:index.php");
			  exit;
		  }
	  }
  
  }
  public function verifyProjectName($pname,$uid){
  
	  $conn = $this->getConnection();
	  $sql = "SELECT * FROM user_project WHERE uid={$uid}";
	  foreach($conn->query($sql) as $row){
		  if($row['project_name'] == $pname){
			  $_SESSION['errors'][] = "Duplicate Project";
			  header("Location:new_project.php");
			  exit;
		  }
	  }
  
  }
  public function verifyUser ($user, $pass) {
	  
	  $conn = $this->getConnection();
	  $sql = "SELECT * FROM users";
	  foreach($conn->query($sql) as $row){
		  if($row['username'] == $user && $row['password'] == $pass){
			  $_SESSION['loggedin'] = true;
			  $_SESSION['uid'] = $row['uid'];
			  $_SESSION['username'] = $row['username'];
			  $_SESSION['fname'] = $row['first_name'];
			  header("Location:index.php");
			  exit;
		  }
	  }
	  $_SESSION['errors'][] = "Incorrect username or password!";
  }
  public function get_projects($user){
	  
	  $conn = $this->getConnection();
	  $sql = "SELECT * FROM user_project";
	  $ret = array();
	  foreach($conn->query($sql) as $row){
		  if($row['uid'] == $user){
			  array_push($ret,$row);
		  }
	  }
	  $_SESSION['projects'] = $ret;
			  
  }
  public function logout(){
	  session_destroy();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comment");
  }
} // end Dao 