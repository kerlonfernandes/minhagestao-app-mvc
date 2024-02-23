$(document).ready(function() {
    function pesquisarHorario(pesquisa) {
        // Carregar o spinner no container
        $("#spinner-container");

        $("#loader").show();

        $.ajax({
            url: "ajax/agenda-consulta.php",
            method: "GET",
            data: { pesquisa: pesquisa },
            success: function(data) {
                $("#content").html(data);
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
    pesquisarHorario('');

    $("#pesquisar-horario").on("input", function() {
        let pesquisa = $(this).val();
        pesquisarHorario(pesquisa);
    });
});
