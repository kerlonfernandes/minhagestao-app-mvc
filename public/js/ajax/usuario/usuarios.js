$(document).ready(function() {
    function consultarUsuario(nome) {
        // Carregar o spinner no container
        $("#spinner-container");

        $("#loader").show();

        $.ajax({
            url: "ajax/consulta-usuarios.php",
            method: "GET",
            data: { usuario: nome },
            success: function(data) {
                $(".resultados").html(data);
            },
            error: function(){
                $("#loader").show();
            },

            complete: function() {
                $("#loader").hide();
            }
        });
    }

    // Carregar os resultados iniciais
    consultarUsuario('');

    $("#pesquisar-usuario").on("input", function() {
        let nome = $(this).val();
        consultarUsuario(nome);
    });
});

console.log("osalkdksa")