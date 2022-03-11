
<!DOCTYPE html>

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>

    <div class="container">
        <h2>Signup Form</h2>

        <a href="/pages/user/index.php">View Users</a>
    </div>

    <form action="" method="POST" class="container">

        <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="firstname">

            <br>

            Last name:<br>

            <input type="text" name="lastname">

            <br>

            Email:<br>

            <input type="email" name="email">

            <br>

            Password:<br>

            <input type="password" name="password">

            <br>

            Gender:<br>

            <input type="radio" name="gender" value="Male">Male

            <input type="radio" name="gender" value="Female">Female

            <br><br>

            <input type="submit" name="submit" value="submit">

        </fieldset>

    </form>

</body>

</html>