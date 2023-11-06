@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-8">
        <div style="width: 50%; margin: auto; background-color: white; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" class="mt-4">
            <div style="background-color: #D2E9FB; color: black; padding: 10px; text-align: center;">
                <h2 class="text-dark">Product Details</h2>
            </div>
            <div style="padding: 10px;">
                <div>
                    <strong>Name:</strong> {{ $product->name }}
                </div>
                <div>
                    <strong>Description:</strong> {{ $product->description }}
                </div>
                <div>
                    <strong>Price:</strong> {{ $product->purchase_price }}
                </div>
                <div>
                    <strong>Color:</strong> {{ $product->color }}
                </div>
                <div>
                    <strong>Discount:</strong> {{ $product->discount }}
                </div>
                <div>
                    <strong>Shipping Cost:</strong> {{ $product->shipping_cost }}
                </div>
                <div>
                    <strong>Current Stock:</strong> {{ $product->total_quantity }}
                </div>
                <div>
                    <strong>Discount Type:</strong> {{ $product->discount_type }}
                </div>
                <div>
                    <strong>Tax:</strong> {{ $product->tax }}
                </div>
                <div>
                    <strong>Tax Model:</strong> {{ $product->tax_model }}
                </div>
                <div>
                    <strong>Search Tags:</strong> {{ $product->search_tags }}
                </div>
                <div>
                    <strong>Meta Title:</strong> {{ $product->meta_title }}
                </div>
                <div>
                    <strong>Meta Description:</strong> {{ $product->meta_description }}
                </div>
                <div>
                    <strong>Featured:</strong> {{ $product->featured ? 'Active' : 'Inactive' }}
                </div>
            </div>
        </div>


    </div>
    <div class="col-4 mt-5">

        <h2 class="text-dark text-center">Image of Product</h2>

        <div style="margin-top: 50px;">
            @forelse ($product->images as $image)
            <a href="{{asset('storage/'.$image->name)}}" data-lightbox="product-{{$product->id}}">
                <img src="{{asset('storage/'.$image->name)}}" width="180px" alt="" loading="lazy">
            </a>
            @empty
            <div class="alert alert-warning" role="alert">
                No Image Available
            </div>
            @endforelse
        </div>

    </div>
</div>

@endsection