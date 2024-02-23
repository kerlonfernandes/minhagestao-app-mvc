$(document).ready(function () {

      
    $("#cadastrar-btn").prop("disabled", true); // Inicialmente, desabilita o botão de cadastrar
    let email = "";
    let senha = "";
    let nome = "";

    $("#email, #senha, #nome, #confirma-senha").on("input", function () {
        email = $("#email").val();
        senha = $("#senha").val();
        nome = $("#nome").val();
        if (email !== "" && senha !== "" && nome !== "") {
            let confirmaSenha = $("#confirma-senha").val();
            let cadastrarBtn = $("#cadastrar-btn");

            if (email !== "" && senha !== "" && nome !== "" && senha === confirmaSenha) {
                cadastrarBtn.prop("disabled", false); // Habilita o botão de cadastrar

                $("#cadastrar-btn").on("click", function () {
                    
                    if(email !== "" && senha !== "" && nome !== "" && senha === confirmaSenha) {

                        let dados = {
                            email: email,
                            nome: nome,
                            senha: senha
                        };
                        document.querySelector("#loading").classList.remove("d-none")
                        $.ajax({
                            url: "ajax/cadastrar.php",
                            method: "POST",
                            data: dados,
                            success: function (data) {
                                document.querySelector("#loading").classList.add("d-none")
                                document.querySelector("#box-message").classList.remove("d-none")
    
                                window.location.href = "./"
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });

                    }
                    else {

                        console.log("Todos os campos precisam ser preenchidos!")

                    }
                    
                    
                });


            } else {

                cadastrarBtn.prop("disabled", true); // Desabilita o botão de cadastrar
            }

   


        }
        let cadastrarBtn = $("#cadastrar-btn");

        $("#confirma-senha").on("input", function () {
            if ($("#confirma-senha").val() !== "") {
                let senha = $("#senha").val();
                let confirm = $("#confirma-senha").val();
                if (senha !== confirm) {
                    $("#pass-msg-success").addClass('d-none');
                    $("#pass-msg").removeClass('d-none');
                } else {
                    $("#pass-msg").addClass('d-none');
                    $("#pass-msg-success").removeClass('d-none');
                    cadastrarBtn.prop("disabled", true); // Desabilita o botão de cadastrar

                }
            }
        });
    })
})



function validarEmail(email) {
    const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return regexEmail.test(email);
  }

function blockBtn() {

    $("#cadastrar-btn").prop("disabled", true); //


}

  
  $("#email").on('input', () => {
    let email = $("#email").val();
    let box_email = $("#box-email");
  
    if (validarEmail(email)) {
      // Primeiro, verifique se o email é válido no cliente
      $.ajax({
        url: "ajax/verifEmail.php",
        method: "GET",
        data: { email: email }, // Envie o e-mail como um objeto com a chave 'email'
        success: function (data) {
          box_email.html(data);
          console.log(data);
        },
        error: function (error) {
          console.log(error);
        }
      });
    } else {
      box_email.html("<span>Email inválido.</span>");
      $("#cadastrar-btn").prop("disabled", true); //

    }
  });
  