<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="col-sm-6">
        <?php if(array_key_exists('user', $_SESSION) && $_SESSION['user']) { ?>
            <p>You are signed in</p>


        <?php  } else { ?>
        <form action="login-form-save.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
        <?php } ?>
    </div>
</div>

</body>
</html>