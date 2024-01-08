<?php

include "connectDatabase.php";

$query = 'SELECT m.*, u.* FROM messages m INNER JOIN users u ON m.user_id = u.id';

// Get Result
$result = mysqli_query($conn, $query);

// Fetch Data
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($messages);

?>