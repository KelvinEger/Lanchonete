<?php

include ("../libs/connect.php");

$query = "SELECT id, produto, componente, preco FROM cardapio";

$stmt = $con->prepare($query);
$stmt->execute();

if ($stmt->execute()) {
    echo "<table class='container striped highlight'>
            <tr>
			<th>Ações</th>
            <th>Código</th>
            <th>Produto</th>
            <th>Componentes</th>
            <th>Preço</th>
            </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
		echo "<td><a class=\"waves-effect red darken-1 btn\" onclick=\"exclui('" . $row['id'] . "')\">Excluir</a>&nbsp;&nbsp;&nbsp;";
        echo "<a class=\"waves-effect blue lighten-1 btn modal-trigger\" onclick=\"modalAltera('" . $row['id'] . "', '" . $row['produto'] . "','" . $row['componente'] . "','" . $row['preco'] . "')\" href=\"#modal2\">Alterar</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['produto'] . "</td>";
        echo "<td>" . $row['componente'] . "</td>";
        echo "<td>" . $row['preco'] . "</td>";
        echo "</tr>";    }
    echo "</table>";
}
?>
<style type="text/css">
.container{
	width:90%;
}
</style>