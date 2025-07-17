<?php 
include '../config/database.php';

$note_id = $_POST['note_id'];
$id = new MongoDB\BSON\ObjectId($note_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['_id' => $id],
        ['$set' => ['title' => $_POST['title'], 'content' => $_POST['content']]]
    );
    $mongo->executeBulkWrite('my_notes.notes', $bulk);

    header('Location: /views/my_notes.php');
    exit;
}
?>