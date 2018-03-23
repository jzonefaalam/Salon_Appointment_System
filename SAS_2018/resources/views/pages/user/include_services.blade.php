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
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="{{ asset('images/' . $viewService->service_image) }}"  style="width:150px;height:100px; border-radius: 10%;" />
                    </span>
                        <h4 class="service-heading">{{ $viewService->service_name }}</h4>
                        <p class="text-muted">{{ $viewService->service_desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
