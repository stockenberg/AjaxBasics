<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax Basics</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br><br>
    <form action="" method="post" id="addTask" role="form">
        <legend>Add Task</legend>

        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" name="title" id="title"
                   placeholder="Input...">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br>

    <button id="taskLoader">HOle alle Aufgaben</button>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Complete</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>... keine offenen Aufgaben</td>
        </tr>
        </tbody>
    </table>
</div>


<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<script src="js/script.js"></script>
</body>
</html>