<!-- Weather Design Card Start -->
<div class="container-fluid ast-card">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-4">

                <div class="d-flex">
                    <h6 class="flex-grow-1"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $locationname; ?>
                    </h6>
                    <h6><?php echo $time ?></h6>
                </div>

                <div class="d-flex flex-column temp mt-5 mb-3">
                    <h1 class="mb-0 font-weight-bold" id="heading"><?php echo $temp; ?>&deg; C </h1>
                    <span class="small grey"><?php echo $text; ?></span>
                </div>

                <div class="d-flex">
                    <div class="temp-details flex-grow-1">
                        <p class="my-1">
                            Pressure :
                            <span> <?php echo $pressure_mb; ?> mb </span>
                        </p>

                        <p class="my-1">
                            Humidity :
                            <span> <?php echo $humidity; ?>% </span>
                        </p>

                        <p class="my-1">
                            Sunrise :
                            <span> <?php echo $sunrise; ?> </span>
                        </p>
                        <p class="my-1">
                            Sunset :
                            <span> <?php echo $sunset; ?> </span>
                        </p>
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