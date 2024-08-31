@include('layouts.header')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>{{ $data->nama_wisata }}</h2>
        <ol>
          <li><a href="{{ url('/')}}">Home</a></li>
          <li><a href="{{ route('wisata_kami.index') }}">Wisata</a></li>
          <li>Detail</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="../file/wisata/{{ $data->foto_wisata }}" alt="">
              </div>

              <h2 class="title">{{ $data->nama_wisata }}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Admin</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                        datetime="2020-01-01">{{ date('D, d M Y',strtotime($data->created_at)) }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12
                      Comments</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p> {!! $data->deskripsi !!} </p>
              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Wisata</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Pantai</a></li>
                  <li><a href="#">Gunung</a></li>
                  <li><a href="#">Karnaval</a></li>
                </ul>
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->
          </div>
          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <li><a href="#">Pantai <span>(25)</span></a></li>
                  <li><a href="#">Gunung <span>(12)</span></a></li>
                  <li><a href="#">Karnaval <span>(5)</span></a></li>
                </ul>
              </div><!-- End sidebar categories-->
          

              <div class="reply-form">

                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>
              </div>

              <div class="mt-3" style="height: 200px" id="map"></div>

            </div><!-- End blog comments -->
          </div>
        </div>
      </div>
    </section><!-- End Wisata Negeri Laha Section -->

  </main><!-- End #main -->

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script>
    // titik Lokasi Maps
    var map = L.map('map').setView([{{$data->lat_lokasi}}, {{$data->long_lokasi}}], 15);

    // menampilkan maps
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // membuat mark pada maps
    var marker = L.marker([{{$data->lat_lokasi}}, {{$data->long_lokasi}}]).addTo(map);
    marker.bindPopup("<br>{{$data->nama_wisata}}</br> <br>{{$data->no_hp}}</br>")
</script>
@include('layouts.footer')