function emailVerif() {

    $.ajax({
      url: "ajax/emailConf.php",
      method: "GET",
      success: function (data) {
        $(".area").html(data)
        $(".loading").hide()
        confirmaEmail()

      },
  
      error: function (err) {
        console.log(err)
      }
    })
  
  }
  emailVerif()


function confirmCode() {
    document.querySelector(".body-area").classList.add("d-none")
    document.querySelector(".code-confirm").classList.remove("d-none")
    
    $(".loading").show()
    $.ajax({
        url: "ajax/ConfirmarCodigo.php",
        method: "GET",
        success: function (data) {
          $(".area-confirm-code").html(data)
          $(".loading").hide()
          confirmaEmail()
  
        },
    
        error: function (err) {
          console.log(err)
        }
      })
    

}

function confirmaEmail() {
    $("#sent").on("click", (e) => {
        let email = $("#email").val()

        $.ajax({
            url: "ajax/sentCodeToEmail.php",
            method: "POST",
            data: { email : email } ,
            success: function (data) {
               if (data !== "") {
                confirmCode()
               }
            },
        
            error: function (err) {
              console.log(err)
            }
          })
    })
   
    
    }


