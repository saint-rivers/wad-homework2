<?php
include "config.php";
$sql = "SELECT * FROM tasks;";
$result = $conn->query($sql);
?>

<?php
include "config.php";

if (isset($_POST['submit'])) {
  $name = $_POST['task-name'];
  echo $name;

  $sql = "INSERT INTO `tasks`(`name`, `is_completed`) VALUES ('$name','0')";

  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "New record created successfully.";
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management</title>
  <link rel="stylesheet" href="./styles/styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="" id="page-content">

    <div class="m-12 flex flex-col">
      <h4 class="font-bold text-2xl">{{Project Title}}</h4>
      <form action="" method="POST" class="my-4 flex flex-row w-full justify-between">
        <input type="text" name="task-name" class="flex-1 rounded bg-gray-50 border border-gray-400 px-3 py-2 w-5/6 mr-4" placeholder="What do you need to do today?">
        <input type="submit" class="bg-blue-300 px-3 py-2 rounded" name="submit" value="Add" />
      </form>
      <div>
        <ul>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <li class="flex flex-row">
                <label class="flex-1 task-toggle" onclick="toggleComplete('<?php echo $row['id']; ?>', '<?php echo $row['is_completed']; ?>');">
                  <div class="border-b">
                    <input class="accent-blue-teal-500 my-4" type="checkbox" <?php echo ($row['is_completed'] == 1 ? 'checked' : ''); ?>>
                    <?php echo $row['name']; ?>
                    <i class="input-helper"></i>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </label>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="flex bg-yellow-500 inline-block px-3 py-2">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="flex bg-red-500 inline-block px-3 py-2">Delete</a>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function toggleComplete(id, isChecked) {
    $.ajax({
      type: "POST",
      url: 'toggleTaskComplete.php',
      data: {
        id: id,
        is_completed: isChecked
      },
      success: function() {
        console.log('updated is_completed');
      }
    });
  }
</script>

</html>