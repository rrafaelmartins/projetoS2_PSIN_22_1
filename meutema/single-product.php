<?php
// Template name: Home
get_header();
?>

<?php if(have_posts()) { while (have_posts()) { the_post(); 
    $products[] = wc_get_product(get_the_ID());
} } 

$data['products'] = format_products($products);

?>

<main class="lista-productsmain">
	<?php if($data['products']){ ?>
		<?php single_product_page($data['products']) ?>
	<?php } else { ?>
		<?php echo "<p>Nenhum produto encontrado</p>"; ?>
		<?php } ?>
</main>

<?php
    $terms = get_the_terms($product->ID, 'product_cat');
    foreach ($terms as $term) {
        $product_cat = $term->name;
            break;
    };
    
    $products_category = wc_get_products([
        'limit' => 6,
        'category' => $product_cat,
    ]);
    
    //do_action('pegar_dia');
    //print_r($products_week);

?>   


    <h1 class="maiscomidaaa">MAIS <?php echo $product_cat ?></h1>

  
<?php
    $data['products'] = format_products($products_category);
?>  

    
    
    <main class="lista-productsmain">
        <?php if($data['products']){ ?>
            <?php product_list($data['products']) ?>
        <?php } else { ?>
            <?php echo "<p>Nenhum produto encontrado</p>"; ?>
            <?php } ?>
    </main>

<?php get_footer(); ?>