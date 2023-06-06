<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/aryanbokde
 * @since      1.0.0
 *
 * @package    Ast_Weather
 * @subpackage Ast_Weather/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ast_Weather
 * @subpackage Ast_Weather/public
 * @author     Rakesh <aryanbokde@gmail.com>
 */
class Ast_Weather_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ast_Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ast_Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ast-weather-public.css', array(), $this->version, 'all' );
		// wp_enqueue_style( "ast-boostrap", plugin_dir_url( __FILE__ ) . 'css/bootstrap/css/bootstrap.min.css', array(), $this->version, 'all' );
		// wp_enqueue_style( "font-awesome", plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css', array(), "4.7.0", 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ast_Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ast_Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ast-weather-public.js', array( 'jquery' ), $this->version, false );

		// wp_enqueue_script( 'ast-jquery', plugin_dir_url( __FILE__ ) . 'js/bootstrap/js/jquery.min.js', array(), $this->version, true );
		// wp_enqueue_script( 'ast-bootstrap-bundle', plugin_dir_url( __FILE__ ) . 'js/bootstrap/js/bootstrap.bundle.min.js', array(), $this->version, true );	

	}

	/**
	 * Register shortcode for ast weather .
	 *
	 * @since    1.0.0
	 */
	public function create_ast_shortcode_code(){
		add_shortcode("ast-weather", array($this, "get_ast_location_weathers"));
	}

	/**
	 * Get weather information
	 *
	 * @since    1.0.0
	 */
	public function get_ast_location_weathers($atts)
	{
	    ob_start();

	    extract(shortcode_atts(array(
	        'location' => "Nagpur",
			'ast_pressure' => true,
			'ast_wind' => true,
			'ast_humidity' => true,
			'ast_sunrise' => true,
			'ast_sunset' => true,
	    ), $atts));

	    $apikey = get_option('weatherapikey');
	    $url = 'https://weatherapi-com.p.rapidapi.com/forecast.json';
		
		$args = array(
	        'method' => "GET",
	        'headers' => array(
	            "X-RapidAPI-Host" => "weatherapi-com.p.rapidapi.com",
	            "X-RapidAPI-Key" => $apikey,
	        ),
	        'body' => array(
	            'q' => $location,
	            'days' => 3
	        )
	    );

	    $response = wp_remote_get($url, $args);

	    if (is_wp_error($response)) {
	        echo $error_message = $response->get_error_message();
	    }

	    if (200 == wp_remote_retrieve_response_code($response)) {
	        $data = json_decode($response['body']);
			
	        $locationname = $data->location->name;
	        $region = $data->location->region;
	        $country = $data->location->country;
	        $text = $data->current->condition->text;
	        $icon = $data->current->condition->icon;
	        $temp_c = $data->current->temp_c;		
	        $temp_f = $data->current->temp_f;
	        $wind_mph = $data->current->wind_mph;	
	        $wind_kph = $data->current->wind_kph;	
			$pressure_mb = $data->current->pressure_mb;	
			$pressure_in = $data->current->pressure_in;	
			$humidity = $data->current->humidity;	
			$sunrise = $data->forecast->forecastday[0]->astro->sunrise;
			$sunset = $data->forecast->forecastday[0]->astro->sunset;
			
			$last_updated = $data->current->last_updated;
			$arrayString=  explode(" ", $last_updated );
			$date = $arrayString[0];
			$time = $arrayString[1];			
			$hoursInfo = $data->forecast->forecastday[0]->hour;	

			include_once(AST_WEATHER_PLUGIN_PATH . 'public/partials/templates/drop.php');	
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// if ($template == "card") {
			// 	include_once(AST_WEATHER_PLUGIN_PATH . 'public/partials/templates/card.php');
			// } else {
			// 	include_once(AST_WEATHER_PLUGIN_PATH . 'public/partials/templates/drop.php');			
			// }
		} else {
	        echo "<span style='color:red; font-size:12px;'><b>Error</b> : Please check your location or api key.</span>";
	    }
	    return ob_get_clean();
	}


}