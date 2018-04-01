<section class="bg-light" id="packages" >
    <div class="container" style="margin-top: -100px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Packages</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach($package as $viewPackage)
                <?php
                    $serviceInclusions = [];
                    foreach ($inclusions as $inclusion) {
                        if(($inclusion->package_id) == ($viewPackage->package_id)){
                            foreach ($service as $serviceData) {
                                if(($serviceData->service_id)==($inclusion->service_id)){
                                    array_push($serviceInclusions, $serviceData->service_name);
                                }
                            }
                        }
                    }
                ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <div class="portfolio-hover">
                        <img src="{{ asset('images/' . $viewPackage->package_image) }}"  style="width:300px;height:200px; border-radius: 10%;" />
                    </div>
                    <div class="portfolio-caption">
                        <h4>{{ $viewPackage->package_name }}</h4>
                        <p class="text-muted">{{ $viewPackage->package_description }}</p>
                        <p class="text-muted">{{ implode(", ", $serviceInclusions) }}</p>
                        <p class="text-muted">₱ {{ number_format($viewPackage->package_price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
