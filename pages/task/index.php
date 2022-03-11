<?php
include "../config/config.php";

$project_id = $_GET["project"];

$sql = "SELECT * FROM projects WHERE id = $project_id;";
$project_results = $conn->query($sql);
// echo $sql;
$project_name = "";
if ($project_results->num_rows > 0) {
  while ($row = $project_results->fetch_assoc()) {
    $project_name = $row["name"];
  }
}

$sql = "SELECT * FROM tasks WHERE project_id = $project_id;";
$result = $conn->query($sql);

?>

<?php
include "../config/config.php";

if (isset($_POST['submit'])) {
  $name = $_POST['task-name'];
  echo $name;

  $sql = "INSERT INTO `tasks`(`name`, `is_completed`, `project_id`) VALUES ('$name','0', '$project_id')";

  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "New record created successfully.";
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  header('Location: index.php?project=' . $project_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container" style="padding: 0 100px;">

      <a class="navbar-brand" href="/">Project Manager</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/pages/task/index.php">Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pages/project/projects.php">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pages/user/index.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pages/user/register.php">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container mx-auto px-12" id="page-content">
    <div class="m-12 flex flex-col">
      <a href="/pages/project/projects.php" class="mr-auto">back</a>
      <h4 class="font-bold text-2xl">
        <?php echo $project_name; ?>
      </h4>
      <form action="" method="POST">
        <div class="my-4 flex flex-row w-full justify-between">
          <input autofocus type="text" name="task-name" class="flex-1 rounded bg-gray-50 border border-gray-400 px-3 py-2 w-5/6 mr-4" placeholder="What do you need to do today?">
          <input type="submit" class="bg-blue-300 px-3 py-2 rounded" name="submit" value="Add" />
        </div>
        <div class="flex flex-row bg-gray-100 p-2 px-6 rounded">
          <div class="flex flex-col mx-2">
            <label for="deadline-picker">Deadline</label>
            <input type="date" id="deadline-picker">
          </div>
          <div class="flex flex-col mx-2">
            <label for="choose-member">Task Handler</label>
            <select id="choose-member">
              <option value="actual value 1">Display Text 1</option>
              <option value="actual value 2">Display Text 2</option>
              <option value="actual value 3">Display Text 3</option>
            </select>
          </div>
        </div>
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
                    <input type="checkbox" class="accent-blue-teal-500 my-4" <?php echo ($row['is_completed'] == 1 ? 'checked' : ''); ?>>
                    <p class="inline-block" name="task-name-display">
                      <?php echo $row['name']; ?>
                    </p>
                  </div>
                </label>
                <!-- <a href="#" id="edit-btn-<?php echo $row['id']; ?>" class="flex bg-yellow-500 inline-block px-3 py-2 rounded m-1">Edit</a> -->
                <a href="delete.php?id=<?php echo $row['id']; ?>&project=<?php echo $row['project_id']; ?>" class="flex bg-red-500 inline-block px-3 py-2 rounded m-1">Delete</a>
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
  $("input[name='edit-btn']").on("click", function() {
    $("input[name='task-name-display']").css("display", "none");
  });
</script>

</html>