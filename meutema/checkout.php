<?php
// Template name: Checkout
get_header();
$cart2 = WC()->cart->get_total();



function create_vip_order(){
  
  global $woocommerce;

  $address = array(
      'first_name' => $_GET['first_name'],
      'last_name'  => $_GET['last_name'],
      'email'      => $_GET['email'],
      'phone'      => $_GET['phone'],
      'address_1'  => $_GET['address_1'],
      'address_2'  => $_GET['address_2'],
      'city'       => $_GET['city'],
      'postcode'   => $_GET['postcode'],
  );

  // Now we create the order
  $order = wc_create_order();

  // The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
  $order->add_product( get_product(WC()->cart->get_cart_contents()), count(WC()->cart->get_cart())); // This is an existing SIMPLE product
  $order->set_address( $address, 'billing' );
  //
  $order->calculate_totals();
  $order->update_status("Completed", 'Imported order', TRUE);  
}


add_action('woocommerce_checkout_process', 'create_vip_order');






?>

<form action="<?php echo $_SERVER['PHP_CHECKOUT'];?>">
    <div class="coisas">
     <div class="infos">
      <h1 class="confirmacaopedido">CONFIRMAÇÃO DO PEDIDO</h1>
      <h1 class="informacoes_entrega">INFORMAÇÕES PARA ENTREGA</h1>
    
      <div class="email">
        <h2>Email para contato</h2>
        <input id="email" name="email" type="text" placeholder="Digite seu Email">
        </form>
      </div>
      <div class="nome-sobrenome">
        <div>
          <h2>Nome</h2>
          <input id="first_name" name="first_name" type="text" placeholder="Digite seu nome">
        </div>
        <div>
          <h2>Sobrenome</h2>
          <input id="last_name" name="last_name" type="text" placeholder="Digite seu sobrenome">
        </div>
        </form>
      </div>
      <div class="fixo-cel">
        <div>
          <h2>Telefone Fixo</h2>
          <input id="fixo" name="fixo" type="text" placeholder="(21) XXXX-XXXX">
        </div>
        <div>
          <h2>Celular</h2>
          <input id="phone" name="phone" type="text" placeholder="(21) XXXXX-XXXX">
        </div>
        </form>
      </div>
      <div class="cep">
        <h2>CEP</h2>
        <form action="">
        <input id="postcode" name="postcode" type="text" placeholder="XXXXX-XXX">
        </form>
      </div>
      <div class="logradouro">
        <h2>Logradouro</h2>
        <form action="">
        <input id="address_1" name="address_1" type="text" placeholder="Rua Lorem Ipsum, 150">
        </form>
      </div>
      <div class="complemento">
        <h2>Complemento</h2>
        <form action="">
        <input id="address_2" name="address_2" type="text" placeholder="Bl2, Apto 905">
        </form>
      </div>
      <div class="bairro-cidade">
        <div>
          <h2>Bairro</h2>
          <input id="bairro" name="bairro" type="text" placeholder="Lorem Ipsum">
        </div>
        <div>
          <h2>Cidade</h2>
          <input id="city" name="city" type="text" placeholder="Lorem Ipsum">
        </div>
        </form>
      </div>
      <div class="info-pagamento">
        <h1 class="informacoes_pagamento">INFORMAÇÕES DE PAGAMENTO</h1>
        <h2>Forma de pagamento</h2>
        <div class="forma-de-pagamento">
            <a href="#fechar2">
                <div class="pagar-na-entrega">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/carrinho-com-nitro.png">
                    <div>
                        <h1>Dinheiro</h1>
                        <p>Na entrega</p>
                    </div>
                </div>
            </a>
            <a href="#abrir2">
                <div class="pagar-na-entrega2">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/img/cartao.png">
                    <div>
                        <h1>Cartão</h1>
                    </div>
                </div>
            </a>
        </div>
        <div id="abrir2" class="infocartao">
          <div class="numero-do-cartao">
            <h2>Número do cartão</h2>
            <input type="text" placeholder="1111.1111.1111.1111">
          </div>
          <div>
            <div>
              <h2>Validade do cartão</h2>
              <input type="text" placeholder="12/20/2000">
            </div>
            <div>
              <h2>CVV</h2>
              <input type="text" placeholder="123">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pedidos">
      <ul>
            <li class="lista-product-carrinho">
              <?php
                  foreach ( WC()->cart->get_cart() as $cart_item ) { ?>
                        <div class="lista-produtos-carrinho">
                            <?php echo $imagem = $cart_item['data']->get_image(); ?>
                            <div class="texto-carrinho-produto">
                                <?php echo $item_name = $cart_item['data']->get_title(); ?>
                                <br>
                              <?php echo $quantity = $cart_item['quantity']; ?>
    
                            </div>
                            <div><?php echo $price = $cart_item['data']->get_price_html(); ?></div>
    
                        </div>
                <?php } ?>
            </li>
        </ul>
        <div>
            <h2 class="listacarrinho-box2">Total: <?=$cart2;?></h2>
        </div>
        <div class="botaocomprarcheckout">
          <a onclick="<?php do_action('woocommerce_checkout_process'); ?>">COMPRAR</a>
        </div>
    </div>
  </div>
</form>

<?php get_footer(); 

?>


        <div id="abrir2" class="infocartao">
          <div class="numero-do-cartao">
            <h2>Número do cartão</h2>
            <input type="text" placeholder="1111.1111.1111.1111">
          </div>
          <div>
            <div>
              <h2>Validade do cartão</h2>
              <input type="text" placeholder="12/20/2000">
            </div>
            <div>
              <h2>CVV</h2>
              <input type="text" placeholder="123">
            </div>
          </div>
        </div>


