<?php 
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bulk = new MongoDB\Driver\BulkWrite;
    $doc = [
        'user_id' => $_SESSION['user_id'],
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ];
    $bulk->insert($doc);
    $mongo->executeBulkWrite('my_notes.notes', $bulk);

    header('Location: /views/my_notes.php');
    exit;
}