function hideSpin1() {
    $("#spin-1").hide()
}

function orcamentos() {


    $.ajax({
        url: "ajax/orcamentos.php",
        method: "GET",
        success: function (data) {
            $("#orcamentos-area").html(data);
            hideSpin1()
        },
        error: function (e) {
            console.log(e)
        },

        // complete: function () {
        //     
        // }
    });

}

orcamentos()
function generateRandomCode() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let code = '';

    for (let i = 0; i < 11; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        code += characters.charAt(randomIndex);
    }

    return code;
}
function criaOrcamento() {

    if (document.querySelector("#cria-orcamento")) {


        document.querySelector("#cria-orcamento").addEventListener("click", () => {

            let titulo_orcamento = $("#titulo_orcamento").val()
            let descricao = $("#descricao").val()
            let valor_orcamento = $("#valor_orcamento").val()
            let codigo_orcamento = generateRandomCode()
            if (titulo_orcamento !== "" && descricao !== "" && valor_orcamento !== "") {
                let dados = {
                    titulo_orcamento: titulo_orcamento,
                    descricao: descricao,
                    valor_orcamento: valor_orcamento,
                    codigo_orcamento: codigo_orcamento
                }
                $.ajax({
                    url: "ajax/criaOrcamento.php",
                    method: "POST",
                    data: dados,
                    success: function (data) {
                        console.log(data)
                        $("#titulo_orcamento").val('')
                        $("#descricao").val('')
                        $("#valor_orcamento").val('')
                        orcamentos()
                    },

                    error: function (e) {
                        console.log(e)
                    }

                })
            }

        })
    }
}

criaOrcamento()

function valorOrcamento() {

    
    $.ajax({
        url: "ajax/orcamentoSpec.php",
        method: "GET",
        success: function (data) {
            console.log(data)
            $("#orcamento-valor").html(data);


        },
        error: function (e) {
            console.log(e)
        },

        // complete: function () {
        //     
        // }
    });
}
valorOrcamento()

function valorOrcamento(code) {

    console.log(code)

    $.ajax({
        url: "ajax/orcamentoSpec.php?orcamento_spec=" + code,
        method: "GET",
        success: function(data) {
            console.log(data)
            $("#orcamento-valor").html(data);


        },
        error: function(e) {
            console.log(e)
        },

        // complete: function () {
        //     
        // }
    });
}

