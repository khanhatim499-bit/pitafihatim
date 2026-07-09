<?php

session_start();

require_once "../includes/db.php";
require_once "../includes/functions.php";


if(!isLoggedIn())
{
    redirect("login.php");
}


$sql = "
SELECT 
posts.*,
categories.name AS category_name

FROM posts

LEFT JOIN categories

ON posts.category_id = categories.id

ORDER BY posts.created_at DESC
";


$result = mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html>

<head>

<title>
Manage Posts
</title>

<link rel="stylesheet" href="../css/style.css">

</head>


<body>


<section class="container py">


<h1>
Manage Posts
</h1>


<a href="post-add.php" class="btn">
Add New Post
</a>


<table border="1" width="100%">

<tr>

<th>Title</th>
<th>Category</th>
<th>Status</th>
<th>Date</th>

</tr>


<?php

while($post = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo clean($post['title']); ?>
</td>


<td>
<?php echo clean($post['category_name']); ?>
</td>


<td>
<?php echo clean($post['status']); ?>
</td>


<td>
<?php echo formatDate($post['created_at']); ?>
</td>


</tr>


<?php

}

?>


</table>


</section>


</body>

</html>
