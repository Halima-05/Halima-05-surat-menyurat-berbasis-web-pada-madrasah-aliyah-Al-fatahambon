@include('layouts.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Hubungi kami</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Kontak</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        {{-- flash message --}}
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
        </div>
        @endif
        {{-- akhir flash message --}}
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map"></i>
              <h3>Alamat Kami</h3>
              <p>{{ $data->alamat }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Email Kami</h3>
              <p>{{ $data->email }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Tlp. Kami</h3>
              <p>{{ $data->telepon }}</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-lg-6 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3981.468517012728!2d128.09893637497373!3d-3.7074470962664945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zM8KwNDInMjYuOCJTIDEyOMKwMDYnMDUuNCJF!5e0!3m2!1sid!2sid!4v1714220111368!5m2!1sid!2sid" width="100%" height="384px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="{{ route('kontak.store') }}" method="POST" role="form" class="form-group">
                @csrf
              <div class="row">
                <div class="col-lg-6 form-group mb-2">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama anda">
                  @error('nama') <small class="text-danger"> {{ $message }} </small> @enderror
                </div>
                <div class="col-lg-6 form-group mb-2">
                  <input type="number" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Hp">
                  @error('nomor_hp') <small class="text-danger"> {{ $message }} </small> @enderror
                </div>
              </div>
              <div class="form-group mb-2">
                <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek">
                @error('subjek') <small class="text-danger"> {{ $message }} </small> @enderror
              </div>
              <div class="form-group mb-2">
                <textarea class="form-control" name="pesan" rows="5" placeholder="pesan"></textarea>
                @error('pesan') <small class="text-danger"> {{ $message }} </small> @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-warning">Kirim Pesan</button>
              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @include('layouts.footer')

</body>

</html>