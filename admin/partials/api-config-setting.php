<?php 
    global $wpdb;
    traitement_formulaire_don_cagnotte();
?>


<div class="ast-container">
    <h2>Weather Setting</h2>
    <div class="form">
        <form action="" method="POST" class="comment-form">
            <?php wp_nonce_field( 'verify-me', 'weather-verif' ); ?>
            <ul>
                <li><label for="ast-apikey">Weather Api Key</label></li>
                <li><input type="text" name="ast-apikey" placeholder="Enter your weather api."
                    value="<?php echo get_option('weatherapikey'); ?>" /></li>
                <li><label for="">Temp_c</label></li>
                <li><input type="checkbox" name="ast_temp_c" value="1" <?php if(get_option('ast_temp_c') == true){ echo "Checked"; } ?>/></li>
                <li><label for="">Wind_mph</label></li>
                <li><input type="checkbox" name="ast_wind_mph" value="1" <?php if(get_option('ast_wind_mph') == true){ echo "Checked"; } ?>/></li>
                <li><label for="">Pressure_mb</label></li>
                <li><input type="checkbox" name="pressure_mb" value="1" <?php if(get_option('pressure_mb') == true){ echo "Checked"; } ?>/></li>    
            </ul>

            <input type="submit" name="submit" class="submit btn btn-primary" value="Saved Changes" />
        </form>
    </div>
</div>




<?php 

function traitement_formulaire_don_cagnotte() {
    $error_message = [];
	if ( ! isset( $_POST['submit'] ) || ! isset( $_POST['weather-verif'] ) )  {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['weather-verif'], 'verify-me' ) ) {
		return;
	}

	$apikey = trim($_POST['ast-apikey']);
    
    if(isset($_POST['ast_temp_c']) && $_POST['ast_temp_c']!="")
    {
        $ast_temp_c = 1;
    }else{
        $ast_temp_c = 0;
    }
    if(isset($_POST['ast_wind_mph']) && $_POST['ast_wind_mph']!="")
    {
        $ast_wind_mph = 1;
    }else{
        $ast_wind_mph = 0;
    }
    if(isset($_POST['pressure_mb']) && $_POST['pressure_mb']!="")
    {
        $pressure_mb = 1;
    }else{
        $pressure_mb = 0;
    }
	
    if (empty($apikey)) {
        $error_message['api_key'] = 'Please enter weather api key';
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
        $error_message['api_key_validation'] = 'Something went wrong, Please check your api key';
    }
    if(count($error_message) == 0){
        update_option('weatherapikey', $apikey);
        update_option('ast_temp_c', $ast_temp_c);
        update_option('ast_wind_mph', $ast_wind_mph);
        update_option('pressure_mb', $pressure_mb);
    }else{
        foreach ($error_message as $error) {
            echo '<span style="color:#721c24; padding:5px; width:100%; background-color:#f8d7da; margin-bottom:15px;">"'.$error.'"</span>';
        }
        return;
    }
    echo '<span style="color:#000; padding:5px; width:100%; background-color:grren; margin-bottom:15px;">Api key updated successfully</span>';

    

}