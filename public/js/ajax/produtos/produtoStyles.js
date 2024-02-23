document.addEventListener("DOMContentLoaded", () => {
    function formatarNumero(numero) {
        // Usando o método toLocaleString para formatar o número
        return numero.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
    }
    if(document.querySelector('#preco')) {
        let precoElement = document.querySelector("#preco");
        let precoTexto = precoElement.textContent; // Obtém o texto dentro do elemento
        let preco = parseFloat(precoTexto); // Converte para número (caso ainda não seja)
        let precoFormatado = formatarNumero(preco);
    
        // Atualizar o texto dentro do elemento com o valor formatado
        precoElement.textContent = precoFormatado;
    
    }

        if(document.getElementById("descricao-curta")) {
            const descricaoCurta = document.getElementById("descricao-curta");
            const descricaoCompleta = document.getElementById("descricao-completa");
            const lerMais = document.getElementById("ler-mais");
    
            if (descricaoCompleta.innerHTML.trim() !== "") {
                lerMais.style.display = "inline"; // Mostrar o botão "Ler mais" se houver descrição completa
    
                lerMais.addEventListener("click", function() {
                    descricaoCurta.style.display = "none";
                    descricaoCompleta.style.display = "inline";
                    lerMais.style.display = "none";
       
                })
            
            };
        }
       
    })
