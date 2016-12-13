<?php


include ("../libs/connect.php");

$id = $_POST['id'];

$query = "DELETE FROM pedidos WHERE id =  :id";
$stmt = $con->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

if ($result = $stmt->execute()) {
    echo 'Excluido com sucesso';
} else {
    echo 'Algum erro aconteceu';
}
?>