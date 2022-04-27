@extends('layouts.home_header_footer')
@section('home_content')

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Portolio</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Portolio</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach($allBrand as $brand)
                          <li data-filter=".filter-{{$brand->brand_name}}">{{$brand->brand_name}}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach($allBrand as $brand)
                        @foreach($portfolio as $newInBrands)
                            @if( $brand->id == $newInBrands->brand_id)
                                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$brand->brand_name}}">
                                            <img src="{{ asset($newInBrands -> image) }}" class="img-fluid" alt="">
                                            <div class="portfolio-info">
                                            <h4>{{$brand->brand_name}}</h4>
                                            <a href="{{ asset($newInBrands -> image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                            </div>
                                        </div>
                            @endif
                        @endforeach
                    @endforeach
                    </div>
                </div>

  </div>
</section><!-- End Portfolio Section -->

</main><!-- End #main -->


@endsection
