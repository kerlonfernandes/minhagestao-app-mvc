function hideOverLay() {

  $("#overlay").fadeOut('slow', function () {
    $("#loader-container").hide();
    $("#custom-loader").hide();

  });



}

function showOverLay() {

  $("#overlay").show();

}


document.addEventListener("DOMContentLoaded", function () {



  $.ajax({
    url: "../views/admin/areaUsuarios.php",
    method: "GET",
    // data: { pessoa: nome },
    success: function (data) {
      $(".area-users").hide().html(data).fadeIn('fast');

      let inputUsuario = document.getElementById('pesquisar-usuario');
      inputUsuario.addEventListener('input', function () {
        var dado = this.value.trim();

        consultarUsuarios(dado);

      });
    },
    error: function (err) {

      console.log(err)

    },

    complete: function () {
      $("#loader").hide();
    }
  });


  function consultarUsuarios(dado) {
    $("#spinner-container");

    $("#loader").show();

    $.ajax({
      url: "../views/admin/users.php",
      method: "GET",
      data: {
        dado: dado,
      },
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

  // Atualizar resultados ao digitar

  consultarUsuarios('');



  hideOverLay()

})