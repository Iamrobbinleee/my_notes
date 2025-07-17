<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>My Notes Page</title>
</head>
<body>
<?php
    include '../config/database.php';
    if (!isset($_SESSION['user_id'])) {
        header('Location: /index.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $note_id = $_GET['id'];

    $id = new MongoDB\BSON\ObjectId($note_id);

    $filter = ['_id' => $id];
    $query = new MongoDB\Driver\Query($filter);
    $rows = $mongo->executeQuery('my_notes.notes', $query);
    $note = current($rows->toArray());
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="header">Edit Note Page</h3>
                <form class="form-group" action="/controllers/edit_note.php" method="post">
                    <label class="form-label" for="title">Title:</label>
                    <input class="form-control" name="title" value="<?php echo htmlspecialchars($note->title) ?>" required><br>
                    <label class="form-label" for="content">Content:</label>
                    <textarea class="form-control" name="content" required><?php echo htmlspecialchars($note->content) ?></textarea><br>
                    <input type="hidden" name="note_id" value="<?php echo htmlspecialchars($note_id) ?>">
                    <button class="btn btn-md btn-success" type="submit">Update Note</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>