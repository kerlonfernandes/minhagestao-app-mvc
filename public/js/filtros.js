function removeBreakTags(text) {
    return text.replace(/<br\s*\/?>/g, ''); // Substitui todas as ocorrências de <br> e <br /> com uma string vazia
}

function formatarNumero(numero) {
  // Usando o método toLocaleString para formatar o número
  return numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
}


// document.querySelector('#description').addEventListener('focus', (e) => {
//     let descricaoTextarea = e.target; // Use e.target para obter o elemento textarea

//     let descricao = descricaoTextarea.value;

//     let descricaoFiltrada = removeBreakTags(descricao);

//     descricaoTextarea.value = descricaoFiltrada;

// });

// // Formatando o valor inserido para exibir em formato de moeda
// const inputMoeda = document.getElementById("moeda");
// inputMoeda.addEventListener("input", formatarMoeda);

// function formatarMoeda() {
//   const valor = parseFloat(inputMoeda.value);
//   inputMoeda.value = valor.toLocaleString("pt-BR", {
//     style: "currency",
//     currency: "BRL",
//   });
// }


document.querySelector("#moeda").addEventListener("keyup", (e) => {

  let valor = e.target.value
    .replace(/[^\d,.]/g, "") // Remove tudo exceto dígitos, vírgulas e pontos
    .replace("R$", "")
    .replace(",", ".")
    .replace(/\s|[\u00A0]/g, "")
    .replace(/(\..*)\./g, '$1') // Remove pontos extras, deixando apenas um
    .replace("R$", "")
    .replace(/\s|[\u00A0]/g, "");



  let texto = valor.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL"
  });

  document.querySelector("#moeda").value = texto;
  let showPrice = document.querySelector("#price")
  if (texto !== "") {
    document.querySelector("#cifrao").textContent = ``;
    showPrice.textContent = `O valor é este mesmo ? R$ ${formatarNumero(texto)}`;

  } else {
    document.querySelector("#cifrao").textContent = `R$`;
    showPrice.textContent = `0.00`;

  }

})