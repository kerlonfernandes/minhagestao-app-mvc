function formatarTelefone(input) {
    const telefoneNumerico = input.value.replace(/\D/g, '');
    input.value = telefoneNumerico;

    const telefoneRegex = /^(\d{2})(\d{1})(\d{4})(\d{4})$/;

    if (telefoneRegex.test(telefoneNumerico)) {
        const telefoneFormatado = telefoneNumerico.replace(telefoneRegex, "$1 $2 $3-$4");
        input.value = telefoneFormatado;
        input.setCustomValidity("");
    } else {
        input.setCustomValidity("O telefone deve estar no formato 27 99824-8692");
    }
}

