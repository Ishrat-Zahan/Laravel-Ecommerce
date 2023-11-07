@extends('website.home')
@section('content')

<div style="margin-top: 90px; margin-bottom:100px;" class="container">
    <div class="product-quick-view">
        <div class="row align-items-center">
            <div class="col-lg-6">
                @forelse ($details->images as $image)
                <a href="{{asset('storage/'.$image->name)}}" data-lightbox="product-{{$image->id}}">
                    <img src="{{ asset('storage/' . $image->name) }}" alt="Image" width="200px" height="200px">
                </a>
                @empty
                <div class="alert alert-warning" role="alert">
                    No Image Available
                </div>
                @endforelse
            </div>
            <div class="col-lg-6">
                <div class="quick-view-content">
                    <div class="top">
                        <h3 class="head">{{$details->name}}</h3>
                        <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">{{$details->selling_price}}</span></div>
                        <div class="category">Category: <span>{{$details->category->name}}</span></div>
                        <div class="available">Availibility: <span>In Stock</span></div>
                    </div>
                    <div class="middle">
                        <p class="content">{{$details->description}}</p>
                    </div>
                    <div>
                      
                        <div class="d-flex mt-20">
                            <a href="javascript:void(0)" data-product-id="{{$details->id}}"  class="view-btn color-2 lnr lnr-cart"><span>Add to Cart</span></a>
                            <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                            <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection