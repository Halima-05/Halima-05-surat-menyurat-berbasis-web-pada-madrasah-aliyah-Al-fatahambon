@include('layouts.header')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Wisata Negeri Laha</h2>
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ route('wisata_kami.index') }}">Wisata</a></li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">

          @foreach ( $data_wisata as $row )
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="file/wisata/{{ $row->foto_wisata }}" class="img-fluid" alt="">
                <span class="post-date">Wisata</span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title">{{ $row->nama_wisata }}</h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">{{ $row->nama_pengelola }}</span>
                  </div>
                </div>

                <p>
                  {!!$row->deskripsi !!}
                </p>

                <hr>

                <a href="{{ route('wisata_kami.show', $row->id_wisata) }}" class="readmore stretched-link"><span>Read More</span><i
                    class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post list item -->
          @endforeach
        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  @include('layouts.footer')

 
  