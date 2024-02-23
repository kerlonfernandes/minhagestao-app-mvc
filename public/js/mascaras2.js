$(document).ready(function () {

   $(document).on('keyup', '.upercase', function () {
      this.value = this.value.toUpperCase();
   });
   $(document).on('keyup', '.relogio', function () {
      $(this).mask('00:00:00');
   });
   $(document).on('keyup', '.kms', function () {
      $(this).mask('000.0', {reverse: true});
   });
   $(document).on('keyup', '.lowercase', function () {
      this.value = this.value.toLowerCase();
   });
   $(document).on('keyup', '.celular', function () {
      $(this).mask('00 00000-0000');
   });
   $(document).on('keyup', '.moeda', function () {
      $(this).mask('000.000.000.000.000,00', {reverse: true});
   });
   $(document).on('keyup', '.cpf', function () {
      $(this).mask('000.000.000-00');
   });
   $(document).on('keyup', '.celular', function () {
      $(this).mask('00 00000-0000')
   });
   $(document).on('keyup', '.cnpj', function () {
      $(this).mask('99.999.999/9999-99');
   });
   $(document).on('keyup', '.cep', function () {
      $(this).mask('00000-000');
   });


   $(document).on('keypress', '.cpfcnpj', function (cpfcnpj, e, field, options) {
      var cpfcnpj = $(this).val();
      const masks = ['000.000.000-000', '00.000.000/0000-00'];
      const mask = (cpfcnpj.length >= 14) ? masks[1] : masks[0];
      $(this).mask(mask, options);
   });

});

