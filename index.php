<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Uma simples lista de compras, para melhor organização dee qualquer lugar.">


        <!-- Bootstrap e CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.scss">

        <!-- SweetAlert para Notificações -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

        <title>Lista de Compras - Yasuda</title>
        <link rel="shortcut icon"  href="assets/imgs/favicon-32x32.png" />

    </head>
    <body class="bg-dark text-light">
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form id="itemForm">
                        <div class="row">
                            <h2 class="col-12 text-center">Adicionar Item:</h2>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="item">Item:</label>
                                    <input type="text" class="form-control" id="item" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="quantidade">Quantidade:</label>
                                    <input type="number" class="form-control" id="quantidade" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="valor">Valor:</label>
                                    <input type="number" class="form-control" id="valor" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success">Adicionar à Lista</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 pt-5">
                    <div class="col-12 text-center pb-3">
                        <h2>Lista de Compras:</h2>
                    </div>
                    <table class="table">
                        <thead>
                        <tr class="text-light text-center">
                            <th>Item</th>
                            <th>Quant.</th>
                            <th>Valor Unitário</th>
                            <th>Valor Total</th>
                            <th>Ação</th>

                        </tr>
                        </thead>
                        <tbody id="listaItens" class="text-light">
                        <!-- Aqui serão exibidos os itens adicionados dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Bootstrap JS e jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Script JavaScript para adicionar itens à lista -->
        <script src="assets/js/basic.js"></script>
    </body>
</html>