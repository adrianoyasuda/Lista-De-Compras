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

// Consulta para obter a lista de itens do banco de dados
$sql = "SELECT * FROM lista";
$result = $conn->query($sql);

$listaItens = array();

if ($result->num_rows > 0) {
    // Ler os dados da tabela e armazenar em um array
    while ($row = $result->fetch_assoc()) {
        // Converter os valores para números
        $row['valor'] = floatval($row['valor']);
        $row['valorTotal'] = $row['quantidade'] * $row['valor'];
        $listaItens[] = $row;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();

// Enviar os dados da lista como resposta em formato JSON
header('Content-Type: application/json');
echo json_encode($listaItens);
?>