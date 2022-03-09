<?php
include "../config/config.php";
$sql = "SELECT * FROM projects;";
$result = $conn->query($sql)
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <!-- Button trigger modal -->
  <div class="container"></div>
  <div class="row">
    <div class="col text-center">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        New Project
      </button>
    </div>
  </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input name="project-name" type="text" placeholder="project name" class="w-100">
            <textarea name="project-description" id="project-description" class="w-100" cols="30" rows="10"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php $row["name"]; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
  <?php
    }
  }
  ?>

</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
  })
</script>

</html>