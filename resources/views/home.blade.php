@extends('layouts.home_header_footer')
@include('layouts.body.slider')
@section('home_content')

     <!-- ======= Frontend Dinamyc section  ======= -->





    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      @include('layouts.body.about_section')
    </section><!-- End About Us Section -->



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                        @foreach($allBrand as $brand)
                          <li data-filter=".filter-{{$brand->brand_name}}">{{$brand->brand_name}}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div  class="d-flex align-content-between flex-wrap bg-dark py-3 mb-2 mx-1 ">
                    @foreach($allBrand as $brand)
                        @foreach($portfolio as $newInBrands)
                            @if( $brand->id == $newInBrands->brand_id)

                        <div class="portfolio-container ml-5" data-aos="fade-up" style=" width:300px;">

                            <div class="col  portfolio-item filter-{{$brand->brand_name}}" >
                                <img src="{{ asset($newInBrands -> image) }}"  style="width:300px;"  alt="">
                                <div class="portfolio-info">
                                <a href="{{url('portfolio/page')}}" data-gall="portfolioGallery"  title="New Product">Portfolio Page</i></a>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>


        </div>

    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Brands</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
        @foreach($brands as $brand)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                <img src="{{ $brand->brand_image}}" class="img-fluid" alt="" >
                </div>
            </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Our Clients Section -->

@endsection
