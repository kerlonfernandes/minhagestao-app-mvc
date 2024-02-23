$(document).ready(function () {

function hideOverLay() {

    $("#overlay").hide();
    $("#loader-container").hide();
    $("#custom-loader").hide();

}

function showOverLay() {

    $("#overlay").show();

}

function showProfile() {
    
    showOverLay()

    $.ajax({
        url: "ajax/consultaUsuario.php",
        method: "GET",
        success: function (data) {
            $("#perfil").html(data);
            hideOverLay()
        },
        error: function () {
           
        },

        // complete: function () {
        //     
        // }
    });

}

showProfile()

})