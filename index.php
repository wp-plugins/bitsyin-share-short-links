<?php
/*
Plugin Name: Bitsy.in Share Short Links
Plugin URI:https://www.bitsy.in/
Description: This plugin will help you use Bitsy.in to shorten links when you share Web pages or blogs from your WordPress site. 
Version: 1.0
Author: Bitsy.in
*/
ob_start();
function btsy_ShareButton()
{
	?>
<div id="sharebox" class="slide-on-scroll" data-top="121.8px">
        <a id="hypfacebook" target="_blank" title="Follow on Facebook" class="contact-button-link cb-ancor facebook">
            <span class="fa fa-facebook"></span></a>
            <a id="hyptwitter" target="_blank" title="Visit on Twitter"
                class="contact-button-link cb-ancor twitter" href="#"><span class="fa fa-twitter">
                </span></a>
                <a id="hypgoogle" target="_blank" title="Visit on Google Plus" class="contact-button-link cb-ancor gplus">
                    <span class="fa fa-google-plus"></span></a><a id="hyplinkedin" target="_blank" title="Visit on LinkedIn"
                        class="contact-button-link cb-ancor linkedin"><span class="fa fa-linkedin"></span>
                    </a>
                    <a id="hypgmail" target="_blank" title="Send us an email" class="contact-button-link cb-ancor email">
                        <span class="fa fa-envelope"></span></a><a id="hypshortenurl" target="_blank" title="Short Link"
                            onmouseover="return getMetaDescription();" class="contact-button-link cb-ancor bitsy">
							<?php
echo '<img src="' . plugins_url( 'bitsy/images/30X30.png', dirname(__FILE__) ) . '" width="24" height="24" alt="" class="sharebtn" > ';
?>
                            <a id="hyphover"  title="Short Link" class="contact-button-link cb-ancor bitsylock"
                                    href="javascript:;" onclick="return Copy();" style="display:none;">
									<?php
echo '<img src="' . plugins_url( 'bitsy/images/lock-1.png', dirname(__FILE__) ) . '" width="24" height="24" alt="" class="sharebtn" > ';
?>
	<img id="imgFavicon" src="" width="16" height="16" alt=" " class="favicon" />
                                </a><a href="javascript:;" target="_blank" id="hypCopy" title="Short Link"
                                    class="copy contact-button-link cb-ancor bitsylockgreen" style="display:none;">
									<?php
echo '<img src="' . plugins_url( 'bitsy/images/lock_white.png', dirname(__FILE__) ) . '" width="24" height="24" alt="" class="sharebtn" > ';
?>
	<img id="imgCopyFavicon" src="" width="16" height="16" alt=" " class="favicon" />
</a>
</div>
<?php
}



function btsy_my_footer_enqueue()
{
	wp_enqueue_style('bitsyin', plugins_url('css/bitsy.css', __FILE__));
	wp_enqueue_style('font-awesome', plugins_url('css/font-awesome.min.css', __FILE__));
	wp_enqueue_script('bitsyin',plugins_url( 'js/bitsy.js',__FILE__));
	
	
}
add_action( 'wp_enqueue_scripts', 'btsy_my_footer_enqueue',500 );
add_shortcode( 'bitsy_share', 'btsy_ShareButton' ); //make shortcode
add_action('admin_menu', 'btsy_test_plugin_setup_menu');
 
function btsy_test_plugin_setup_menu(){
        add_menu_page( 'Bitsy', 'Bitsy.in', 'manage_options', 'bitsy', 'btsy_test_init',plugins_url( 'bitsy/images/fav.png',dirname(__FILE__)) );
}
function btsy_test_init()
{
	?>
       <h1>Bitsy.in</h1><br/><p>
 Bitsy.in is URL Shortening site that allows your URL converted in to tiny URL. With Bitsy URL shortner, you can shorten URLs to make them easier to share on social media sites.</p><br/>
	  <strong>Shortcode</strong> : [bitsy_share] <br/><strong>Php Shortcode</strong>: echo do_shortcode('[bitsy_share]');
	   <?php
}
ob_flush();
?>