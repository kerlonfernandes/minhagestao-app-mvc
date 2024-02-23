function createDialogBox(textoPergunta, textoCancelar, textoDeletar, funcao) {
    var overlayConfirmation = document.createElement('div');
    overlayConfirmation.classList.add('overlayConfirmation');
    overlayConfirmation.id = 'overlayConfirmation';

    var confirmationBox = document.createElement('div');
    confirmationBox.classList.add('confirmation-box');
    confirmationBox.id = 'confirmationBox';

    var paragrafo = document.createElement('p');
    paragrafo.textContent = textoPergunta;
    confirmationBox.appendChild(paragrafo);

    var botaoCancelar = document.createElement('button');
    botaoCancelar.classList.add('cancel-button');
    botaoCancelar.textContent = textoCancelar;
    botaoCancelar.onclick = function () {
        fecharoverlay();
    };
    confirmationBox.appendChild(botaoCancelar);

    var botaoDeletar = document.createElement('button');
    botaoDeletar.classList.add('delete-button');
    botaoDeletar.textContent = textoDeletar;
    botaoDeletar.onclick = function () {
        if (typeof funcao === 'function') {
            funcao();
            fecharoverlay(); // Fechar a caixa de diálogo após deletar
        }
    };
    confirmationBox.appendChild(botaoDeletar);

    overlayConfirmation.appendChild(confirmationBox);

    document.body.appendChild(overlayConfirmation);

    abriroverlay();
}

function abriroverlay() {
    var overlayConfirmation = document.getElementById('overlayConfirmation');
    var confirmationBox = document.getElementById('confirmationBox');

    overlayConfirmation.style.display = 'flex';
    setTimeout(function () {
        overlayConfirmation.classList.add('active');
        confirmationBox.classList.add('active');
    }, 10);
}

function fecharoverlay() {
    var overlayConfirmation = document.getElementById('overlayConfirmation');
    var confirmationBox = document.getElementById('confirmationBox');

    overlayConfirmation.classList.remove('active');
    confirmationBox.classList.remove('active');

    setTimeout(function () {
        overlayConfirmation.style.display = 'none';
        document.body.removeChild(overlayConfirmation);
    }, 300);
}

function confirmarDelecao() {
    alert("Item deletado com sucesso!");
}