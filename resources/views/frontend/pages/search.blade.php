@extends('layouts.app')
@section('title', 'New Arrival')
@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h1>Search results for :{{$searchKeyword}}</h1>
                    <div class="underline"></div>
                    <div class="row">
                            @forelse ($searchProducts as $productItem)
                                <div class="col-sm-12">
                                    <div class="product-card  d-flex">
                                        @if ($productItem->quantity > 0)
                                            <label class="stock bg-success">In Stock</label>
                                        @else
                                            <label class="stock bg-danger">Out of Stock</label>
                                        @endif
                                        <div class="product-card-img d-flex justify-content-center p-3 col-sm-3">
                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body col-sm-9">
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
                                        <h3>No Product Found</h3>
                                    </div>
                                </div>
                            @endforelse
                            {{-- <div  class=" text-center" >
                                <a href="{{'collections'}}"  class="btn btn-warning" > view more</a>
                            </div> --}}
                     
                    </div>
                    <div>
                        {{$searchProducts->appends(request()->input())->links()}}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('script')
    <script></script>
@endsection
