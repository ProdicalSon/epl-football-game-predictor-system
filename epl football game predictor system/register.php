<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>

    <header>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Result</a></li>
            <li><a href="#">Report</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </header>
    <section class="login-register-section">
        <div class="register-form">
          <h2>Register</h2>
          <form>
            <input type="text" placeholder="Username" required>
            <input type="email" placeholder="Email" required>
            <input type="text" placeholder="PhoneNumber" required>
            <input type="password" placeholder="Password" required>
            <button type="submit">Register</button>
          </form>
        </div>
      </section>



      <?php
include "conn.php";

if(isset($_POST['submit'])){

// Check connection
if (!$connection) {
die("Connection failed: " . mysqli_connect_error());
}else{
// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$phoenumber = $_POST['phoenumber'];
$passwordd = $_POST['passwordd'];


// Prepare SQL statement
$sql = "INSERT INTO premier_register_data(username, email, phonenumber,passwordd) VALUES (?,?,?,?)";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $phonenumber,$passwordd);

// Execute prepared statement
mysqli_stmt_execute($stmt);


echo "uploaded seccessifully";
// Close prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
}
}

?>
</body>
</html>