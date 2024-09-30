document.querySelector("#entrar-btn").addEventListener("click", () => {
  let email = document.querySelector("#email-input").value;
  let senha = document.querySelector("#password-input").value;

  if (email === "" && senha !== "") {
    document.querySelector(".status-login").innerHTML =
      `<div class="alert alert-danger" role="alert">
        <strong>Você precisa preecher o campo de login</strong> <i class="fa-solid fa-lock"></i>
      </div>`;
  } else if (email !== "" && senha === "") {
    document.querySelector(".status-login").innerHTML =
      `<div class="alert alert-danger" role="alert">
        <strong>Você precisa preecher o campo de senha!</strong> <i class="fa-solid fa-lock"></i>
      </div>`;
  } else if (email === "" && senha !== "") {
    document.querySelector(".status-login").innerHTML =
      `<div class="alert alert-danger" role="alert">
        <strong>Você precisa preecher os campos de login</strong> <i class="fa-solid fa-lock"></i>
      </div>`;
  } else if (email === "" && senha === "") {
    document.querySelector(".status-login").innerHTML =
      `<div class="alert alert-danger" role="alert">
        <strong>Você precisa preecher os campos para logar!</strong> <i class="fa-solid fa-lock"></i>
      </div>`;
  } else {
    let login = {
      login: email,
      senha: senha,
    };
    document.querySelector(".status-login").innerHTML =
      `<div class="verificando">
                        <div class="alert alert-primary mt-4" role="alert">
                            <span>Estamos verificando seus dados... </span>
                            <div class="d-flex align-items-center">
                                <div class="spinner-border ms-auto" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>`;
    $.ajax({
      url: "ajax/logar.php",
      method: "POST",
      data: login,
      success: function (data) {
        console.log(data);
        if (data.error) {
          document.querySelector(".status-login").innerHTML =
            `<div class="alert alert-danger" role="alert">
                    Senha ou login incorretos!
                  </div>
                  `;
        } else {
          document.querySelector(".status-login").innerHTML =
            `<div class="alert alert-success" role="alert">
                    <strong>Logado com sucesso!</strong> <i class="fa-solid fa-lock-open"></i> Estamos te redirecinando...
                    <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
                  </div>`;

          window.location.href = "./";
        }
      },
      error: function (xhr, status, error, data) {
        document.querySelector(".status-login").innerHTML =
          `<div class="alert alert-danger" role="alert">
                    <strong>Senha ou login incorretos!</strong> <i class="fa-solid fa-lock"></i>
                  </div>
                  `;
        document.querySelector("#password-input").value = "";
        console.log(data);
      },
    });
  }
});

if (document.getElementById("entrar-btn")) {
  document.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      document.getElementById("entrar-btn").click();
    }
  });
}
