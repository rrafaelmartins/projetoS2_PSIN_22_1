<?php
// Template name: Shop
get_header();
?>

<h1 class="selecione-cat">SELECIONA UMA CATEGORIA:</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SHOP']) ?>" method="post">
    <select name="prato_selecionado" id="prato_selecionado" multiple>
        <option value="Todos os pratos" selected>Todos</option>
        <option value="Comida Nordestina">Comida Nordestina</option>
        <option value="Comida Japonesa">Comida Japonesa</option>
        <option value="Comida Vegana">Comida Vegana</option>
        <option value="Massas">Massas</option>
    </select>
    <div>
        <button class="buttonselectcat" type="submit">CONFIRMAR</button>
    </div>
</form>


<?php

$prato_selecionado = filter_input(INPUT_POST, 'prato_selecionado', FILTER_SANITIZE_STRING);

?>

<h1 class="selecione-cat">PRATOS</h1>
<h2 style="text-transform: uppercase; font-weight: bolder; padding-top:10px; font-size: 1.1em;"><?php echo $prato_selecionado ?></h2>



<?php
    
    
    $products_week = wc_get_products([
        'limit' => 12,
        'category' => $prato_selecionado,
    ]);
    
    
    $data['products'] = format_products($products_week);
    
    ?>
    
    
    <main class="lista-productsmain">
        <?php if($data['products']){ ?>
            <?php product_list($data['products'])?>
        <?php } else { ?>
            <?php echo "<p>Nenhum produto encontrado</p>"; ?>
        <?php } ?>
    </main>



<?php get_footer(); ?>