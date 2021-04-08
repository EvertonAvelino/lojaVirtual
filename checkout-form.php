<?php
include_once './menu.php';
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

include_once './conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./images/icons/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>E-comerce - Formulario de checkout</title>
</head>

<body>

    <?php   
       
        $query_products = "SELECT id, name, price FROM products WHERE id = :id LIMIT 1";
        $result_products = $conn->prepare($query_products);
        $result_products->bindParam(':id', $id, PDO::PARAM_INT);
        $result_products->execute();
        $row_product = $result_products->fetch(PDO::FETCH_ASSOC);
        extract($row_product);
       
    ?>
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4 " src="./images/logo/carrinho.png" alt="" width=" 72" height="72">
            <h2>Formulario de pagamento</h2>
            <p class="lead">Falta pouco pra finalizarmos sua compra</p>
        </div>
        <div class="row mb-5 ">
            <div class="col-md-4">
                <h3><?php echo $name; ?></h3>
            </div>
            <div class="col-md-4">
                <div class="mb-1 text-muted">
                    <?php 
                    echo "R$ " . number_format($price, 2 , "," , ".");
                    ?>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-5">
            <div class="col-md-12">
                <h4 class="mb-3">Informações pessoais</h4>

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">Primeiro nome:</label>
                            <input class="form-control" type="text" name="first_name" id="first_name"
                                placeholder="Primeiro nome" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Ultimo nome:</label>
                            <input class="form-control" type="text" name="last_name" id="last_name"
                                placeholder="Ultimo nome nome" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cpf">CPF:</label>
                            <input class="form-control" type="text" name="cpf" id="cpf"
                                placeholder=" somente os numeros do CPF" maxlength="14" oninput="maskCPF(this)"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Telefone:</label>
                            <input class="form-control" type="text" name="phone" id="phone"
                                placeholder="Telefone com DDD" maxlength="14" oninput="maskPhone(this)" required>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Seu melhor E-mail"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>
        </div>

    </div>

    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="js/custom.js"></script>

</body>

</html>