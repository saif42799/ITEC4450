<?php

if (!isset($_POST['message'])) {

    echo "Message not set";
    exit;
}

include "connectDatabase. php";

$msg = htmlspecialchars($_POST['message']);
$user_id = htmlspecialchars($_POST['user_id']);

$sql = "INSERT INTO messages (user_id, msg) VALUES ('$user_id', '$msg')";

if ($conn->query($sql) === TRUE) {


} else {

    echo "Error: ".$sql."<br>";
    echo $conn->error."<br>";

}

$conn->close();

?>