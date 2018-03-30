<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <hr>
            </div>
        </div>
        <div class="row text-center">
            @foreach($service as $viewService)
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <img class="img-fluid" src="{{ asset('images/' . $viewService->service_image) }}" alt="">
                    <div class="portfolio-caption">
                        <h4>{{ $viewService->service_name }}</h4>
                        <p class="text-muted">{{ $viewService->service_desc }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
