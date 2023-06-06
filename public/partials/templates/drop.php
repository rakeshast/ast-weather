<!-- Weather design Drop Starts -->
<div class="ast-drop">
	<div class="ast-row justify-content-center">
		<div class="ast-12">
			<div class="ast-card">

				<div class="ast-d-flex">
					<h6 class="ast-flex-grow-1"><i class="fa fa-map-marker" aria-hidden="true"></i>
						<?php //echo $locationname.', '.$region.', '.$country; ?>
						<?php echo $locationname; ?>
					</h6>
					<h6><?php echo $time ?></h6>
				</div>

				<div class="ast-flex ast-flex-column temp">
                    <?php 
                        if (get_option('ast_temp_c')) {?>
                            <h1 class="font-weight-bold" id="heading"><?php echo $temp_c; ?>&deg; C </h1>
                        <?php }else{ ?>
                            <h1 class="font-weight-bold" id="heading"><?php echo $temp_f; ?>&deg; F </h1>
                        <?php }
                    ?>
					
					<span class="small grey"><?php echo $text; ?></span>
				</div>

				<div class="ast-d-flex">
					<div class="temp-details ast-flex-grow-1">
						<?php 
                            if ($ast_pressure == 'true') {
                                if (get_option('pressure_mb')) { ?>
                                    <p class="my-1">
                                        Pressure :
                                        <span> <?php echo $pressure_mb; ?> Mb </span>
                                    </p>
                                <?php }else{ ?>
                                    <p class="my-1">
                                            Pressure :
                                            <span> <?php echo $pressure_in; ?> In </span>
                                    </p>
                                <?php }    
                            }                                           
                        ?>

						<?php 
                            if ($ast_wind == 'true') {
                                if (get_option('ast_wind_mph')) { ?>
                                    <p class="my-1">
                                        Wind :
                                        <span> <?php echo $wind_mph; ?> Mph </span>
                                    </p>
                            <?php    }else{ ?>
                                    <p class="my-1">
                                        Wind :
                                        <span> <?php echo $wind_kph; ?> Kph </span>
                                    </p>
                            <?php }
                            }                        
                        ?>

                        <?php 
                            if ($ast_humidity == 'true') { ?>
                                <p class="my-1">
                                    Humidity :
                                    <span> <?php echo $humidity; ?>% </span>
                                </p>
                        <?php    }
                        ?>
                        <?php 
                            if ($ast_sunrise == 'true') { ?>
                                <p class="my-1">
                                    Sunrise :
                                    <span> <?php echo $sunrise; ?> </span>
                                </p>
                        <?php    }
                        ?>
                        <?php 
                            if ($ast_sunset == 'true') { ?>
                                <p class="my-1">
                                    Sunset :
                                    <span> <?php echo $sunset; ?> </span>
                                </p>
                        <?php    }
                        ?>  

					</div>
					<div>
						<img src="<?php echo $icon; ?>" width="100px">
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Weather Design Card End -->