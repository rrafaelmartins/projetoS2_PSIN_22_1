
<?php 
//Template name: Homes
get_header(); ?>

<?php if(have_posts()) { while (have_posts()) { the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <main><?php the_content(); ?></main>
<?php } } ?>

<div class="conheca">
    <h1 class="nossa-loja">CONHEÇA NOSSA LOJA</h1>
</div>


<?php get_footer(); ?>
