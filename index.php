<?php
$conn = mysqli_connect("localhost", "root", "ThorKen1301!", "appdev");

$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $status = $_POST['status'];
   
    // Insert the user data into the database
    $sql = "INSERT INTO tasks VALUES (null,'$name','$desc', '$date', '$status')";
    mysqli_query($conn, $sql);
    // header("refresh: 0.3;");
  }
  
if (isset($_GET['id'])) {
    // Write the SQL query to delete the data
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id=".$id;

    // Execute the SQL query
    mysqli_query($conn, $sql);
    header("Location: /task");
  }

?>

<!DOCTYPE html>
<html data-theme="wireframe">
<head>
  <title>CRUD Application - Read Records</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<main class="max-w-[768px] py-10 px-5 mx-auto">
  <div class="flex justify-between items-center">
    <h1 class="text-3xl py-5 font-bold text-center uppercase">Tasks</h1>
    <a href="/task/create.php" class="btn btn-md">Add New</a>
  </div>
  <table class="table w-full">
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Due Date</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <?php
    // Loop through all users and display their details
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['task_name']."</td>";
      echo "<td>".$row['task_description']."</td>";
      echo "<td>".$row['task_due_date']."</td>";
      echo "<td>".$row['task_status']."</td>";
      echo "<td><a href='/task/index.php?id=".$row['id']."' class='btn btn-outline btn-error btn-sm'>delete</a></td>";
      echo "<td><a href='/task/edit.php?id=".$row['id']."' class='btn btn-outline btn-info btn-sm'>edit</a></td>";
    }
    ?>
  </table>

  </main> 

</body>

 
    
</html>
<?php
// Close the database connection
mysqli_close($conn);
?>

