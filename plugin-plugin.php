<?php

/*
  Plugin Name: builder
  Version: 1.0.7
  Description: ecommerce solution for WordPress
  Plugin URI: http://builder.com
  Author: builder.com team
  Author URI: http://builder.com
 */

defined('ABSPATH') or die("No script kiddies please!");

/** Step 2 (from text above). */
add_action('admin_menu', 'my_plugin_menu');

/** Step 1. */
function my_plugin_menu() {

    add_menu_page('builder', 'builder', 'manage_options', 'builder', 'my_plugin_options');
}

/** Step 3. */
function my_plugin_options() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }


    if (!empty($_POST)) {


// add CSS to orillathemebuilder.css 	

        $file = get_stylesheet_directory() . "/orillathemebuilder.css";
        
		//zarejda css 6ablona v promenliva (pro4ita faila)
		$current = file_get_contents(dirname(__FILE__)."/theme.css");
		
		//definira se rules
		$rules = array();
		
		//namira vsi4ki pravila v css 6ablona
		if(preg_match_all("/@[a-zA-Z0-9\-]+@/ui",$current,$rules)){
		//vzima samo elementite ot purvo nivo na masiva za6toto sa dva	
		$rules = $rules[0];
		
			foreach($rules as $v){
				//filtrirame {% i %} kato gi zamenqme s "" - prazno prostranstvo
				$v= str_replace(array("@","@"),"",$v);
				
				//ako nqma takova pravilo v $_POST prodaljavame kam sledva6toto pravilo ot masiva
				//if(isset($_POST[$v]) && empty($_POST[$v])){
				//	continue;
				//}
				
				
				  $option_name = $v;
				  $new_value = $_POST[$v];

				if (get_option($option_name) !== false) {

					// The option already exists, so we just update it.
					update_option($option_name, $new_value);
				} else {

					// The option hasn't been added yet. We'll add it with $autoload set to 'no'.
					$deprecated = null;
					$autoload = 'no';
					add_option($option_name, $new_value, $deprecated, $autoload);
				}
				
				
				
				$current = str_replace("@".$v."@",$_POST[$v],$current);
				
			
			}
			
				//$current = str_replace(array("{%btn-primary-color%}","{%btn-primary-hover-text-color%}"),array($_POST['btn-primary-color'],$_POST['btn-primary-hover-text-color']),$tmpl);
	
				file_put_contents($file,$current);
		
		
		
		}
		
		
		
		
		
		
       


      
    }
    include 'view.html.php';


    // include 'view.css';
}

function mythemename_all_scriptsandstyles() {

//Load JS and CSS files in here  	
    
	wp_enqueue_style('wp-color-picker');
 
	wp_register_style('slider-css', plugins_url('css/slider.css', __FILE__), array(), '2', 'all');
	wp_register_style('jquery-ui-css', plugins_url('css/jquery-ui.css', __FILE__), array(), '2', 'all');
	wp_register_script('slider-js', plugins_url('slider.js', __FILE__), array('jquery-core'), '1', true);
	wp_register_script('jquery-ui', plugins_url('jquery-ui.js', __FILE__), array('jquery-core'), '1', true);
	wp_register_script('jquery2-js', plugins_url('jquery-2.1.1.js', __FILE__), array('jquery-core'), '1', true);
	
	

wp_register_script('fontSelector', plugins_url('jquery.fontselect.js', __FILE__), array('jquery-core'), '1', true);
wp_enqueue_script('fontSelector');
//wp_register_script('jquery-ui-min', plugins_url('sds.js', __FILE__), array('jquery-core'), '1', true);
//wp_enqueue_script('jquery-ui-min');
//wp_register_script('jquery-min-js', plugins_url('bsp.js', __FILE__), array('jquery-core'), '1', true);
//wp_enqueue_script('jquery-min-js');





wp_register_style('fontSelector-css', plugins_url('fontselect.css', __FILE__), array(), '2', 'all');
wp_enqueue_style('fontSelector-css');

	
    wp_enqueue_script('wp-color-picker');
	
	
	//wp_enqueue_script('jquery2-js');
	
	
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('slider-js');
	wp_enqueue_style('slider-css');
	wp_enqueue_style('jquery-ui-css');
	
 
	
	
	

	
	
}

// CSS form

add_action('admin_enqueue_scripts', 'mythemename_all_scriptsandstyles');

// add orillathemebuilder.css to header

function orillathemebuilder() {
    wp_register_style('builder', get_stylesheet_directory_uri() . "/orillathemebuilder.css");
    wp_enqueue_style('builder');
	//wp_register_style('google', 'http://fonts.googleapis.com/css?family=');
   // wp_enqueue_style('google');
}

add_action('wp_enqueue_scripts', 'orillathemebuilder');





function load_fonts() {
            wp_register_style('et-googleFonts', 'http://fonts.googleapis.com/css?family='.get_option('btn-primary-font-family'));
            wp_enqueue_style( 'et-googleFonts');
        }
    add_action('init', 'load_fonts'); 





//$btn_primary_color = $_POST['btn-primary-color'];
//delete_option( 'btn-primary-color' );
//update_option( 'btn-primary-color', $btn_primary_color, '', 'yes' );
//echo get_option( 'btn-primary-color' );











