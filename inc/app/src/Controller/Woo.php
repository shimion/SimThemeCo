<?php 
namespace ST\Controller;
use \ST\Base\Post;

class Woo
{
    protected $currency = '$';
    protected $price = false;
    protected $sale = false;
    protected $add_to_cart = 'add-to-cart';
    
    public function Price(){
            global $woocommerce, $post;
            $this->currency = get_woocommerce_currency_symbol();
            $this->price =  get_post_meta( $post->ID, '_regular_price', true);
            $this->sale = get_post_meta( $post->ID, '_sale_price', true);
            ?>

            <?php if($this->sale) : ?>
            <p class="product-price-tickr"><del><?php echo $this->currency; echo $this->price; ?></del> <?php echo $this->currency; echo $this->sale; ?></p>    
            <?php elseif($this->price) : ?>
            <p class="product-price-tickr"><?php echo $this->currency; echo $this->price; ?></p>    
            <?php endif; 
    }
    
    
    
    public function AddToCart(){
            global $woocommerce, $post;
            $html = sprintf('<a rel="nofollow" href="?%s=%d" data-quantity="%d" data-product_id="%d" data-product_sku="" class="btn my-2 btn-primary button product_type_simple add_to_cart_button ajax_add_to_cart">%s</a>', $this->add_to_cart, $post->ID,  1, $post->ID,  'Add To Cart');
            print $html;
    }
    
    
    
    public function RedMoreButton(){
            global $woocommerce, $post;
            $html = sprintf('<a rel="nofollow" href="%s" class="btn my-2 btn-primary button product_type_simple">%s</a>', get_permalink($post->ID), 'Read More');
            print $html;
    }
    
    
    
    
    
    
    
    
    
}