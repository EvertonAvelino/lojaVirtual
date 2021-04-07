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

        $query_products = "SELECT id, name, price, image FROM products ORDER BY id ASC";
        $result_products = $conn->prepare($query_products);
        $result_products->execute();

        while($row_product = $result_products->fetch(PDO::FETCH_ASSOC)){
           
            extract($row_product);

            echo "<img src='./images/$id/$image'><br>";
            echo "ID: $id <br>";
            echo "Nome: $name <br>";
            echo "Preço: R$".number_format($price,2,",",".")."<br>";
            echo "<hr>";
        }

        


    ?>
</body>

</html>