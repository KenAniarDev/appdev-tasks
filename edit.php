<?php
$conn = mysqli_connect("localhost", "root", "ThorKen1301!", "appdev");
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $sql = "UPDATE tasks SET 
            task_name = '$name', 
            task_description = '$desc', 
            task_due_date = '2023-03-01', 
            task_status = '$status'
        WHERE id = $id";
    mysqli_query($conn, $sql);
       header('Location: /task');
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
        <h3 class="text-3xl font-bold mb-5">Update Task</h3>
      </div>


<?php 
        if (isset($_GET['id'])) {
          // Write the SQL query to delete the data
          $id = $_GET['id'];
          $sql = "SELECT * FROM tasks WHERE id=".$id;
          $get_result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($get_result);
        ?>

            <form method="post" class="space-y-2">
              <input type='hidden' value="<?php echo $row['id'] ?>" name='id'>
              <div class="form-control w-full ">
                <label class="label">
                  <span class="label-text">Name</span>
                </label>
                <input type="text"  name="name" placeholder="Task name" class="input input-bordered w-full " value="<?php echo $row['task_name'] ?>" />
              </div>
              <div class="form-control w-full ">
                <label class="label">
                  <span class="label-text">Description</span>
                </label>
                <textarea name="desc" placeholder="Task description" class="textarea textarea-bordered w-full "><?php echo $row['task_description'] ?></textarea>
              </div>
              
              <div class="form-control w-full ">
                <label class="label">
                  <span class="label-text">Due Date</span>
                </label>
                <input type="date"  name="date" placeholder="Task Due Date" class="input input-bordered w-full "  value="<?php echo date("Y-m-d", strtotime($row['task_due_date'])) ?>" />
              </div>
        
              <div class="form-control w-full  pb-4">
                <label class="label">
                  <span class="label-text">Status</span>
                </label>
                <select name="status" class="select select-bordered w-full " value="<?php echo $row['task_due_date'] ?>">
               <option value="incomplete">Incomplete</option>
          <option value="complete">Complete</option>
          <option value="in_progress">In-Progress</option>
                </select>
              </div>
          
              <button type="submit" name="update" class="btn w-full">Submit</button>
            <form>
        <?php } ?>

  </main> 

  </body>
</html>
<?php
// Close the database connection
mysqli_close($conn);
?>

