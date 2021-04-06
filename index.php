<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>E-comerce</title>
</head>

<body>
    <?php
        echo "<h2>Produtos</h2>";

        $query_products = "SELECT id, name FROM products ORDER BY id DESC";
        $result_products = $conn->prepare($query_products);
        $result_products->execute();

    ?>
</body>

</html>