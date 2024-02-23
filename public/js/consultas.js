// function consultarCEP(cep) {
//     cep = cep.replace(/\D/g, '');

//     if (cep.length !== 8) {
//         console.log('CEP inválido');
//         return;
//     }


//     const url = `https://viacep.com.br/ws/${cep}/json/`;

//     $.ajax({
//         url: url,
//         method: 'GET',
//         success: function(data) {
//             if (!data.erro) {
//                 $("#logadouro").val(data.logradouro)
//                 $("#bairro").val(data.bairro)
//                 $("#localidade").val(data.localidade)
//                 $("#uf").val(data.uf)
//                 $("#logadouro").val(data.logradouro)
//                 document.querySelector(".cep-not-found").classList.add("d-none")


//             } else {
//                 document.querySelector(".cep-not-found").classList.remove("d-none")
//             }
//         },
//         error: function(err) {
//             console.log('Erro na consulta do CEP:', err);
//         }
//     });
// }

// $("#cep").on("input", () => {

//     let cep = $("#cep").val()
//     consultarCEP(cep);

// })

// const documentoInput = document.getElementById('cpf');

// documentoInput.addEventListener('input', formatarDocumento);

// function formatarDocumento() {
//     let valor = documentoInput.value.replace(/\D/g, '');

//     if (valor.length <= 11) {

//         valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
//     } else {
//         valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
//     }

//     documentoInput.value = valor;
// }