<?php

$connection = mysqli_connect('localhost', 'root', "", 'loginapp');

if($connection) {
    echo "We are connected";
    echo "<br>";
} else {
    die("Database connection failed");
    echo "<br>";
}

if($_GET && array_key_exists('comp_task', $_GET)) {
    $id = $_GET['comp_task'];

    $query = "
    UPDATE tasks 
    SET is_completed = 1
    WHERE id = '$id'
    ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed" . mysqli_error($connection));
    }
    $alert = 'Task has been completed successfully';
}


if($_POST && array_key_exists('task-text', $_POST)) {
    $text = $_POST['task-text'];

    $query = "INSERT INTO tasks(text) ";
    $query .= "VALUES ('$text')";

    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed" . mysqli_error($connection));
    }

    $alert = 'Task has been saved successfully';
}

$query = "SELECT * FROM tasks WHERE is_completed=0";
$result = mysqli_query($connection, $query);

if(!$result) {
    die("USER DOES NOT EXIST " . mysqli_error($connection));
}

$tasks = $result->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TASKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <?php if(isset($alert)) { ?>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <p><?php echo $alert; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-3 offset-1">
            <hr>
            <h2 class="text-center">New task</h2>
            <hr>

            <form method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="exampleTextarea">Task text</label>
                        <textarea class="form-control" name="task-text" id="exampleTextarea" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
        </div>

        <div class="col-7">
            <hr>
            <h2 class="text-center">Tasks to do</h2>
            <hr>

            <div class="list-group">
                <?php if(!count($tasks)) {?>
                    <h1 class="text-center text-muted">ALL TASKS ARE COMPLETED</h1>
                <?php }?>

                <?php foreach($tasks as $task) { ?>
                    <a href="?comp_task=<?php echo $task['id'] ?>"
                       class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <!--                            <h5 class="mb-1">List group item heading</h5>-->
                            <small>
                                <?php echo $task['created_at']; ?>
                            </small>
                        </div>

                        <p class="mb-1">
                            <?php echo $task['text']; ?>
                        </p>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>