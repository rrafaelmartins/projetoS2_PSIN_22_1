<?php 

    function projeto_add_woocommerce_support(){
        add_theme_support('woocommerce');
        add_theme_support('menus');
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

    function format_products2($products, $img_size = 'medium'){
        $product_final_cart = [];
        
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

    function format_products($products, $img_size = 'medium'){
        $product_final_cart = [];
        
        foreach($products as $product){
            $product_final[] = [
                'name' => $product->get_name(),
                'price' => $product->get_price_html(),
                'link' => $product->get_permalink(),
                'id' => $product->get_id(),
                'slug' => $product->get_slug(),
                'description' => $product->get_short_description(),
                'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
            
            ];
        }
        return $product_final;
    }
    
    function product_list($products){ ?>
        <ul class="products-list">
            <?php foreach($products as $product){ ?>
                <li class="product-item">
                    <a class="link-productlist" href="<?=$product['link']; ?>">
                        <div style="background-image: url(<?= $product['img']; ?>); background-repeat: no-repeat, repeat;
                        background-position: center; background-size: cover; " class="product-info">
                            <div class="name-price-add">
                                <h2 class="letras" ><?= $product['name'];?></h2>
                                <div class="price-add">
                                    <h3 class="letras"><?= $product['price'];?></h3>
                                    <a href="./?add-to-cart=<?= $product['id'];?>&quantity=1“">
                                        <h2><img class="carrinho2" src="<?php echo get_stylesheet_directory_uri() ?>/img/carrinho2.png"></h2>
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

    function single_product_page($products){ ?>
            <?php foreach($products as $product){ ?>
                <div class="single_product_container">
                    <div class="single-productimage" style="background-image: url(<?= $product['img']; ?>); background-repeat: no-repeat, repeat;
                        background-position: center; background-size: cover; ">
                    </div>
                    <div class="single_product_container2">
                        <h1 class="single-productname"><?= $product['name'];?></h1>
                        <p class="single-productdesc"><?= $product['description'];?></p>
                        <div class="single_product_container3">
                            <p class="singleproductprice" ><?= $product['price'];?></p>
                            <a class="linksingleproductadd" href="./?add-to-cart=<?= $product['id'];?>&quantity=1“">ADICIONAR</a>
                        </div>
                    </div>                 
                </div>

            <?php } ?>
    <?php
    }

    

    function get_day(){
        $dayweek = date('w');
        if($dayweek == 0){
            return 'Domingo';
        }
        else if($dayweek == 1){
            return 'Segunda';
        }
        else if($dayweek == 2){
            return 'Terça';
        }
        else if($dayweek == 3){
            return 'Quarta';
        }
        else if($dayweek == 4){
            return 'Quinta';
        }
        else if($dayweek == 5){
            return 'Sexta';
        }
        else if($dayweek == 6){
            return 'Sabado';
        }

    };

    add_action( 'template_redirect', 'phpsof_remove_product_from_cart_programmatically' );
 
    function phpsof_remove_product_from_cart_programmatically($product_id) {
        if ( is_admin() ) return;
        $product_cart_id = WC()->cart->generate_cart_id( $product_id );
        $cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
        if ( $cart_item_key ) WC()->cart->remove_cart_item( $cart_item_key );
    }


    function header2(){
        wp_nav_menu([
            'menu' => 'header2',
            'container' => 'nav',
            'container_class' => 'header2',
        ]);
    };

    add_action('call_header2', 'header2');


function format_orders($orders){
        $final_orders = [];
        
        foreach($orders as $order){
            $final_orders[] = [
                'id' => $order->ID,
                'date' => $order->post_date,
                'status' => $order->post_status,
                'price' => $order->total,
            ];
            ?>
            
            <div class="pedidos">
                <?php echo $order->ID; ?>
                <?php echo $order->post_date; ?>
                <?php echo $order->post_status; ?>
                <?php echo $order->total; ?>
            </div>
            
            <?php
      }
  //    print_r($final_orders);
      return $final_orders;
  };








?>