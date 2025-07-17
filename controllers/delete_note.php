<?php
include '../config/database.php';

$id = new MongoDB\BSON\ObjectId($_GET['id']);
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['_id' => $id]);
$mongo->executeBulkWrite('my_notes.notes', $bulk);

header('Location: /views/my_notes.php');
exit;
?>