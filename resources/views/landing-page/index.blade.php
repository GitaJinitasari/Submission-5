<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Wedding's</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/css/responsive.css') }}">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>
        select{
            display: none;
        }
        .current{
            margin-top: 2px;
            color: black !important;
        }
      </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header id="home">
         <!-- header inner -->
         <div  class="head_top">
            <div class="container">
               <div class="header">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 <a href="/"><img src="images/logo.png" class="w-50" alt="#" /></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="#home"> Home  </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#wedding">Event</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#guestbook">Guest Book</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#wishes">Wishes</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <div class="full">
                           <div class="center-desk">
                              <div class="d-flex justify-content-end">
                                <a href="{{ route('login') }}" class="mt-2 font-weight-normal fs-1" style="color : #e83e8c; font-size: 15px;">Dashboard</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
            <section class="banner_main">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-12">
                        <div class="text-bg">
                           <span>Selamat datang dipernikahan kami</span>
                           <h1>Semoga sehat selalu</h1>
                           <a href="javascript:void(0);">Total Guest : {{ $count ?? 0 }}</a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </header>
      <!-- end banner -->
      <!-- weare -->
      <!-- Our -->
      <div id="wedding" class="Our">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Pernikahanku</h2>
                     <span>Rencanakan pernikanmu dengan matang.</span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="Our_box">
                     <i><img src="images/plan1.png" alt="#"/></i>
                     <h4>Sesi photo</h4>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="Our_box">
                     <i><img src="images/plan2.png" alt="#"/></i>
                     <h4>Makanan</h4>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="Our_box">
                     <i><img src="images/plan3.png" alt="#"/></i>
                     <h4>Live Music </h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end Our -->
      <!-- regist -->
      <div id="guestbook" class="regist">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Berikan harapan kalian</h2>
                     <span>Semoga apa yang di inginkan kedua mempelai segera tercapai</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <form class="main_form" action="{{ route('Bukutamu.post') }}" method="post">
                    @csrf
                     <div class="row">
                        <div class="col-md-6 ">
                            @error('Nama')
                                <span class="invalid text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           <input class="contactus" placeholder="Nama" type="text" name="Nama" value="{{ old('Nama') }}">
                        </div>
                        <div class="col-md-6">
                            @error('WhatsApp')
                                <span class="invalid text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           <input class="contactus" placeholder="Whatsapp" type="number" name="WhatsApp" value="{{ old('WhatsApp') }}">
                        </div>
                        <div class="col-md-6">
                            @error('Message')
                                <span class="invalid text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           <input class="contactus" placeholder="Pesan" type="text" name="Message" value="{{ old('Message') }}">
                        </div>
                        <div class="col-md-6">
                            @error('Alamat')
                                <span class="invalid text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           <input class="contactus" placeholder="Alamat" type="text" name="Alamat" value="{{ old('Alamat') }}">
                        </div>
                        <div class="col-md-6">
                            @error('Gender')
                                <span class="invalid text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <select class="contactus" name="Gender">
                                <option data-display="Pilih Gender" selected disabled>Pilih Gender</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                           <button type="submit" class="register">Gift</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end regist -->
      <!-- testimonial -->
      <div class="testimonial" id="wishes">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Harapan untuk kedua mempelai</h2>
                     <p>Semoga ucapan serta doa dari kalian menjadi kenyataan</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                @if($guest_messages->count() >= 1)
                  <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                     <div class="carousel-inner">
                        @foreach ($guest_messages->split(2) as $key => $guest_message)
                        <div class="carousel-item {{$key == 0 ? 'active':''}}">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div  class=" col-md-6">
                                       <div class="test_box">
                                          <div class="jons">
                                            @if($guest_message[0]->Gender == 'Pria')
                                             <i><img src="images/young-man.png" style="width:100px;" alt="#"/></i>
                                            @else
                                             <i><img src="images/woman.png" style="width:100px;" alt="#"/></i>
                                            @endif
                                             <h4>{{ $guest_message[0]->Nama }}</h4>
                                          </div>
                                          <p>{{ $guest_message[0]->Message }}</p>
                                       </div>
                                    </div>
                                    <div  class=" col-md-6">
                                       <div class="test_box">
                                          <div class="jons">
                                            @if($guest_message[1]->Gender == 'Pria')
                                             <i><img src="images/young-man.png" style="width:100px;" alt="#"/></i>
                                            @else
                                             <i><img src="images/woman.png" style="width:100px;" alt="#"/></i>
                                            @endif
                                             <h4>{{ $guest_message[1]->Nama }}</h4>
                                          </div>
                                          <p>{{ $guest_message[1]->Message }}</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
                  @else
                  <div class="titlepage">
                    <p>Nothing Message</p>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <div class="cont">
                        <h3> <strong class="multi"> Terima kasih sudah datang</strong><br>
                           Semoga Bisa Berjumpa Dilain kesempatan
                        </h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Semoga Allah Swt senantiasa memberikan berkah untuk kami,Aamiin</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        @if($message = Session::get('success'))
            Swal.fire({
                title: "Success",
                text: '{!! $message !!}',
                icon: "success"
            });
        @endif
        @if($message = Session::get('errors'))
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{!! $message !!}'
        });
        @endif
      </script>
   </body>
</html>

