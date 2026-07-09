<?php

session_start();

require_once "../includes/db.php";
require_once "../includes/functions.php";


$error = "";


if(isset($_POST['login']))
{

    $username = clean($_POST['username']);

    $password = $_POST['password'];


    $sql = "
    SELECT *
    FROM users
    WHERE username='$username'
    AND status=1
    LIMIT 1
    ";


    $result = mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)==1)
    {

        $user = mysqli_fetch_assoc($result);


        if(password_verify($password,$user['password']))
        {

            $_SESSION['user_id'] = $user['id'];

            $_SESSION['username'] = $user['username'];

            $_SESSION['role'] = $user['role'];


            header("Location: dashboard.php");

            exit();

        }

        else
        {

            $error = "Invalid password";

        }


    }

    else
    {

        $error = "User not found";

    }


}


?>


<!DOCTYPE html>
<html>

<head>

<title>
Admin Login - Hatim Education Site
</title>


<link rel="stylesheet" href="../css/style.css">


</head>


<body>


<section class="container py">


<div class="card">


<h2>
Admin Login
</h2>


<?php

if($error)
{

echo "<p>".$error."</p>";

}

?>


<form method="POST">


<input 
type="text"
name="username"
placeholder="Username"
required>


<br><br>


<input 
type="password"
name="password"
placeholder="Password"
required>


<br><br>


<button 
class="btn"
name="login">

Login

</button>


</form>


</div>


</section>


</body>

</html>
