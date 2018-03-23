<!DOCTYPE html>
<html lang="en">

    <head>
        @include('/pages/user/include_header')
    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            @include('/pages/user/include_navigation')
        </nav>

        <!-- Header -->
        <header class="masthead">
          <div class="container">
            <div class="intro-text">
              <div class="intro-lead-in"></div>
              <div class="intro-heading text-uppercase">Something about the Salon</div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#appointment">Set an Appointment</a>
            </div>
          </div>
        </header>

        <!-- Services -->
        @include('/pages/user/include_services')

        <!-- Packages Grid -->
        @include('/pages/user/include_packages')

        <!-- About -->
        <section id="about">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <ul class="timeline">
                  <li>
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>2009-2011</h4>
                        <h4 class="subheading">Our Humble Beginnings</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>March 2011</h4>
                        <h4 class="subheading">An Agency is Born</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>December 2012</h4>
                        <h4 class="subheading">Transition to Full Service</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-image">
                      <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>July 2014</h4>
                        <h4 class="subheading">Phase Two Expansion</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
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

        <!-- Team -->
        <section class="bg-light" id="team">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
                  <h4>Kay Garland</h4>
                  <p class="text-muted">Lead Designer</p>
                  <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-linkedin"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
                  <h4>Larry Parker</h4>
                  <p class="text-muted">Lead Marketer</p>
                  <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-linkedin"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="team-member">
                  <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
                  <h4>Diana Pertersen</h4>
                  <p class="text-muted">Lead Developer</p>
                  <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-linkedin"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Clients -->
        <section class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <a href="#">
                  <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
                </a>
              </div>
              <div class="col-md-3 col-sm-6">
                <a href="#">
                  <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
                </a>
              </div>
              <div class="col-md-3 col-sm-6">
                <a href="#">
                  <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
                </a>
              </div>
              <div class="col-md-3 col-sm-6">
                <a href="#">
                  <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
                </a>
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
