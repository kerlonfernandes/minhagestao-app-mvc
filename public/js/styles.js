function showAlert() {
    var alertContainer = document.querySelector(".overlay");
    // alertContainer.style.display = "flex";
    alertContainer.innerHTML = ` 
        <div class="alert-box text-start" style="background-color:green; color:white;">Sucesso!</div>
`

}

function closeAlert() {
    var alertContainer = document.querySelector(".alert-box");
    alertContainer.innerHTML = ""
    alertContainer.style.opacity = "0"
}

function showAlertError() {
    var alertContainer = document.querySelector(".alert-box");
    // alertContainer.style.display = "flex";
    alertContainer.innerHTML = ` <div class="alert-error">
    <span class="icon">&#10006;</span>
    <p>Erro! Algo deu errado.</p>
</div>`

}

function closeAlertError() {
    var alertContainer = document.querySelector(".alert-box");
    alertContainer.innerHTML = ""
}

