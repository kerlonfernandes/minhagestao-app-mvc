function hideOverLay() {

  $("#overlay").fadeOut('slow', function() {
    $("#loader-container").hide();
    $("#custom-loader").hide();

  });



}

function showOverLay() {

  $("#overlay").show();

}


document.addEventListener("DOMContentLoaded", function () {

 

  function consultarClientes(nome) {
    $("#spinner-container");

    $("#loader").show();

    $.ajax({
      url: `${URL_VIEW}/clientes/consultaClientes.php`,
      method: "GET",
      data: { pessoa: nome },
      success: function (data) {
        $(".resultados").hide().html(data).fadeIn('fast'); 

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
  consultarClientes('');

  // Atualizar resultados ao digitar
  $("#pesquisar-cliente").on("input", function () {
    let nome = $(this).val();
    consultarClientes(nome);
  });

  function cadastraCliente() {
    $(".nomeisempty").hide()

    $("#salva-btn").on("click", () => {
      let nome = $("#nome-cliente").val();
      let email = $("#email-cliente").val();
      let cep = $("#cep").val();
      let logadouro = $("#logadouro").val();
      let bairro = $("#bairro").val();
      let localidade = $("#localidade").val();
      let uf = $("#uf").val();
      let endereco = $("#endereco").val();
      let telefone = $("#telefone").val();
      let cpf = $("#cpf").val();

      let dados = {
        nome: nome,
        email: email,
        cep: cep,
        logadouro: logadouro,
        bairro: bairro,
        localidade: localidade,
        uf: uf,
        endereco: endereco,
        telefone: telefone,
        cpf: cpf
      };

      if (nome !== "") {
        $(".nomeisempty").hide()
        $.ajax({
          url: URL_AJAX + "/clientes/cadastraCliente.php",
          method: "POST",
          data: dados,
          success: function (data) {

            $("#nome-cliente").val("");
            $("#email-cliente").val("");
            $("#cep").val("");
            $("#logadouro").val("");
            $("#bairro").val("");
            $("#localidade").val("");
            $("#uf").val("");
            $("#endereco").val("");
            $("#telefone").val("");
            $("#cpf").val("");

            data = JSON.parse(data);
            showToast(data.status, data.msg)
            consultarClientes('')
            clientesInfos()
          },
          error: function (error) {
            console.log(error);
          }
        });
      }
      else {
        $(".nomeisempty").show()
      }

    });
  }
  
  cadastraCliente();



  function deletaClienteArea2Box() {
    if (document.querySelector("#deletar-btn")) {
      document.querySelector("#deletar-btn").addEventListener("click", () => {
        let cliente_nome = document.querySelector(".nome-cliente").value

        createDialogBox('Você tem certeza que deletar ' + cliente_nome + " ?", 'Cancelar', 'Deletar Cliente', () => {
          let id = document.querySelector(".id-cliente").value
          deletarCliente(url = "../ajax/clientes/deletaCliente.php", id)
          const avisoModal = new bootstrap.Modal(document.getElementById('avisoModal'));
          avisoModal.show();
        })

      })



    }
  }


  deletaClienteArea2Box();



  function editaClienteArea2() {

    let documentoInput;

    if ($("#cpf")) {
      documentoInput = document.getElementById('cpf');
    }

    documentoInput.addEventListener('input', formatarDocumento);

    function formatarDocumento() {
      let valor = documentoInput.value.replace(/\D/g, '');

      if (valor.length <= 11) {

        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      } else {
        valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
      }

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

    if (document.querySelector(".editar-btn")) {
      document.querySelector(".editar-btn").addEventListener("click", () => {
        let inputs = document.querySelectorAll('[readonly]');
        inputs.forEach(e => {
          e.removeAttribute('readonly');
          e.style.backgroundColor = '#EEF5FF';
          e.style.borderRadius = '8px'; // Ajuste este valor conforme necessário
          e.style.padding = '4px'; // Ajuste este valor conforme necessário
          e.style.color = "#176B87"
          e.style.fontWeight = "bold"


        });
        document.querySelector(".salvar-btn").classList.remove("d-none")
        document.querySelector(".editar-btn").classList.add("d-none")


        let bodyPage = document.body;
        let toastContainer = document.createElement("div");

        toastHTML = `
        <div class="toast-container position-fixed bottom-0 start-0 p-6 m-4">
          <div class="toast" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
              <div class="d-flex gap-4">
                <span><i class="fa-solid fa-circle-check fa-lg icon-success"></i></span>
                <div class="d-flex flex-column flex-grow-1 gap-2">
                  <div class="d-flex align-items-center">
                    <span class="fw-semibold">Informação</span>
                    <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="toast"
                      aria-label="Close"></button>
                  </div>
                  <span>Agora você pode editar as informações do cliente.</span>
                </div>
              </div>
            </div>
          </div>
        </div>`

        toastContainer.innerHTML = toastHTML;

        bodyPage.appendChild(toastContainer);

        let toastLiveExample = toastContainer.querySelector(".toast");
        let toast = new bootstrap.Toast(toastLiveExample);
        toast.show();

        console.log(inputs)

        document.querySelector(".salvar-btn").addEventListener("click", () => {
          let id = document.querySelector(".id-cliente").value
          let dados = {
            id: id,
            nome: inputs[0].value,
            email: inputs[2].value,
            cep: inputs[4].value,
            logadouro: inputs[8].value,
            bairro: inputs[6].value,
            localidade: inputs[7].value,
            uf: inputs[9].value,
            endereco: inputs[8].value,
            telefone: inputs[3].value,
            cpf: inputs[1].value
          };
          $.ajax({
            url: "../ajax/clientes/editaCliente.php",
            method: "POST",
            data: dados,
            success: function (data) {
              data = JSON.parse(data);
              showToast(data.status, data.msg);
              inputs.forEach(e => {
                e.setAttribute('readonly', true);
                e.style.backgroundColor = '';
                e.style.padding = ''; // Ajuste este valor conforme necessário
                e.style.color = ""
                e.style.fontWeight = ""

              });
              document.querySelector(".salvar-btn").classList.add("d-none")
              document.querySelector(".editar-btn").classList.remove("d-none")
            },
            error: function (error) {
              console.log(error);
            }
          });

        })

      })
    }



  }

  editaClienteArea2()


  function editarCliente() {

    $(document).on('show.bs.modal', '#editarCliente', function (event) {
      const btnDados = $(event.relatedTarget); // Botão que acionou o modal
      const dadosCliente = btnDados.data();

      $(".id-cliente").val(dadosCliente.clientId);
      $(".nome-cliente-editar").val(dadosCliente.nome);
      $(".cliente-cep-editar").val(dadosCliente.cep);
      $(".email-cliente-editar").val(dadosCliente.email);
      $(".cliente-logadouro-editar").val(dadosCliente.logadouro);
      $(".cliente-bairro-editar").val(dadosCliente.bairro);
      $(".cliente-localidade-editar").val(dadosCliente.localidade);
      $(".cliente-uf-editar").val(dadosCliente.uf);
      $(".cliente-endereco-editar").val(dadosCliente.endereco);
      $(".cliente-telefone-editar").val(dadosCliente.telefone);
      $(".cliente-cpf-editar").val(dadosCliente.cpf);
    });

    $("#salva-btn-editar").on("click", () => {
      let id = $(".id-cliente").val();
      let nome = $(".nome-cliente-editar").val();
      let email = $(".email-cliente-editar").val();
      let cep = $(".cliente-cep-editar").val();
      let logadouro = $(".cliente-logadouro-editar").val();
      let bairro = $(".cliente-bairro-editar").val();
      let localidade = $(".cliente-localidade-editar").val();
      let uf = $(".cliente-uf-editar").val();
      let endereco = $(".cliente-endereco-editar").val();
      let telefone = $(".cliente-telefone-editar").val();
      let cpf = $(".cliente-cpf-editar").val();

      let dados = {
        id: id,
        nome: nome,
        email: email,
        cep: cep,
        logadouro: logadouro,
        bairro: bairro,
        localidade: localidade,
        uf: uf,
        endereco: endereco,
        telefone: telefone,
        cpf: cpf
      };

      $.ajax({
        url: URL_AJAX + "/clientes/editaCliente.php",
        method: "POST",
        data: dados,
        success: function (data) {
          data = JSON.parse(data);
          showToast(data.status, data.msg);
          consultarClientes('');
        },
        error: function (error) {
          console.log(error);
        }
      });
    });
    hideOverLay()
  }
  editarCliente()

  function clientesInfos() {

    $.ajax({
      url: `${URL_VIEW}/components/clientes-infos.php`,
      method: "GET",

      success: function (data) {
        $(".clientes-info").hide().html(data).fadeIn('fast'); 
        $(".info-skeleton").hide();
      },
      error: function (error) {
        console.log(error)
      },

      complete: function () {

      }
    });
  }
  clientesInfos()


  function deletarCliente(dir = "", client_id) {

    let url;
    if (dir !== "") {
      url = dir;
    }
    else {
      url = URL_AJAX + "/clientes/deletaCliente.php"
    }

    $.ajax({
      url: url,
      method: "POST",
      data: {
        client_id: client_id
      },
      success: function (data) {
        console.log(data)
        data = JSON.parse(data);
        showToast(data.status, data.msg)
        consultarClientes('')
        clientesInfos();
      },
      error: function (xhr, status, error) {
        console.log(xhr, status, error);
      }
    });
  }


  function deletaClienteBox() {
    document.addEventListener('click', function (event) {
      if ($(event.target).hasClass('deleta-cliente')) {
        const cliente_id = $(event.target).data('delete-id');

        createDialogBox('Você tem certeza que deletar o cliente de ID <' + cliente_id + '>', 'Cancelar', 'Deletar Cliente', () => {
          const cliente_id = $(event.target).data('delete-id');
          deletarCliente(url = URL_AJAX + "/clientes/deletaCliente.php", cliente_id)
        })
      }
    })
  }
  deletaClienteBox()
  // $(document).on('show.bs.modal', '#', function (event) {
  //   var button = $(event.relatedTarget);
  //   var id = button.data('id');
  //   console.log(id);
  // });

  function clientesSelectAreaClientes() {
    $(document).on('show.bs.modal', '#selectClients', function (event) {
      $.ajax({
        url: `${URL_VIEW}/clientes/clientesSelectTable.php`,
        method: "GET",

        success: function (data) {
          $(".clientes-select-list").hide().html(data).fadeIn('fast'); 
        },
        error: function (error) {
          console.log(error)
        },

        complete: function () {

        }
      });

    })
  }

  clientesSelectAreaClientes()



  function obterIDsSelecionados() {
    // Encontrar todos os checkboxes com o atributo 'name' igual a 'cliente_checkbox[]'

    $(document).on('click', '#select-all-clients', function () {
      $('.marcartodos').not(this).prop('checked', this.checked);
   });

    const checkboxes = document.querySelectorAll('input[name="cliente_checkbox[]"]:checked');

    // Criar uma array para armazenar os IDs dos clientes selecionados
    const idsSelecionados = [];

    // Iterar sobre os checkboxes selecionados
    checkboxes.forEach((checkbox) => {
      // Extrair o ID do checkbox
      const idCliente = checkbox.value;

      // Adicionar o ID à array
      idsSelecionados.push(idCliente);
    });

    // Imprimir os IDs selecionados no console
    return idsSelecionados;

    // Aqui, você pode realizar outras ações com os IDs, se necessário
  }



  function deleteSelectedClients() {
    document.querySelector("#delete-selected-clients").addEventListener("click", () => {
      let ids = obterIDsSelecionados();

      $('#selectClients').modal('hide');
      $('.modal-backdrop').remove();
      createDialogBox('Você tem certeza que deletar os clientes de ID <' + ids.join(', ') + '>', 'Cancelar', 'Deletar Cliente', () => {
        if (ids.length > 0) {
          ids.forEach(e => {
            deletarCliente(URL_AJAX + "/clientes/deletaCliente.php", e)

          });
        }
        else {
        
            var toast = new bootstrap.Toast(meuToast);
          
            var toastBody = meuToast.querySelector('.toast-body');
            if (toastBody) {
              toastBody.textContent = 'Você precisa selecionar um cliente para fazer esta ação.';
            } else {
              console.error("Elemento '.toast-body' não encontrado.");
            }
          
            // Exiba o Toast
            toast.show();
         
          
        }
        

      })



    })
  }

  deleteSelectedClients();

  

  hideOverLay()

})


