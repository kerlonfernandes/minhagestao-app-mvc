function showSuccessMessage(msg = "Salvo com Sucesso!") {
    const overlay = document.getElementById("successOverlay");
    const message = document.getElementById("successMessage");

    message.textContent = msg;
    overlay.style.display = "block";

    setTimeout(() => {
        overlay.style.opacity = "0";
        setTimeout(() => {
            overlay.style.display = "none";
            overlay.style.opacity = "1";
        }, 1000); // Tempo de desvanecimento
    }, 3000); // Tempo que a mensagem é exibida (3 segundos)
}
