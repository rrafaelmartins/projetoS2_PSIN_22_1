<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php bloginfo('name') ?> <?php the_title(); ?> </title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css">
    <?php wp_head(); ?>
</head>

<?php 
    $cart_count = WC()->cart->get_cart_contents_count();
    $cart2 = WC()->cart->get_total();
?>

<div id="abrir" class="modal">
    <a href="#fechar" class="fechar">X</a>
    <div>
        <h1 class="listacarrinho-box1">CARRINHO</h1>
    </div>
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
        <h2 class="listacarrinho-box2">Total do Carrinho: <?=$cart2;?></h2>
    </div>
    <div class="botao-comprar-carrinho-box"><a class="botao-comprar-carrinho" href="/checkout">COMPRAR</a></div>
</div>

<body <?php body_class(); ?>>

<header class="header_container">
    
    <div class="home-bloco1"><a href="/"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/comesbebes.png"></a>
        <form class="home-subloco1" action=" <?php bloginfo('url'); ?>/shop/" method= "get">
            <button type="submit" id="searchbutton" value="Buscar"><img class="img-lupinha" src="<?php echo get_stylesheet_directory_uri() ?>/img/lupinha.png" alt="botao buscar"></button>
            <input class="barra-busca-home" type="text" name="s" id="s" placeholder="Sashimi" value = "<?php the_search_query(); ?>">
            <input type="text" name="post_type"  value="product" class="hidden">
        </form>
    </div>

    <div class="home-bloco2">
        <a class="linkheader" href="/shop">
            <h1 class="faca_pedido">Faça um pedido</h1>
        </a>
        <a href="#abrir"><img class="img-carrinho" src="<?php echo get_stylesheet_directory_uri() ?>/img/carrinho.png" alt="meu carrinho"></a>
        <a href="/my-account"><img class="img-conta" src="<?php echo get_stylesheet_directory_uri() ?>/img/conta.png" alt="minha conta"></a>
        <?php if($cart_count){ ?>
            <span class="carrinho_count"> <?=$cart_count;?></span>
            <?php } ?>
    </div>
    
</header>
    
