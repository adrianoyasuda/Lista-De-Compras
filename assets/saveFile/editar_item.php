<?php
// Conectar ao banco de dados (substitua com suas credenciais)
$servername = "localhost";
$username = "Testes";
$password = "Testes";
$dbname = "lista_de_compras_yasuda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do item a ser editado
    $index = $_POST['index'];
    $editedItem = $_POST['item'];
    $editedQuantidade = $_POST['quantidade'];
    $editedValor = $_POST['valor'];

    // Atualizar os campos "item", "quantidade" e "valor" do item na tabela "lista"
    $sql = "UPDATE lista SET item='$editedItem', quantidade='$editedQuantidade', valor='$editedValor' WHERE id=$index";

    if ($conn->query($sql) === TRUE) {
        echo "Item editado com sucesso!";
    } else {
        echo "Erro ao editar o item: " . $conn->error;
    }
}

$conn->close();
?>