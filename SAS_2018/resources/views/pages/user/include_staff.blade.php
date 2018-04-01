<section class="bg-light" id="staff">
    <div class="container" style="margin-top: -100px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($staff as $viewStaff)
                <div class="col-sm-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('images/' . $viewStaff->staff_image) }}" alt="">
                        <h4>{{ $viewStaff->staff_firstname }} {{ $viewStaff->staff_lastname }}</h4>
                        <p class="text-muted">{{ $viewStaff->staff_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
        </div>
    </div>
</section>
