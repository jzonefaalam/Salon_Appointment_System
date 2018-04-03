<!DOCTYPE html>
<html lang="en">
    <style>
        #masthead{
            background-image: url('/images/bg1.jpg');
        }
    </style>
    <head>
        @include('/pages/user/include_header')
    </head>

    <body id="page-top" >

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            @include('/pages/user/include_navigation')
        </nav>

        <!-- Header -->
        @include('/pages/user/include_masthead')

        <!-- Services -->
        @include('/pages/user/include_services')

        <!-- Packages Grid -->
        @include('/pages/user/include_packages')

        <!-- Team -->
        @include('/pages/user/include_staff')

        <!-- About -->
        <section id="about">
          <div class="container" style="margin-top: -100px;">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">About</h2>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-12">
                <ul class="timeline">
                  <li>
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>2016</h4>
                        <h4 class="subheading">Our Humble Beginnings</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">It all started with a simple plan until a company of beauty blooms. Founded by three people; <b>Ghie Moya, Andy Natividad and Shyryl De Torre</b>, Ghie Moya Hair Station By Andy Natividad was born in the line of beauty world. The salon was erected in 24 Sgt. Bumatay St., Plainview, Mandaluyong City</p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4></h4>
                        <h4 class="subheading">Little by little</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">Ghie Moya Hair Station By Andy Natividad plainly started on 2016. The salon primarily engaged in the business of beauty. They are concentrated mainly on making a customer beautiful as to what they wanted. This includes the services they offer like Hair Cut, Hair Color, Cellophane, Hair Spa and everything related to hair and beauty.</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4></h4>
                        <h4 class="subheading">Transition to Full Service</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">The numbers of employees working under Ghie Moya Hair Station are 7 people. This includes all the staffs; the manager and the stylists. Altogether, Ghie Moya Hair Station was able to surpass the entire unfavorable scenario they have encountered through the years and continuing to grow and mark their place in the beauty world.</p>
                      </div>
                    </div>
                  </li>
                  
                  <li class="timeline-inverted">
                    <div class="timeline-image">
                      <h4>Be Part
                        <br>Of Our
                        <br>Story!</h4>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <!-- Contact -->
        @include('/pages/user/include_appointment')

        <!-- JS -->
        @include('/pages/user/include_js')

    </body>

</html>
