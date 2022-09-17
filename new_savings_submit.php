<?php
require 'config.php';

$earning = filter_input(INPUT_POST, 'earning');
$spending = filter_input(INPUT_POST, 'spending');
$id = filter_input(INPUT_POST, 'id');

$sql = $pdo->prepare("UPDATE client SET monthly_earnings = :earning, monthly_spending = :spending WHERE id = :id");
$sql->bindValue(':earning', $earning);
$sql->bindValue(':spending', $spending);
$sql->bindValue(':id', $id);
$sql->execute();

header("Location: index.php");
exit;
?>