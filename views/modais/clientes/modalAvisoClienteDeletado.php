<div class="modal fade" id="avisoModal" tabindex="-1" aria-labelledby="avisoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header alert alert-danger" style="border-radius:1px;">
        <h2 class="modal-title" id="avisoModalLabel">Aviso</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body alert alert-danger m-3">
        <h3>O cliente foi deletado. Deseja retornar aos clientes?</h3>
        <div class="alert alert-danger h4" style="border:none;" role="alert">Saiba que as mudanças aqui a partir de agora não serão aplicadas</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn alert alert-danger" data-bs-dismiss="modal">Manter-se na Página</button>
        <a type="button" href="<?= SITE ?>/clientes" class="btn alert alert-primary">Retornar aos Clientes</a>
      </div>
    </div>
  </div>
</div>