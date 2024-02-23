document.addEventListener("DOMContentLoaded", function () {


    function escolhaFormaPagamento() {

        $.ajax({
            url: "../views/pending/escolhaForma.php",
            method: "GET",

            success: function (data) {
                $("#overlay").fadeOut('slow', function() {});

                $(".escolha-forma").hide().html(data).fadeIn('slow');                // $(".info-skeleton").hide();
                $(".loader-op").fadeOut('slow', function() {});
                
                if(".metodo-pix") {
                    metodoPix()
                }
                else if(".metodo-cartao") {
                    console.log('cartao')
                }
                
            },
            error: function (error) {
                console.log(error)
            },

            complete: function () {

            }
        });
    }
    escolhaFormaPagamento();

    function metodoPix() {

        $.ajax({
            url: "../views/pending/metodoPix.php",
            method: "GET",

            success: function (data) {
                $("#overlay").fadeOut('slow', function() {});
                $(".metodo-pix").html(data).fadeIn('slow');    
                
            },
            error: function (error) {
                console.log(error)
            },

            complete: function () {

            }
        });

    }

})