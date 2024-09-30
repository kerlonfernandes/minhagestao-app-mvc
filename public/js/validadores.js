
function consultarCEP(cep) {
    cep = cep.replace(/\D/g, '');

    if (cep.length !== 8) {
        console.log('CEP inválido');
        return;
    }


    const url = `https://viacep.com.br/ws/${cep}/json/`;

    $.ajax({
        url: url,
        method: 'GET',
        success: function (data) {
            if (!data.erro) {
                $("#logadouro").val(data.logradouro)
                $("#bairro").val(data.bairro)
                $("#localidade").val(data.localidade)
                $("#uf").val(data.uf)
                $("#logadouro").val(data.logradouro)
                document.querySelector(".cep-not-found").classList.add("d-none")


            } else {
                document.querySelector(".cep-not-found").classList.remove("d-none")
            }
        },
        error: function (err) {
            console.log('Erro na consulta do CEP:', err);
        }
    });
}

if ($("#cep")) {
    $("#cep").on("input", () => {

        let cep = $("#cep").val()
        consultarCEP(cep);

    })

}

if ($(".cliente-cep-editar")) {

    $(".cliente-cep-editar").on("input", () => {

        let cep = $(".cliente-cep-editar").val()
        consultarCEP(cep);

    })

}





function consultarCEP(cep) {
    cep = cep.replace(/\D/g, '');

    if (cep.length !== 8) {
        console.log('CEP inválido');
        return;
    }


    const url = `https://viacep.com.br/ws/${cep}/json/`;

    $.ajax({
        url: url,
        method: 'GET',
        success: function (data) {
            if (!data.erro) {
                if ($("#logadouro") && $("#bairro") && $("#localidade") && $("#uf")) {


                    $("#logadouro").val(data.logradouro)
                    $("#bairro").val(data.bairro)
                    $("#localidade").val(data.localidade)
                    $("#uf").val(data.uf)
                    $("#logadouro").val(data.logradouro)
                    document.querySelector(".cep-not-found").classList.add("d-none")
                }
                if($(".cliente-cep-editar") && $(".cliente-logadouro-editar") && $(".cliente-bairro-editar") && $(".cliente-uf-editar")) {
                    
                    $(".cliente-logadouro-editar").val(data.logradouro)
                    $(".cliente-bairro-editar").val(data.bairro)
                    $(".cliente-localidade-editar").val(data.localidade)
                    $(".cliente-uf-editar").val(data.uf)
                    document.querySelector(".cep-not-found").classList.add("d-none")
                }
            } else {
                document.querySelector(".cep-not-found").classList.remove("d-none")
            }
        },
        error: function (err) {
            console.log('Erro na consulta do CEP:', err);
        }
    });
}

$("#cep").on("input", () => {

    let cep = $("#cep").val()
    consultarCEP(cep);

})

let documentoInput;

if($("#cpf")) {
     documentoInput = document.getElementById('cpf');
     documentoInput.addEventListener('input', formatarDocumento);

}
if($(".cliente-cpf-editar")) {
     documentoInput = document.querySelector('.cliente-cpf-editar');

}




function formatarDocumento() {
    let valor = documentoInput.value.replace(/\D/g, '');

    documentoInput.value = valor;

    const cpfRegex = /^(\d{3})(\d{3})(\d{3})(\d{2})$/;
    const cnpjRegex = /^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/;

    if (valor.length <= 11 && cpfRegex.test(valor)) {
        valor = valor.replace(cpfRegex, '$1.$2.$3-$4');
    } else if (valor.length > 11 && cnpjRegex.test(valor)) {
        valor = valor.replace(cnpjRegex, '$1.$2.$3/$4-$5');
    }

    // Atualiza o valor final do campo
    documentoInput.value = valor;
}

function formatarTelefone(input) {
    const telefoneRegex = /^(\d{2})(\d)(\d{4})(\d{4})$/;
    const telefone = input.value;

    if (telefoneRegex.test(telefone)) {
        const telefoneFormatado = telefone.replace(telefoneRegex, "$1 $2 $3-$4");
        input.value = telefoneFormatado;
        input.setCustomValidity("");
    } else {
        input.setCustomValidity("O telefone deve estar no formato XX xxxx-xxxx");
    }
}