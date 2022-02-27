<?php 
//Template name: Homes
get_header(); ?>

<?php if(have_posts()) { while (have_posts()) { the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <main><?php the_content(); ?></main>
<?php } } ?>

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
    
</div>



<?php get_footer(); ?>