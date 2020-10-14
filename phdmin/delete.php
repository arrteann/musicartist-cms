<?php
// LOAD CONFIG
include '../config/cofing.php';
$core = new Core();
// GET PARAM
$tbl = htmlspecialchars($_GET['delete']);
$id = htmlspecialchars($_GET['id']);
$page = htmlspecialchars($_GET['page']);
// DELETE
$delete = $core->connection->prepare("DELETE FROM " . $tbl . " WHERE id=:id");
$delete->bindValue(":id", $id);
$delete->execute();
header("Location: ".$page.'.php');
