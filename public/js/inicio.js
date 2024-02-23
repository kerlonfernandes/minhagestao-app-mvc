function hideOverLay() {

    $("#overlay").fadeOut('slow', function() {
      $("#loader-container").hide();
      $("#custom-loader").hide();
  
    });
  
  
  
  }

function AreaInicio() {

    $.ajax({
      url: `${URL_VIEW}/inicio/AreaInicio.php`,
      method: "GET",
      success: function (data) {
        $(".areas").hide().html(data).fadeIn('slow'); 

      },
      error: function () {
        $("#loader").show();
      },

      complete: function () {

      }
    });
  }

  AreaInicio()


hideOverLay()