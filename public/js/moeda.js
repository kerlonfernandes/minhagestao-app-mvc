document.addEventListener("DOMContentLoaded", (event) => {
  let dataAtual = new Date()
  document.querySelector('#date-input').value = dataAtual
  // document.querySelector('#date-input2').value = dataAtual
  

});

function formatarNumero(numero) {
  // Usando o método toLocaleString para formatar o número
  return numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
}    

document.querySelector("#moeda").addEventListener("keyup", (e) => {

  let valor = e.target.value
    .replace(/[^\d,.]/g, "") // Remove tudo exceto dígitos, vírgulas e pontos
    .replace("R$", "")
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
    showPrice.textContent = `R$ ${formatarNumero(texto)}`;

  } else {
    document.querySelector("#cifrao").textContent = `R$`;
    showPrice.textContent = `0.00`;

  }

})


document.querySelector("#hoje-data").addEventListener("click", () => {


  let dataAtual = new Date()
  let dataFormatada = dataAtual.toISOString().slice(0, 10);
  document.querySelector('#date-input').value = dataFormatada

})
document.querySelector("#semana-passada").addEventListener("click", () => {


  let dataAtual = new Date()

  dataAtual.setDate(dataAtual.getDate() - 7);

  let dataMenos7Dias  = dataAtual.toISOString().slice(0, 10);
  document.querySelector('#date-input').value = dataMenos7Dias 

})
document.querySelector("#mes-passado").addEventListener("click", () => {


  let dataAtual = new Date()

  dataAtual.setMonth(dataAtual.getMonth() - 1);

  let mesPassado  = dataAtual.toISOString().slice(0, 10);
  document.querySelector('#date-input').value = mesPassado 

})

// MODAL 2 



// document.querySelector("#moeda2").addEventListener("keyup", (e) => {

// let valor = e.target.value
//   .replace(/[^\d,.]/g, "") // Remove tudo exceto dígitos, vírgulas e pontos
//   .replace(",", ".") // Substitui vírgulas por pontos
//   .replace("R$", "")
//   .replace(/\s|[\u00A0]/g, "")
//   .replace(/(\..*)\./g, '$1') // Remove pontos extras, deixando apenas um
//   .replace("R$", "")
//   .replace(/\s|[\u00A0]/g, "");



// let texto = valor.toLocaleString("pt-BR", {
//   style: "currency",
//   currency: "BRL"
// });

// document.querySelector("#moeda2").value = texto;
// let showPrice = document.querySelector("#price2")
// if (texto !== "") {
//   document.querySelector("#cifrao2").textContent = ``;
//   showPrice.textContent = `R$ ${texto}`;

// } else {
//   document.querySelector("#cifrao2").textContent = `R$`;
//   showPrice.textContent = `0.00`;

// }

// })


// document.querySelector("#hoje-data2").addEventListener("click", () => {


// let dataAtual = new Date()
// let dataFormatada = dataAtual.toISOString().slice(0, 10);
// document.querySelector('#date-input2').value = dataFormatada

// })
// document.querySelector("#semana-passada2").addEventListener("click", () => {


// let dataAtual = new Date()

// dataAtual.setDate(dataAtual.getDate() - 7);

// let dataMenos7Dias  = dataAtual.toISOString().slice(0, 10);
// document.querySelector('#date-input2').value = dataMenos7Dias 

// })
// document.querySelector("#mes-passado2").addEventListener("click", () => {


// let dataAtual = new Date()

// dataAtual.setMonth(dataAtual.getMonth() - 1);

// let mesPassado  = dataAtual.toISOString().slice(0, 10);
// document.querySelector('#date-input2').value = mesPassado 

// })



