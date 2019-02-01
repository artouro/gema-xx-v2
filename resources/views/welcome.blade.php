@php
  $user = \Auth::user();
@endphp
<!DOCTYPE html>
<html>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131760994-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-131760994-1');
    </script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GEMA XX 2019 | Urban Scouting & Orienteering Games</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/welcome') }}/images/favicon.ico">
    <!-- jQuery -->
    <script
      type="text/javascript"
      src="{{ asset('assets/welcome') }}/lib/jquery-3.3.1/jquery.min.js"
    ></script>
    <!-- Bootstrap 4.1.3 -->
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="{{ asset('assets/welcome') }}/lib/bootstrap-4.1.3/css/bootstrap.min.css"
    />
    <script
      type="text/javascript"
      src="{{ asset('assets/welcome') }}/lib/bootstrap-4.1.3/js/bootstrap.min.js"
    ></script>
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="{{ asset('assets/welcome') }}/css/style.css"
    />
    <script type="text/javascript" src="main.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,700,900" rel="stylesheet">
  </head>
  <body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
      <a class="navbar-brand" href="#">
        <img
          src="{{ asset('assets/welcome') }}/images/logo2.svg"
          width="30"
          height="30"
          class="d-inline-block align-top"
          alt=""
        />
        GEMA XX <b>2019</b>
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#events"
              >Event</a
            >
          </li>
          <li class="nav-item"><a class="nav-link" href="#partners">Partners</a></li>
          @if(empty($user))
          <li class="nav-item"><button class="btn btnPrimary" data-toggle="modal" data-target="#registrationForm">Registrasi</button></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
          @else
          <li class="nav-item"><a class="nav-link" href="{{ url('d') }}">Dashboard</a></li>
          @endif
        </ul>
      </div>
    </div>
    </nav>
    <!-- End of Navbar -->
    <!-- Banner Carousel -->
    <section id="banner">
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-content">
                <div class="container">
                    <div class="row">
                        <div class="col main-slide">
                            <div class="text-center logo-small col-md-12"><img src="{{ asset('assets/welcome') }}/images/logo2.svg"></div>
                            <h2>GEMA XX 2019</h2>
                            <p>
                                Urban Scouting and Orienteering Games <br><br>
                                <span>Sabtu & Minggu, 23 - 24 Februari 2019</span><br>
                                <i>Prepare for millenial movement</i>
                            </p>
                            <br>
                        </div>
                        <div class="col text-right map">
                            <img id="map" src="{{ asset('assets/welcome') }}/images/friends.svg">
                            <div class="blob"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-content">
                <div class="container">
                    <div class="row">
                        <div class="col main-slide">
                            <div class="text-center logo-small col-md-12"><img src="{{ asset('assets/welcome') }}/images/logo2.svg"></div>
                            <h2>GEMA XX 2019</h2>
                            <p>
                                Urban Scouting and Orienteering Games <br><br>
                                <span>Sabtu & Minggu, 23 - 24 Februari 2019</span><br>
                                <i>Prepare for millenial movement</i>
                            </p>
                            <br>
                        </div>
                        <div class="col text-right map">
                            <img id="map" src="{{ asset('assets/welcome') }}/images/map-red.svg">
                            <div class="blob"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-content">
                <div class="container">
                    <div class="row">
                        <div class="col main-slide">
                            <div class="text-center logo-small col-md-12"><img src="{{ asset('assets/welcome') }}/images/logo2.svg"></div>
                            <h2>GEMA XX 2019</h2>
                            <p>
                                Urban Scouting and Orienteering Games <br><br>
                                <span>Sabtu & Minggu, 23 - 24 Februari 2019</span><br>
                                <i>Prepare for millenial movement</i>
                            </p>
                            <br>
                        </div>
                        <div class="col text-right map">
                            <img id="map" src="{{ asset('assets/welcome') }}/images/winners.svg">
                            <div class="blob"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div> 
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </section>
       <!-- End of Banner -->
      <!-- Sponsors -->
      <section id="partners" class="section">
          <div class="col-12 text-center section-title">
              <p>Supported By</p>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-md-6 col-lg-4 partner-cell text-center">
                      <img src="{{ asset('assets/welcome') }}/images/partners/boyman-black.png" alt="Boyman Ragam Latih Pramuka">
                  </div>
                  <div class="col-md-6 col-lg-4 partner-cell text-center">
                      <img src="{{ asset('assets/welcome') }}/images/partners/kwarda.png" alt="Kwarda Provinsi Jawa Barat" width="100">
                  </div>
                  <div class="col-md-6 col-lg-4 partner-cell text-center">
                      <img src="{{ asset('assets/welcome') }}/images/partners/tectona.png" alt="Tectona : Outdoor, Cloth, Bag" width="200">
                  </div>
                  <div class="col-md-6 col-lg-4 partner-cell text-center">
                      <img src="{{ asset('assets/welcome') }}/images/partners/binasehat.png" alt="Rumah Sakit Bina Sehat Bandung" width="150">
                  </div>
              </div>
          </div>
      </section>
      <!-- End of Sponsors -->
      <!-- Events -->
      <section id="events" class="section">
        <div class="col-12 text-center section-title">
            <p>Events</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 event-cell text-center">
                    <img src="{{ asset('assets/welcome') }}/images/mobilemap.svg">
                    <h4>ORIENTEERING GAMES</h4>
                    <p>Penjelajahan di daerah urban & berinteraksi dengan situs landmark khas kota Kembang</p>
                </div>
                <div class="col-12 col-sm-4 event-cell text-center">
                    <img src="{{ asset('assets/welcome') }}/images/festival.svg">
                    <h4>GEMA Fest</h4>
                    <p>Pertukaran budaya dan suvenir, serta sebagai malam keakraban peserta</p>
                </div>
                <div class="col-12 col-sm-4 event-cell text-center">
                    <img src="{{ asset('assets/welcome') }}/images/workshop.svg">
                    <h4>WORKSHOP</h4>
                    <p>Pengarahan dan pembekalan pembina pendamping dalam membina gugus depan di era millenial</p>
                </div>
            </div>
        </div>
      </section>
      <!-- End of Events -->
      <!--Juknis -->
      <section id="events" class="section">
        <div class="col-12 text-center section-title">
            <p>Petunjuk Teknis</p>
        </div>
        <div class="container">
            <div class="col-12 juknis-btn text-center">
              <p>Untuk melihat petunjuk teknis GEMA XX 2019, silahkan unduh file PDF dengan menekan tombol dibawah.</p>
              <a href="{{ asset('assets/welcome') }}/docs/Juknis&Undangan SD.pdf" target="_blank" id="juknisSD" class="btn btnPrimary" download>Download Juknis SD/MA</a>
              <a href="{{ asset('assets/welcome') }}/docs/Juknis&Undangan SMP-SMA.pdf" target="_blank" id="juknisSMP" class="btn btnPrimary" download>Download Juknis SMP/SMA</a>
            </div>
        </div>
      </section>
      <!-- End of Juknis -->
      <!--LKBB -->
      <section id="events" class="section">
        <div class="col-12 text-center section-title">
            <p>Formulir LKBB</p>
        </div>
        <div class="container">
            <div class="col-12 juknis-btn text-center">
              <p>Untuk daftar menjadi peserta perlombaan LKBB GEMA XX 2019, silahkan unduh formulir LKBB dengan menekan tombol dibawah.</p>
              <a href="{{ asset('assets/welcome') }}/docs/FormulirLKBB.pdf" target="_blank" id="formLkbb" class="btn btnPrimary" download>Download Formulir LKBB</a>
            </div>
        </div>
      </section>
      <section id="events" class="section">
        <div class="col-12 text-center section-title">
            <p>Twibbon</p>
        </div>
        <div class="container">
            <div class="col-12 juknis-btn text-center">
              <p>Silahkan unduh Twibbon GEMA XX 2019 dengan menekan tombol dibawah.</p>
              <a href="{{ asset('assets/welcome') }}/images/Twibbon GEMA XX.png" target="_blank" id="twibbon" class="btn btnPrimary" download>Download Twibbon GEMA XX</a>
            </div>
        </div>
      </section>
      <!-- End of LKBB -->
      <!-- Guests -->
      <section id="guests" class="section">
          <div class="col-12 text-center section-title">
              <p>Guest Stars</p>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 col-md-4 guest-cell text-center">
                      <img src="{{ asset('assets/welcome') }}/images/guests/haris.jpg" alt="Foto Haris Saeful Rohim">
                      <h5>Haris Saeful Rohim</h5>
                      <p>
                        Jajaka Kab. Bandung 2017 <br>
                        <i>Master of Ceremony</i>
                    </p>
                  </div>
                  <div class="col-sm-12 col-md-4 guest-cell up text-center">
                      <img src="{{ asset('assets/welcome') }}/images/guests/kakeful.jpg" alt="Foto Reza Darmawangsa">
                      <h5>Saeful Bachri</h5>
                      <p>
                        Sekretaris Kwartir Daerah Jawa Barat<br>
                        <i>Pemateri Workshop</i>
                    </p>
                  </div>
                  <div class="col-sm-12 col-md-4 guest-cell text-center">
                    <img src="{{ asset('assets/welcome') }}/images/guests/unknown.jpg" alt="Foto ???">
                    <h5>Coming Soon</h5>
                      <i>Bintang Tamu <br>GEMA Fest</i>
                  </p>
                </div>
              </div>
          </div>
      </section>
      <!-- End of Events -->
      <!-- Registration -->
      <section id="registration" class="section">
          <div class="container">
            <div class="col-12 col-sm-8 col-md-6">
                <h4>REGISTER NOW</h4>
                <p>And join us to participate in fun experience exploring Bandung urban sites</p>
                <button class="btn btnPrimary" data-toggle="modal" data-target="#registrationForm">REGISTRASI</button>
            </div>
          </div>
          <div class="modal fade" id="registrationForm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Form Registrasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{ url('/registration') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="col-form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" placeholder="Contoh : Budiman Suryadi" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Contoh : emailcontoh@gmail.com" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Nama Pangkalan</label>
                      <input type="text" class="form-control" name="pangkalan" placeholder="Contoh : SMP Negeri 1 Baleendah" required>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="level" value="3" required> SD &nbsp;&nbsp;
                      <input type="radio" name="level" value="4" required> SMP &nbsp;&nbsp;
                      <input type="radio" name="level" value="5" required> SMA
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Mengikuti LKBB ?</label>
                      <br>
                      <input type="radio" name="lkbb" value="1" required> Ya &nbsp;&nbsp;
                      <input type="radio" name="lkbb" value="0" required> Tidak
                    </div>
                    <div class="form-group">
                      <label for="telp" class="col-form-label">Telepon</label>
                      <input id="telp" type="text" name="telp" class="form-control" required="required" placeholder="Contoh : 081123456789">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Kata Sandi</label>
                      <input type="password" id="pass1" class="form-control" name="password" placeholder="..." required>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!-- End of Registration -->
      <footer>
        <div class="container">
          <div class="col social">
              <ul>
                  <li><a href="https://www.instagram.com/scoutbeone" target="_blank"><img src="{{ asset('assets/welcome') }}/images/socials/ig2.png" alt="Instagram icon"> @scoutbeone</a></li>
                  <li><a href="https://www.facebook.com/pramukasatubaleendah" target="_blank"><img src="{{ asset('assets/welcome') }}/images/socials/fb2.png" alt="Facebook icon"> Pramuka Satu Baleendah</a></li>
                  <li><img src="{{ asset('assets/welcome') }}/images/socials/line2.png" alt="Line icon"> ID : qei3523a</li>
              </ul>
          </div>
        </div>
      </footer>
      <div class="col copyright text-center">
        Copyright &copy; 2018. All rights reserved
      </div>
      <script type="text/javascript">
      (() => {
        $('#pass-equal').css('display', 'none');
        $('#pass-not-equal').css('display', 'none');
      })();
      </script>
  </body>
</html>

