@extends('layouts.home_header_footer')
@section('home_content')


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">

      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2719.306758781975!2d28.880625477691694!3d47.03421108911393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97c63d1f01cf1%3A0x3b4629176190fd30!2sStrada%20Ginta%20Latin%C4%83%205%2C%20Chi%C8%99in%C4%83u%202044%2C%20Moldova!5e0!3m2!1sro!2s!4v1648657449800!5m2!1sro!2s" frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">
            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>{{ $contacts->adress }}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{ $contacts->email }}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>{{ $contacts->phone }}</p>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row mt-5 justify-content-center" >
          <div class="col-lg-10">


            <form action="{{ route('contact.form') }}" method="post" class="shadow p-3 mb-5 bg-body rounded">
                @csrf
                @if(session('success'))
                    <div class="card-header-sm text-light bg-success my-3 p-2 rounded" style="margin-top:20px;">
                        {{ session('success') }}
                    </div>
                @endif
              <div class="form-row">
                <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name"  />
                    @error('name')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                    <br>
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" />
                    @error('email')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                    <br>
                </div>
              </div>
              <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="Subject" />
                    @error('subject')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                    <br>
              </div>
              <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                    @error('message')
                        <label class=" text-danger">{{ $message }}</label>
                    @enderror
                    <br>
              </div>
              <div class="mb-3">
              <button type="submit" name="submit" class="form-control btn btn-success">Send Message</button>
            </form>
          </div>

        </div>

      </div>
    </section>

@endsection
