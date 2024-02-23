$(document).ready(function () {

    function hideOverLay() {

        $("#overlay").fadeOut('slow', function() {
          $("#loader-container").hide();
          $("#custom-loader").hide();
      
        });
      
      
      
      }
      
      function showOverLay() {
      
        $("#overlay").show();
      
      }
      
    function formatarNumero(numero) {
        // Usando o método toLocaleString para formatar o número
        return numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
    }


    function financeira(pesquisa) {
        // Carregar o spinner no container
        $("#spinner-container");

        $("#loader").show();
                      // $(".info-skeleton").hide();

        $.ajax({
            url: `${URL_VIEW}/financeiro/consultaCadastroFinanceiro.php`,
            method: "GET",
            data: { pesquisa: pesquisa },
            success: function (data) {
                $("#content").hide().html(data).fadeIn('fast'); 
            },
            error: function () {
                $("#loader").show();
            },

            complete: function () {
                $("#loader").hide();
            }
        });
    }

    // Carregar os resultados iniciais
    financeira();



    function EnviaEntrada() {
        $('#entrada').on('click', () => {

            if ($("#tipo-registro") && $("#moeda") !== "") {

                let dataAtual = new Date()

                let tipo = $("#tipo-registro").val()
                let valor = $("#moeda").val()
                let data = $("#date-input").val()
                let descricao = $("#descricao").val()
                let categoria = $("#id_categoria").val()

                if (valor && tipo !== '') {

                    if (data === '') {
                        let dataFormatada = dataAtual.toISOString().slice(0, 10);
                        let dataInput = document.querySelector('#date-input')
                        dataInput.value = dataFormatada

                    }

                    let dados = {
                        tipo: tipo, // Substitua 'tipo' pelo nome correto do campo
                        dataReg: data,
                        valor: valor, // Substitua 'valor' pelo nome correto do campo
                        descricao: descricao, // Substitua 'descricao' pelo nome correto do campo
                        categoria: categoria // Substitua 'categoria' pelo nome correto do campo
                    };

                    $.ajax({
                        url: URL_AJAX + "/financeiro/cadastroFinanceiro.php",
                        method: "POST",
                        data: dados,
                        success: function (data) {

                            let price = $("#price").val("")
                            let valor = $("#moeda").val("")
                            let descricao = $("#descricao").val("")
                            let categoria = $("#id_categoria").val("")
                            console.log(data);
                            data = JSON.parse(data);

                            showToast(data.status, data.msg)
                            // GraficoRelatorio();


                            financeira();
                            Entradas()

                        },

                        error: function () {

                        }
                    })
                }
               
            }
            
            else {
                showToast("error", "Você precisa ter um nome e valor para cadastrar")
    
            }
            
            // GraficoRelatorio();

        })
    }




    function deletaValor() {

        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('del-val')) {
                const valId = event.target.getAttribute('data-val-id');
                const tipo = event.target.getAttribute('data-tipo');

                $.ajax({
                    url: URL_AJAX + "/financeiro/deletaValor.php",
                    method: "POST",
                    data: {
                        valId: valId,
                        tipo: tipo
                    },
                    success: function (data) {
                        console.log(data);
                        data = JSON.parse(data);

                        showToast(data.status, data.msg)

                        financeira()
                        Entradas()


                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.readyState); // Mostra o estado da requisição
                        console.log(xhr.status); // Mostra o código de status HTTP
                        console.log(xhr.statusText); // Mostra a descrição do status
                        console.log(xhr.responseText); // Mostra a resposta do servidor
                        console.log(error); // Mostra informações adicionais do erro
                    }

                });
            }
        });


    }
    deletaValor()

    function EnviaSaida() {
        $('#saida').on('click', () => {
            let dataAtual = new Date()

            let valor = $("#moeda2").val()
            let data = $("#date-input2").val()
            let descricao = $("#descricao2").val()
            let categoria = $("#id_categoria2").val()

            if (valor !== '') {

                if (data === '') {
                    let dataFormatada = dataAtual.toISOString().slice(0, 10);
                    let dataInput = document.querySelector('#date-input2')
                    dataInput.value = dataFormatada

                }
                let dados = {
                    tipo: "Saída", // Substitua 'tipo' pelo nome correto do campo
                    dataReg: data,
                    valor: valor, // Substitua 'valor' pelo nome correto do campo
                    descricao: descricao, // Substitua 'descricao' pelo nome correto do campo
                    categoria: categoria // Substitua 'categoria' pelo nome correto do campo
                };

                $.ajax({
                    url: URL_AJAX + "/cadastroFinanceiro.php",
                    method: "POST",
                    data: dados,
                    success: function (data) {

                        let price = $("#price2").val("")
                        let valor = $("#moeda2").val("")
                        let descricao = $("#descricao2").val("")
                        let categoria = $("#id_categoria2").val("")
                        showAlert()
                        GraficoRelatorio();


                        setTimeout(() => {
                            closeAlert()
                        }, 3000);



                    },

                    error: function () {
                        showAlertError()

                        setTimeout(() => {
                            closeAlertError()
                        }, 3000);
                    }
                })
                financeira();
                GraficoRelatorio();
            }
            else {

                let modal = document.querySelector('.space-modal')
                modal.className = "error-modal"
                modal.innerHTML = `<div class="error-modal">
                <span>Você precisa inserir um valor </span>
            </div>`

                setTimeout(() => {
                    let modal = document.querySelector('.error-modal')
                    modal.className = "space-modal"
                    modal.innerHTML = ""

                }, 3000)
            }

        })

    }
    function Agenda() {
        $('#saida').on('click', () => {
            let dataAtual = new Date()

            let valor = $("#moeda-agenda").val()
            let data = $("#date-input2").val()
            let descricao = $("#descricao2").val()
            let categoria = $("#id_categoria2").val()


            if (valor !== '') {

                if (data === '') {
                    let dataFormatada = dataAtual.toISOString().slice(0, 10);
                    let dataInput = document.querySelector('#date-input2')
                    dataInput.value = dataFormatada

                }
                let dados = {
                    tipo: "Saída", // Substitua 'tipo' pelo nome correto do campo
                    dataReg: data,
                    valor: valor, // Substitua 'valor' pelo nome correto do campo
                    descricao: descricao, // Substitua 'descricao' pelo nome correto do campo
                    categoria: categoria // Substitua 'categoria' pelo nome correto do campo
                };

                $.ajax({
                    url: URL_AJAX + "/cadastroFinanceiro.php",
                    method: "POST",
                    data: dados,
                    success: function (data) {

                        let price = $("#price2").val("")
                        let valor = $("#moeda2").val("")
                        let descricao = $("#descricao2").val("")
                        let categoria = $("#id_categoria2").val("")
                        showAlert()
                        GraficoRelatorio();


                        setTimeout(() => {
                            closeAlert()
                        }, 3000);



                    },

                    error: function () {
                        showAlertError()

                        setTimeout(() => {
                            closeAlertError()
                        }, 3000);
                    }
                })
                financeira();
                GraficoRelatorio();
            }
            else {

                let modal = document.querySelector('.space-modal')
                modal.className = "error-modal"
                modal.innerHTML = `<div class="error-modal">
                <span>Você precisa inserir um valor </span>
            </div>`

                setTimeout(() => {
                    let modal = document.querySelector('.error-modal')
                    modal.className = "space-modal"
                    modal.innerHTML = ""

                }, 3000)
            }

        })

    }
    function Entradas() {
        // Carregar o spinner no container
        $("#spinner-container").show(); // Mostra o spinner

        // Mostra o loader
        $("#loader").show();

        $.ajax({
            url: `${URL_VIEW}/financeiro/Entradas.php`,
            method: "GET",
            dataType: "json", // Especifique o tipo de dados esperado como JSON
            success: function (data) {
                // Acesse os valores do JSON e atualize os elementos da página
                if (data.soma_entradas > 0) {
                    let entradas = data.soma_entradas
                    $("#entrada-financeiro").text(entradas);
                }
                else {
                    $("#entrada-financeiro").text("0");
                }
                if (data.soma_saidas > 0) {
                    let saidas = formatarNumero(data.soma_saidas)
                    $("#saida-financeiro").text(saidas);
                }
                else {
                    $("#saida-financeiro").text("0");
                }
                if (data.total) {

                    if (data.total < 0) {
                        document.querySelector("#total-financeiro").className = "Negativo"
                    }
                    else {
                        document.querySelector("#total-financeiro").className = "Positivo"

                    }

                    $("#total-financeiro").text(formatarNumero(data.total))

                }
                financeira();
                GraficoRelatorio();
            },
            error: function () {
                // Em caso de erro, você pode tratar aqui (ex: exibir uma mensagem de erro)
            },
            complete: function () {
                // Esconda o loader após a conclusão da requisição AJAX
                $("#loader").hide();
            }
        });

        financeira();
        GraficoRelatorio();
    }


    function GraficoRelatorio() {

        var existingChart = Chart.getChart("myChart");
        if (existingChart) {
            existingChart.destroy();
        }
        
        $.ajax({
            url: URL_AJAX + "/financeiro/RelatórioFinanceiro.php", // Altere o URL para corresponder ao seu caminho
            method: "GET",
            dataType: "json",
            success: function (data) {
                
                var labels = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

                var entradas = [];
                var saidas = [];

           
                entradas.push(data.jan_ent);
                entradas.push(data.fev_ent);
                entradas.push(data.mar_ent);
                entradas.push(data.abr_ent);
                entradas.push(data.mai_ent);
                entradas.push(data.jun_ent);
                entradas.push(data.jul_ent);
                entradas.push(data.ago_ent);
                entradas.push(data.set_ent);
                entradas.push(data.out_ent);
                entradas.push(data.nov_ent);
                entradas.push(data.dez_ent);


                saidas.push(data.jan_sai);
                saidas.push(data.fev_sai);
                saidas.push(data.mar_sai);
                saidas.push(data.abr_sai);
                saidas.push(data.mai_sai);
                saidas.push(data.jun_sai);
                saidas.push(data.jul_sai);
                saidas.push(data.ago_sai);
                saidas.push(data.set_sai);
                saidas.push(data.out_sai);
                saidas.push(data.nov_sai);
                saidas.push(data.dez_sai);


                var chartData = {
                    labels: labels,
                    datasets: [
                        {
                            label: "Entradas",
                            data: entradas,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: "Saídas",
                            data: saidas,
                            backgroundColor: 'rgba(255, 0, 0, 0.2)',
                            borderColor: 'rgba(255, 0, 0, 1)',
                            borderWidth: 1
                        }
                    ]
                };

                var options = {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                };

                // Atualize o gráfico
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: options
                });
                document.querySelector(".ano-rel").classList.remove("d-none")
            },
            error: function () {
            }
        });
    }




    function atualizarDados() {
        financeira();
    }


    GraficoRelatorio();

    Entradas()

    financeira();
    // EnviaSaida()
    EnviaEntrada()

    hideOverLay()

})

