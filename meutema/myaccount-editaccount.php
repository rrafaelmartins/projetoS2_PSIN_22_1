<?php
// Template name: myaccount-editaccount
get_header();

do_action('call_header2');

$usuario = WC()->customer->get_username();
?>



<form action="<?php echo $_SERVER['PHP_MYACCOUNT-EDITACCOUNT'];?>">
  <div class="minhacontacss">
      <h1 class="textotexto">Olá, <?php echo $usuario; ?> (não é <?php echo $usuario; ?>? Sair)</h1>
      <h1 class="textotexto">A partir do painel de controle de sua conta, você pode ver suas compras recentes,
        gerenciar seus endereços de entrega e faturamento, e editar sua senha e detalhes da conta.</h1>
    
        <div class="nome-sobrenome">
            <div>
              <h2>Nome</h2>
              <input type="text" placeholder="Digite seu nome">
            </div>
            <div>
              <h2>Sobrenome</h2>
              <input type="text" placeholder="Digite seu sobrenome">
            </div>
            </form>
          </div>
        <div class="email">
            <h2>Email para contato</h2>
            <input type="text" placeholder="Digite seu Email">
            </form>
        </div>
        <div class="senha-atual">
            <h2>Senha atual (deixe em branco para não alterar)</h2>
            <input type="text" placeholder="Digite sua senha atual">
        </div>
        <div class="senha-nova">
            <h2>Nova senha (deixe em branco para não alterar)</h2>
            <input type="text" placeholder="Digite sua nova senha">
        </div>
        <div class="confirmar-senha-nova">
            <h2>Confirmar nova senha</h2>
            <input type="text" placeholder="Confirme sua nova senha">
        </div>
        <div class="salvaralteraodiv"><button type="submit" class="salvaralterao">SALVAR ALTERAÇÕES</button></div>
  </div>
</form>



<?php get_footer(); ?>