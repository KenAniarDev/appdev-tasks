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

      <div class="flex justify-between">
        <a href="/task" class="flex items-center gap-2"><span class="text-3xl"><</span> Go Back</a>
        <h3 class="text-3xl font-bold mb-5">Add New Task</h3>
      </div>
      <form method="post" class="space-y-2">
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Name</span>
          </label>
          <input type="text"  name="name" placeholder="Task name" class="input input-bordered w-full" />
        </div>
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Description</span>
          </label>
           <textarea name="desc" rows="5" placeholder="Task description" class="textarea textarea-bordered w-full"></textarea>
        </div>
        
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Due Date</span>
          </label>
          <input type="date"  name="date" placeholder="Task Due Date" class="input input-bordered w-full" />
        </div>
  
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Status</span>
          </label>
          <select name="status" class="select select-bordered w-full">
          <option value="incomplete">Incomplete</option>
          </select>
        </div>

        <div class="pt-6">
          <button type="submit" name="submit" class="btn w-full">Submit</button>
        </div>    
      <form>
    
  </main> 
</body>
</html>
<?php
mysqli_close($conn);
?>

