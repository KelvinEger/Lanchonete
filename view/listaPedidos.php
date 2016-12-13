<?php

include ("../libs/connect.php");

$query = "SELECT id, nome, endereco, pedido, quantidade FROM pedidos";

$stmt = $con->prepare($query);
$stmt->execute();

if ($stmt->execute()) {
    echo "<table class='container bordered striped highlight'>
            <tr>
            <th colspan='1'>A&ccedil;&atilde;o</th>
            <th>C&oacute;digo</th>
            <th>Nome</th>
            <th>Endere&ccedil;o</th>
            <th>Pedido</th>
            <th>Quantidade</th>
            </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td><a class=\"waves-effect red darken-1 btn\" onclick=\"exclui('" . $row['id'] . "')\">Exclui</a>&nbsp;&nbsp;&nbsp;";
        echo "<a class=\"waves-effect blue lighten-1 btn modal-trigger\" onclick=\"modalAltera('" . $row['id'] . "', '" . $row['nome'] . "','" . $row['endereco'] . "','" . $row['pedido'] . "','" . $row['quantidade'] . "')\" href=\"#modal1\">Altera</td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['endereco'] . "</td>";
        echo "<td>" . $row['pedido'] . "</td>";
        echo "<td>" . $row['quantidade'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

