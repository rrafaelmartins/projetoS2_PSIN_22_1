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
    global $woocommerce;
	$items = $woocommerce->cart->get_cart();
?>

<div id="abrir" class="modal">
    <a href="#fechar" class="fechar">X</a>
    <h1>CARRINHO</h1>
    <ul>
        <li class="lista-product-carrinho">
    	    <?php
               foreach($items as $item => $values) { 
                $_product =  wc_get_product( $values['data']->get_id() );
                //product image
                $getProductDetail = wc_get_product( $values['product_id'] );
                echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
    
                echo "<b>".$_product->get_title() .'</b>  <br> Quantity: '.$values['quantity'].'<br>'; 
                $price = get_post_meta($values['product_id'] , '_price', true);
                echo "  Price: ".$price."<br>";
                /*Regular Price and Sale Price*/
                echo "Regular Price: ".get_post_meta($values['product_id'] , '_regular_price', true)."<br>";
                echo "Sale Price: ".get_post_meta($values['product_id'] , '_sale_price', true)."<br>";
            }
            ?>
        </li>
    </ul>
    <h2>Total do Carrinho: <?=$cart2;?> </h2>
    <a href="/checkout">COMPRAR</a>
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
    
