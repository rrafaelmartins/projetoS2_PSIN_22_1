<?php 

    function projeto_add_woocommerce_support(){
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme', 'projeto_add_woocommerce_support');

    function projeto_css(){
        wp_register_style('projeto-style', get_template_directory_uri() , '/style.css', [], '1.0.0', false);
        wp_enqueue_style('projeto-style');
    }

    add_action('wp_enqueue_scripts', 'projeto_css');

    function adicionar_antes_do_produto(){
        echo '<div class = "minha-classe">';
    }

    add_action('woocommerce_before_single_product_summary' , 'adicionar_antes_do_produto');

    function adicionar_depois_do_produto(){
        echo '</div>';
    }

    add_action('woocommerce_after_single_product_summary' , 'adicionar_depois_do_produto');

    add_filter( 'woocommerce_product_single_add_to_cart_text', 'adicionar-carrinho' ); 
    
    function woocommerce_custom_single_add_to_cart_text() {
        return __( 'Buy Now', 'woocommerce' ); 
    }

    add_filter( 'woocommerce_product_single_add_to_cart_text', 'adicionar-carrinho' ); 



    function format_products($products, $img_size = 'medium'){
        $product_final = [];
        
        foreach($products as $product){
            $product_final[] = [
                'name' => $product->get_name(),
                'price' => $product->get_price_html(),
                'link' => $product->get_permalink(),
                'id' => $product->get_id(),
                'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
            
            ];
        }
        return $product_final;
    }
    
    function product_list($products){ ?>
        <ul class="products-list">
            <?php foreach($products as $product){ ?>
                <li class="product-item">
                    <a href="<?=$product['link']; ?>">
                        <div class="product-info">
                            <img class="foto-prato" src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
                            <div class="name-price-add">
                                <h2><?= $product['name'];?></h2>
                                <div class="price-add">
                                    <h3><?= $product['price'];?></h3>
                                    <a href="/shop/?add-to-cart=<?= $product['id'];?>&quantity=1“">
                                        <h2><img src="<?php echo get_stylesheet_directory_uri() ?>/img/carrinho2.png"></h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php
    }
?>