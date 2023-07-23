$(document).ready(function () {
    function carregarLista() {
        $.ajax({
            type: "GET",
            url: "assets/saveFile/carregar_lista.php",
            dataType: "json",
            success: function (data) {
                $("#listaItens").empty();

                data.forEach(function (item) {
                    let valorTotal = item.quantidade * item.valor;
                    $("#listaItens").append(`
                        <tr class="text-center">
                            <td>${item.item}</td>
                            <td>${item.quantidade}</td>
                            <td>R$ ${item.valor.toFixed(2)}</td>
                            <td>R$ ${valorTotal.toFixed(2)}</td>
                            <td>
                                ${criarBotaoEditar(item.id)}
                                ${criarBotaoRemover(item.id)}
                            </td>
                        </tr>
                    `);
                });

                // Associar o evento de clique aos botões "Editar" e "Remover" dos itens carregados
                $(".editar-item").off("click").on("click", function () {
                    const index = $(this).data("index");
                    const item = $(this).closest("tr").find("td:eq(0)").text();
                    const quantidade = parseInt($(this).closest("tr").find("td:eq(1)").text());
                    const valor = parseFloat($(this).closest("tr").find("td:eq(2)").text().replace("R$ ", ""));
                    editarItem(index, item, quantidade, valor);
                });

                $(".remover-item").off("click").on("click", function () {
                    const index = $(this).data("index");
                    removerItem(index);
                });
            },
            error: function (error) {
                console.log("Erro ao carregar a lista: " + error.responseText);
            },
        });
    }

    function formatarValor(valor) {
        if (typeof valor === 'number') {
            return "R$ " + valor.toFixed(2);
        }
        return "";
    }

    function criarBotaoEditar(index) {
        return `
            <button type="button" class="btn btn-warning btn-sm editar-item" data-index="${index}">Editar</button>
        `;
    }

    function criarBotaoRemover(index) {
        return `
            <button type="button" class="btn btn-danger btn-sm remover-item" data-index="${index}">Remover</button>
        `;
    }

    function editarItem(index, item, quantidade, valor) {
        // Exemplo simples de como exibir um modal para edição do item.
        // Aqui, você pode usar um modal ou outro formulário para edição mais elaborada.
        Swal.fire({
            title: 'Editar Item',
            html: `
                <input id="edit-item" class="swal2-input" type="text" value="${item}">
                <input id="edit-quantidade" class="swal2-input" type="number" value="${quantidade}">
                <input id="edit-valor" class="swal2-input" type="number" value="${valor}">
            `,
            focusConfirm: false,
            confirmButtonText: 'Confirmar',
            preConfirm: () => {
                const editedItem = $("#edit-item").val();
                const editedQuantidade = parseInt($("#edit-quantidade").val());
                const editedValor = parseFloat($("#edit-valor").val());
                salvarEdicao(index, editedItem, editedQuantidade, editedValor);
            },
        });
    }

    function salvarEdicao(index, editedItem, editedQuantidade, editedValor) {
        $.ajax({
            type: "POST",
            url: "assets/saveFile/editar_item.php",
            data: { index: index, item: editedItem, quantidade: editedQuantidade, valor: editedValor },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    text: response,
                });

                carregarLista();
            },
            error: function (error) {
                Swal.fire({
                    icon: "error",
                    title: "Erro!",
                    text: "Erro ao editar o item: " + error.responseText,
                });
            },
        });
    }

    function removerItem(index) {
        $.ajax({
            type: "POST",
            url: "assets/saveFile/remover_item.php",
            data: { index: index },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    text: response,
                });

                carregarLista();
            },
            error: function (error) {
                Swal.fire({
                    icon: "error",
                    title: "Erro!",
                    text: "Erro ao remover o item: " + error.responseText,
                });
            },
        });
    }

    $("#itemForm").submit(function (e) {
        e.preventDefault();

        let item = $("#item").val();
        let quantidade = parseInt($("#quantidade").val());
        let valor = parseFloat($("#valor").val());

        let valorTotal = quantidade * valor;

        $("#listaItens").append(`
            <tr class="text-center">
                <td>${item}</td>
                <td>${quantidade}</td>
                <td>${formatarValor(valor)}</td>
                <td>${formatarValor(valorTotal)}</td>
                <td>
                    ${criarBotaoEditar(-1)}
                    ${criarBotaoRemover(-1)}
                </td>
            </tr>
        `);

        $("#itemForm")[0].reset();

        $.ajax({
            type: "POST",
            url: "assets/saveFile/save_item.php",
            data: { item: item, quantidade: quantidade, valor: valor },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    text: response,
                });

                carregarLista();
            },
            error: function (error) {
                Swal.fire({
                    icon: "error",
                    title: "Erro!",
                    text: "Erro ao adicionar o item à lista: " + error.responseText,
                });
            },
        });
    });

    // Carregar a lista ao abrir a página
    carregarLista();
});
