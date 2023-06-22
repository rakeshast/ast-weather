<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/aryanbokde
 * @since      1.0.0
 *
 * @package    Ast_Weather
 * @subpackage Ast_Weather/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ast_Weather
 * @subpackage Ast_Weather/admin
 * @author     Rakesh <aryanbokde@gmail.com>
 */
class Ast_Weather_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ast-weather-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ast-weather-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function ast_weather_admin_menu() {
		add_options_page(
			__('Ast Weather', 'textdomain'),
			__('Ast Weather', 'textdomain'),
			'manage_options', 
			'ast-weather', 
			array($this, "my_settings_page"),);
	}


	// Add the settings page
	public function my_settings_page() {
	    // Display the settings page markup
	    ?>
	    <div class="wrap">
	        <h2><?php _e('Ast Weather Setting', 'textdomain'); ?></h2>
	        <form method="post" action="options.php">
	            <?php
	            // Generate and display the hidden fields
	            settings_fields('my_settings_group');
	            
	            // Output the settings sections
	            do_settings_sections('my_settings_page');
	            
	            // Output the submit button
	            submit_button('Save Settings', '', 'ast_submit');
	            ?>
	        </form>
	    </div>
	    <?php
	}

	// Register and define settings fields
	public function my_register_settings_fields() {

	    // register_setting('my_settings_group');
	    register_setting('my_settings_group', 'ast_apikey', ['sanitize_callback' => 'sanitize_text_field']);    
	    
	    add_settings_section('my_section', 'General Setting', array($this, 'my_section_callback'), 'my_settings_page');

	    
	    add_settings_field('ast_apikey', 'Weather Api', array($this, 'myplugin_text_field_callback'), 'my_settings_page', 'my_section', array('name' => 'ast_apikey', 'type' => 'text', 'description' => "Working"));

	    add_settings_field('ast_temp_c', 'Temp C', array($this, 'myplugin_text_field_callback'), 'my_settings_page', 'my_section', array('name' => 'ast_temp_c', 'label_for' => 'ast_temp_c', 'type' => 'checkbox', 'description' => "Working"));

	    add_settings_field('ast_wind_mph', 'Wind Mph', array($this, 'myplugin_text_field_callback'), 'my_settings_page', 'my_section', array('name' => 'ast_wind_mph', 'label_for' => 'ast_wind_mph', 'type' => 'checkbox', 'description' => "Working"));

	    add_settings_field('ast_pressure_mb', 'Temp C 3', array($this, 'myplugin_text_field_callback'), 'my_settings_page', 'my_section', array('name' => 'ast_pressure_mb', 'label_for' => 'ast_pressure_mb', 'type' => 'checkbox', 'description' => "Working"));

	}


	// Section callback function
	public function my_section_callback() {
	    // echo "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>";
	    echo "";
	}


	// Text field callback function
	public function myplugin_text_field_callback($args) {
	    $field_name = $args['name'];
	    $field_type = $args['type'];
	    $field_desc = $args['description'];    
	    $value = get_option($field_name);
	    
	    if ($field_type == "text") {?>
	        <input type="<?php echo $field_type; ?>" name="<?php echo $field_name; ?>" value="<?php echo esc_attr($value); ?>" />
	    <?php }

	    if ($field_type == "checkbox") {?>   
	        <input type="<?php echo $field_type ?>" name="<?php echo $field_name; ?>" value="1" <?php if (empty($value)) { echo ""; }else { echo "checked"; } ?>/>
	    <?php }
	    
	}


	// Validate and save the settings
	public function my_save_settings() {

	    if (isset($_POST['ast_submit'])) {

	        $apikey = sanitize_text_field($_POST['ast_apikey']);
	        $temp = $_POST['ast_temp_c'];
	        $wind = $_POST['ast_wind_mph'];
	        $pressure = $_POST['ast_pressure_mb'];

	        // Perform multiple validations
	        $errors = array();

	        // Empty field validation
	        if (isset($_POST['ast_apikey']) && empty($apikey)) {
	            $errors[] = 'Please enter a value for the Weather Api.';
	        }

	        $url = 'https://weatherapi-com.p.rapidapi.com/forecast.json';
		    $args = array(
		        'method' => "GET",
		        'headers' => array(
		            "X-RapidAPI-Host" => "weatherapi-com.p.rapidapi.com",
		            "X-RapidAPI-Key" => $apikey,
		        ),
		        'body' => array(
		            'q' => 'Nagpur',
		            'days' => '3'
		        )
		    );
		   
		    $response = wp_remote_get($url, $args);

		    if ( 200 != wp_remote_retrieve_response_code($response) ) {
		    	$errors[] = 'Something went wrong, Please check your api key';
		    }

	        // Empty field validation
	        // if (isset($_POST['ast_temp_c']) && !empty($_POST['ast_temp_c'])) {
	            
	        // }else{
	        // 	$errors[] = 'Please check temprature field.';
	        // }

	        update_option('ast_apikey', $apikey);
	        update_option('ast_temp_c', $temp);
	        update_option('ast_wind_mph', $wind);
	        update_option('ast_pressure_mb', $pressure);

	        // Check if any errors occurred
	        if (!empty($errors)) {
	            foreach ($errors as $error) {
	                add_settings_error(
	                    'ast-weather',
	                    'validation_error',
	                    $error,
	                    'error'
	                );
	            }
	            return;
	        }

	        // update_option('ast_apikey', $apikey);
	        // update_option('ast_temp_c', $temp);
	        // update_option('ast_wind_mph', $wind);
	        // update_option('ast_pressure_mb', $pressure);
	    }
	}



}
