## Lista de Compras

* **Bootstrap - Javascript - PHP**


* Criar o formulário para adicionar itens à lista utilizando Bootstrap.
* Implementar o JavaScript para calcular o valor total (Quantidade x Valor) e adicionar os itens à lista dinamicamente.
* Implementar o PHP para salvar os dados na tabela "lista" do banco de dados.


Com esses códigos, você terá um formulário que permite adicionar itens à lista dinamicamente na página usando JavaScript e exibir os itens em uma tabela.

O PHP é responsável por salvar os dados na tabela do banco de dados MySQL. 

Certifique-se de criar a tabela "lista" com os campos "id"(int - Autoincrement) "item", "quantidade", "valor" no banco de dados antes de executar o código.



CREATE TABLE lista (
id INT AUTO_INCREMENT PRIMARY KEY,
item VARCHAR(255) NOT NULL,
quantidade INT NOT NULL,
valor FLOAT NOT NULL
);