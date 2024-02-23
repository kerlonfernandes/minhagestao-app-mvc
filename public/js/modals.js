var agendaTypeInput = document.getElementById('agenda-type');

$('#modalAgenda').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var agendaType = button.data('agenda-type');
    agendaTypeInput.value = agendaType;
});

document.addEventListener("DOMContentLoaded", () => {
    function formatarNumero(numero) {
        // Usando o método toLocaleString para formatar o número
        return numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
    }

    let precoElement = document.querySelector("#price");
    let precoTexto = precoElement.textContent; // Obtém o texto dentro do elemento
    let preco = parseFloat(precoTexto); // Converte para número (caso ainda não seja)
    let precoFormatado = formatarNumero(preco);

    // Atualizar o texto dentro do elemento com o valor formatado
    precoElement.textContent = precoFormatado;
});

var agendaTypeInput = document.getElementById('agenda-type');

$('#modalOrcamento').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var agendaType = button.data('agenda-type');
    agendaTypeInput.value = agendaType;
});
