
// function loadFile(dir, page, div, id = null) {
//     let id = id != null ? '?id=' + id : '';
//     $.ajax({
//         url: $`${dir}/${page}.php${id}`,
//         success: function (data) {
//             $('.' + div).html(data);
//             //console.log(data);
//         }
//     });
// }

function showToast(type, message) {
    // Seletor para o corpo da página
    let bodyPage = document.body;

    let toastContainer = document.createElement("div");
    toastContainer.className = "toast-container position-fixed top-0 end-0 p-6";

    // Cria o HTML do toast com base no tipo
    let toastHTML = '';
    if (type === "error") {
        toastHTML = `
            <div class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="color:white;">
                <div class="toast-body">
                    <div class="d-flex gap-4">
                        <span><i class="fa-solid fa-circle-xmark fa-lg icon-error"></i></span>
                        <div class="d-flex flex-column flex-grow-1 gap-2">
                            <div class="d-flex align-items-center">
                                <span class="fw-semibold">Ocorreu um erro!</span>
                                <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <span>${message}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    } else if (type === "success") {
        toastHTML = `
            <div class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true" style="color:white;">
                <div class="toast-body">
                    <div class="d-flex gap-4">
                        <span><i class="fa-solid fa-circle-check fa-lg icon-success"></i></span>
                        <div class="d-flex flex-column flex-grow-1 gap-2">
                            <div class="d-flex align-items-center">
                                <span class="fw-semibold">Sucesso!</span>
                                <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <span>${message}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    } else {
        // Tipo desconhecido
        console.error("Tipo de toast desconhecido:", type);
        return;
    }

    // Define o HTML do toast no container
    toastContainer.innerHTML = toastHTML;

    // Adiciona o toast-container ao corpo da página
    bodyPage.appendChild(toastContainer);

    // Cria um novo objeto Toast do Bootstrap e exibe
    let toastLiveExample = toastContainer.querySelector(".toast");
    let toast = new bootstrap.Toast(toastLiveExample);
    toast.show();
}

function criarCaixaDialogo(textoPergunta, textoCancelar, textoDeletar, funcaoDeletar) {
    // Criar um elemento overlay
    var overlay = document.createElement('div');
    overlay.classList.add('overlay');
    overlay.id = 'overlay';

    // Criar um elemento confirmation-box
    var confirmationBox = document.createElement('div');
    confirmationBox.classList.add('confirmation-box');
    confirmationBox.id = 'confirmationBox';

    // Adicionar parágrafo com o texto da pergunta
    var paragrafo = document.createElement('p');
    paragrafo.textContent = textoPergunta;
    confirmationBox.appendChild(paragrafo);

    // Adicionar botão de cancelar
    var botaoCancelar = document.createElement('button');
    botaoCancelar.classList.add('cancel-button');
    botaoCancelar.textContent = textoCancelar;
    botaoCancelar.onclick = function () {
        fecharOverlay();
    };
    confirmationBox.appendChild(botaoCancelar);

    // Adicionar botão de deletar
    var botaoDeletar = document.createElement('button');
    botaoDeletar.classList.add('delete-button');
    botaoDeletar.textContent = textoDeletar;
    botaoDeletar.onclick = function () {
        if (typeof funcaoDeletar === 'function') {
            funcaoDeletar();
            fecharOverlay(); // Fechar a caixa de diálogo após deletar
        }
    };
    confirmationBox.appendChild(botaoDeletar);

    // Adicionar confirmation-box ao overlay
    overlay.appendChild(confirmationBox);

    // Adicionar overlay ao corpo do documento
    document.body.appendChild(overlay);

    // Abrir a caixa de diálogo
    abrirOverlay();
}

function abrirOverlay() {
    var overlay = document.getElementById('overlay');
    var confirmationBox = document.getElementById('confirmationBox');

    overlay.style.display = 'flex';
    setTimeout(function () {
        overlay.classList.add('active');
        confirmationBox.classList.add('active');
    }, 10);
}

function fecharOverlay() {
    var overlay = document.getElementById('overlay');
    var confirmationBox = document.getElementById('confirmationBox');

    overlay.classList.remove('active');
    confirmationBox.classList.remove('active');

    setTimeout(function () {
        overlay.style.display = 'none';
        // Remover a caixa de diálogo após fechar
        document.body.removeChild(overlay);
    }, 300);
}

function confirmarDelecao() {
    // Código para deletar o item
    alert("Item deletado com sucesso!");
    // Não é necessário chamar fecharOverlay() aqui, pois já é chamado pela função de deletar
}



