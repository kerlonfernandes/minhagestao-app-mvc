<style>
  
</style>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Relatorio | Critérios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="d-inline-flex gap-1">
          <div class="container">
            <div id="checkboxes">
              <div class="row">
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'id_usuario')"> ID Usuário
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'nome')"> Nome
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'cpf')"> CPF
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'endereco')"> Endereço
                    <span></span>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'email')"> Email
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'telefone')"> Telefone
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'cep')"> CEP
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'logadouro')"> Logadouro
                    <span></span>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'bairro')"> Bairro
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'localidade')"> Localidade
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'uf')"> UF
                    <span></span>
                  </label>
                </div>
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'hora')"> Hora de cadastro
                    <span></span>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label class="checkbox-label">
                    <input type="checkbox" onclick="toggleItem(this, 'data_cadastro')"> Data de cadastro
                    <span></span>
                  </label>
                </div>
                <!-- <div class="col-md-3">
                <label class="checkbox-label">
                    <input type="checkbox" id="selectAll" onclick="toggleAllCheckboxes()"> Selecionar todos
                    <span></span>
                  </label>
                </div> -->
              </div>
            </div>
          </div>

          <ul class="selected-values" id="selectedValues"></ul>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <a href="<?= SITE ?>/clientes/relatorio?" type="button" class="btn btn-primary concluir">Concluir</a>
      </div>
    </div>
  </div>
</div>

<script>

//     document.addEventListener('DOMContentLoaded', function() {
//     document.getElementById('adicionarCheckbox').addEventListener('click', function() {
//         // Encontrar todas as linhas da tabela com a classe 'resultados'
//         let linhasTabela = document.querySelectorAll('.resultados');

//         // Iterar sobre cada linha da tabela
//         linhasTabela.forEach(function(linha) {
//             // Verificar se a linha possui células
//             if (linha && linha.cells && linha.cells.length > 0 && !linha.cells[0].querySelector('.checkbox-adicional')) {
//                 // Criar um elemento 'input' do tipo 'checkbox'
//                 let checkbox = document.createElement('input');
//                 checkbox.type = 'checkbox';

//                 // Adicionar a classe 'checkbox-adicional' para distinguir os checkboxes adicionados
//                 checkbox.classList.add('checkbox-adicional');

//                 // Criar uma célula (td) para conter o checkbox
//                 let celulaCheckbox = document.createElement('td');
//                 celulaCheckbox.appendChild(checkbox);

//                 // Adicionar a célula do checkbox à primeira célula da linha
//                 linha.insertBefore(celulaCheckbox, linha.cells[0]);
//             }
//         });
//     });
// });


// 

// document.addEventListener('DOMContentLoaded', function() {
//     let idsSelecionados = []; // Lista para armazenar os IDs selecionados

//     document.getElementById('adicionarCheckbox').addEventListener('click', function() {
//         let linhasTabela = document.querySelectorAll('.resultados');

//         linhasTabela.forEach(function(linha) {
//             let checkbox = linha.querySelector('.checkbox-adicional');
//             checkbox.addEventListener('change', function() {
//                 let idLinha = linha.querySelector('[id^="id_"]').innerText;
//                 if (this.checked) {
//                     idsSelecionados.push(idLinha); // Adiciona o ID selecionado à lista
//                 } else {
//                     let index = idsSelecionados.indexOf(idLinha);
//                     if (index !== -1) {
//                         idsSelecionados.splice(index, 1); // Remove o ID desmarcado da lista
//                     }
//                     linha.style.display = 'none'; // Oculta a linha da tabela ao desmarcar o checkbox
//                 }
//             });
//         });
//     });

//     document.getElementById('mostrarIds').addEventListener('click', function() {
//         // Exibe os IDs presentes na lista
//         alert('IDs selecionados: ' + idsSelecionados.join(', '));
//     });

//     document.getElementById('cancelarSelecao').addEventListener('click', function() {
//         // Cancela a seleção removendo todos os checkboxes marcados
//         let checkboxes = document.querySelectorAll('.checkbox-adicional');
//         checkboxes.forEach(function(checkbox) {
//             checkbox.checked = false;
//         });
//         idsSelecionados = []; // Limpa a lista de IDs selecionados
//         let linhasTabela = document.querySelectorAll('.resultados');
//         linhasTabela.forEach(function(linha) {
//             linha.style.display = ''; // Exibe todas as linhas ocultas
//         });
//     });

//     document.getElementById('fecharCheckboxes').addEventListener('click', function() {
//         let checkboxes = document.querySelectorAll('.checkbox-adicional');
//         checkboxes.forEach(function(checkbox) {
//             checkbox.style.display = 'none'; // Oculta a checkbox
//         });
//     });

//     document.getElementById('mostrarCheckboxes').addEventListener('click', function() {
//         let checkboxes = document.querySelectorAll('.checkbox-adicional');
//         checkboxes.forEach(function(checkbox) {
//             checkbox.style.display = 'block'; // Mostra as checkboxes novamente
//         });
//     });
// });



// 


 document.addEventListener('DOMContentLoaded', function () {
    var concluirBtn = document.querySelector('.concluir');
    concluirBtn.addEventListener('click', imprimirLista);
  });

  function toggleItem(checkbox, value) {
  var selectedValuesList = document.getElementById("selectedValues");
  var isChecked = checkbox.checked;

  // Obter o link
  var link = document.querySelector('a.btn-primary');

  // Pegar o href do link
  var linkHref = link.getAttribute('href');

  if (isChecked) {
    if (!isAlreadyAdded(selectedValuesList, value)) {
      var listItem = document.createElement("li");
      listItem.textContent = value;
      selectedValuesList.appendChild(listItem);

      // Adicionar um novo parâmetro ao href
      linkHref += encodeURIComponent(value) + '=true&';
    }
  } else {
    removeItem(selectedValuesList, value);

    // Remover o parâmetro do href e também o caractere '&' se estiver presente
    var paramToRemove = encodeURIComponent(value) + '=true';
    if (linkHref.includes(paramToRemove)) {
      linkHref = linkHref.replace(paramToRemove, '');

      // Verificar e remover '&' se necessário
      if (linkHref.endsWith('&')) {
        linkHref = linkHref.slice(0, -1); // Remove o último caractere (o '&')
      }
    }
  }

  // Definir o novo href no link
  link.setAttribute('href', linkHref);
}



  function isAlreadyAdded(list, text) {
    var listItems = list.querySelectorAll('li');
    for (var i = 0; i < listItems.length; i++) {
      if (listItems[i].textContent === text) {
        return true;
      }
    }
    return false;
  }

  function removeItem(list, text) {
    var listItems = list.querySelectorAll('li');
    for (var i = 0; i < listItems.length; i++) {
      if (listItems[i].textContent === text) {
        listItems[i].remove();
        break;
      }
    }
  }

  function imprimirLista() {
    var selectedValuesList = document.getElementById("selectedValues");
    var items = selectedValuesList.querySelectorAll('li');
    var lista = [];
    items.forEach(function(item) {
      lista.push(item.textContent);
    });


  }
    // let dados = JSON.stringify(lista); 

  //   $.ajax({
  //       url: "./ajax/clientes/relatorioClientes.php",
  //       method: "POST",
  //       data: dados,
  //       success: function (data) {
          
  //         console.log(data)
  //       },
  //       error: function (error) {
  //         console.log(error);
  //       }
  //     });

  //   console.log(lista);
  // }

  function toggleAllCheckboxes() {
    lista.push([
  "data_cadastro",
  "bairro",
  "email",
  "id_usuario",
  "nome",
  "telefone",
  "localidade",
  "uf",
  "cep",
  "cpf",
  "endereco",
  "logadouro",
  "hora"
])
console.log(lista)
  }
</script>