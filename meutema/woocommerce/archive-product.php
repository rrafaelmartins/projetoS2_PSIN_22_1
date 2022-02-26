<?php
// Template name: Home
get_header();
?>

<?php
	$products = [];
	$data = [];
?>

<?php if(have_posts()) { while (have_posts()) { the_post(); 
    $products[] = wc_get_product(get_the_ID());
} } 

$data['products'] = format_products($products);

?>

<main class="lista-productsmain">
	<?php if($data['products']){ ?>
		<?php product_list($data['products']) ?>
	<?php } else { ?>
		<?php echo "<p>Nenhum produto encontrado</p>"; ?>
		<?php } ?>
</main>

<?php get_footer(); ?>