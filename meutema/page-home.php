<?php 
//Template name: Homes
get_header(); ?>


<section class="cabecalho">
    <div class="titulo">
        <h1>Comes & Bebes</h1>
    </div>
    <div class="subtitulo">
        <h2>O restaurante para todas as fomes</h2>
    </div>
</section>

<div class="container2">
    <div class="conheca">
        <h1 class="nossa-loja">CONHEÇA NOSSA LOJA</h1>
    </div>
    
    <div class="tipos">
        <h2 style="font-weight: bolder;">Tipos de pratos principais</h2>
    </div>

    <ul class="home-categorias-top">
        <li>
            <a href="/product-category/comida-nordestina/">
                <div class="imagems-home-categoria"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/nordestina.jpg"></div>
            </a>
            <h1 class="nomes-home-categoria" >NORDESTINA</h1>
        </li>

        <li>
            <a href="/product-category/comida-vegana/">
                <div class="imagems-home-categoria"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/vegano.jpg"></div>
            </a>
            <h1 class="nomes-home-categoria">VEGANA</h1>
        </li>

        <li>
            <a href="/product-category/massas/">
                <div class="imagems-home-categoria"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/massas.jpeg"></div>
            </a>
            <h1 class="nomes-home-categoria">MASSAS</h1>
        </li>

        <li>
            <a href="/product-category/comida-japonesa/">
                <div class="imagems-home-categoria"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/japonesa.jpg"></div>
            </a>
            <h1 class="nomes-home-categoria">JAPONESA</h1>
        </li>
    </ul>

    <div class = "pratos-dia">
        <h2>Pratos do dia de hoje:</h2>
        <h3 id = "dia"><?php $dia = get_day(); echo $dia ?></h3>
    </div>
    
    <?php
    
    //echo date('w');
    
    $dia = get_day();
    
    $products_week = wc_get_products([
        'limit' => 4,
        'tag' => $dia,
    ]);
    
    //do_action('pegar_dia');
    //print_r($products_week);
    
    $data['products'] = format_products($products_week);
    
    ?>
    
    
    <main class="lista-productsmain">
        <?php if($data['products']){ ?>
            <?php product_list($data['products']) ?>
        <?php } else { ?>
            <?php echo "<p>Nenhum produto encontrado</p>"; ?>
            <?php } ?>
    </main>
  
</div>


    <a class="linkheader" href="/shop/">
        <p class="maisop">Veja outras opções</p>
    </a>


<div class="footer2">
    <div id="div-visite">
        <h2 class="visite">VISITE NOSSA LOJA FÍSICA</h2>
    </div>
    <div class="sub-footer">
        <ul class="mapa-end">
            <li class="mapaendli"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.1884422319245!2d-43.13544708548486!3d-22.906419285012078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99817e444e692b%3A0xfd5e35fb577af2f5!2sUFF%20-%20Instituto%20de%20Computa%C3%A7%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1645993890121!5m2!1spt-BR!2sbr" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></li>
            <li class="mapaendli"> <img  src="<?php echo get_stylesheet_directory_uri() ?>/img/telefone.png"><?php $store_address = get_option( 'woocommerce_store_address' ); echo $store_address ?></li>
            <li class="mapaendli"> <img  src="<?php echo get_stylesheet_directory_uri() ?>/img/garfo-colher.png"> (21) 2569-6969</li>
        </ul>
        <div>
            <?php if(have_posts()) { while (have_posts()) { the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <main><?php the_content(); ?></main>
                <?php } } ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
