<?php
$servername = "127.0.0.1";
$username = "root";
$password = "lqjlqj123";
$database = "db";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// 创建用户表
$sql = "CREATE TABLE users (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "用户表创建成功";
} else {
  echo "创建用户表时出错：" . $conn->error;
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];


  // 执行数据库插入操作
  $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

  if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
