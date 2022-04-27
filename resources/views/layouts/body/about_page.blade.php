@extends('layouts.home_header_footer')
@section('home_content')


<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div class="container" data-aos="fade-up">

<div class="section-title">
  <h2>About Us</strong></h2>
</div>



</div>
@foreach($abouts as $about)
<section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $about ->title }}</h2>
            <h3>{{ $about -> short_description }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>{{ $about -> description }}</p>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
@endforeach

@endsection
