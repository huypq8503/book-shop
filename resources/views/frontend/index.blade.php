@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    {{--  --}}
    <div class="container">
        <h1>{{$result}}</h1>
        <div class="row justify-content-center">
            <div class="col-12 md-pb col-md-12 col-lg-6 image-wrapper">
                <img class="w-100" src="{{ asset('/images/george.png') }}" alt="Mobirise Website Builder">
            </div>

            <div class="col-12 col-lg col-md-12">
                <div class="text-wrapper align-left">
                    <h1 class="mbr-section-title align-left mbr-fonts-style mb-3 display-2"><strong>Make Reading
                            <br>A Habit</strong></h1>
                    <blockquote class=" ">

                        <p class="mbr-text align-left mbr-fonts-style display-5">
                            The World belongs to
                            <br> those who reads.
                        </p>
                        <footer class="blockquote-footer">Novelist <cite title="Source Title">George R.R Martin</cite>
                        </footer>
                    </blockquote>

                    <div class="mbr-section-btn align-left mt-3"><a class="btn btn-lg btn-primary display-7"
                            href="/collections">Buy Books</a></div>
                </div>
            </div>
        </div>
    </div>


    {{--  --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-bs-ride="carousel"
        data-bs-interval="1500">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption caption_slider d-none d-md-block">
                        <div class="custom-carousel-content">
                            <p class="display-2 ">{!! $sliderItem->title !!}</p>

                            <div>
                                <a href=" {{ $sliderItem->description }}" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class=" bg-white pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="display-5">
                        <strong>Welcome to Whizzy</strong>
                    </h2>
                    {{-- <div class="underline">
                </div> --}}
                    <p class="display-6">
                        A Platform for Buying Books and Connecting with <br> Phedophiles
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{--  --}}



    <div class="py-5 bg-white">
        <div class="container"><img src="{{ asset('/images/sliders/trending.svg') }}" class="d-block w-100" alt="...">
            <div class="row mt-5 ">
                <div class="col-md-12">
                    <h1>Trendings 📈📈📈</h1>
                    <div class="underline"></div>
                    <div class="row ">
                        <div class="col-md-4  owl-carousel owl-theme ">
                            @forelse ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        @if ($productItem->quantity > 0)
                                            <label class="stock bg-success">In Stock</label>
                                        @else
                                            <label class="stock bg-danger">Out of Stock</label>
                                        @endif
                                        <div class="product-card-img d-flex justify-content-center p-3">

                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">₹{{ $productItem->selling_price }}</span>
                                                <span class="original-price">₹{{ $productItem->original_price }}</span>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h3>No Product Available</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="pb-5 bg-white">
        <div class="container">
            <img src="{{ asset('/images/sliders/latest_arrival.svg') }}" class="d-block w-100" alt="...">
            <div class="row pt-3">
                <div class="col-md-12">
                    <h1>New Arrival 🎇🎇🎇</h1>
                    <div class="underline"></div>
                    <div class="row ">
                        <div class="col-md-4  owl-carousel owl-theme ">
                            @forelse ($newArrivalProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        @if ($productItem->quantity > 0)
                                            <label class="stock bg-success">In Stock</label>
                                        @else
                                            <label class="stock bg-danger">Out of Stock</label>
                                        @endif
                                        <div class="product-card-img d-flex justify-content-center p-3">

                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">₹{{ $productItem->selling_price }}</span>
                                                <span class="original-price">₹{{ $productItem->original_price }}</span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <div class="p-2">
                                        <h3>No Product Available</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="pb-5 bg-white">
        <div class="container ">
            <img src="{{ asset('/images/sliders/connect.svg') }}" class="d-block w-100" alt="...">
            {{-- <div class="social-banner">
                <p>Connect to people <br> like you.</p>
              
            </div> --}}  <a href="/feed" class="btn btn-warning social-banner-btn">Click to Connect</a>
        </div>
    </div>

@endsection

@section('script')
    <script>
        jQuery(document).ready(function() {
            jQuery('.owl-carousel ').owlCarousel({
                loop: true,
                margin: 10,
                // nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        });
    </script>
@endsection
