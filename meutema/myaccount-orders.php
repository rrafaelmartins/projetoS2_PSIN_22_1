<?php
// Template name: myaccount-orders
get_header();
do_action('call_header2');

?>


<?php
	$data = [];
?>


<pre>
<?php

$args = array(
    'post_type' => 'shop_order',
    'post_status' => 'all',
  );
  $my_query = new WP_Query($args);
  
  $orders = $my_query->posts;
?>
  
<div class="pedidos-account">	
	<h1>Pedido</h1>
	<h1>Data</h1>
	<h1>Status</h1>
</div>

<?php

  foreach($orders as $order){?>
	<div class="pedidos-account">
		<h1><?php echo $order->ID; ?></h1>
		<h1><?php echo $order->post_date; ?></h1>
		<h1><?php echo $order->post_status; ?></h1>
	</div>
	
	<?php
}
?>
</pre>

<?php get_footer(); ?>
