<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    </script>
</body>

</html>