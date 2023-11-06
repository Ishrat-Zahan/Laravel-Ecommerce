@extends('layouts.main')

@section('content')

@section('css')
<style>
    .color-swatch {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }

    .color-swatch-text {
        color: #000;
    }
</style>
@endsection

<div class="row">
    <div style="width: 50%; margin: auto;" class="mt-4">
        <h4 class="text-dark text-center">Edit Product</h4>

        <form id="productForm" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use the PUT method for updating -->

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
            </div>

            <div class="form-group">
                <label for="product_type">Product Type</label>
                <select class="form-control" id="product_type" name="product_type">
                    <option value="physical" {{ $product->product_type === 'physical' ? 'selected' : '' }}>Physical</option>
                    <option value="digital" {{ $product->product_type === 'digital' ? 'selected' : '' }}>Digital</option>
                </select>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="-1">Select</option>
                    @foreach ($categories as $k => $v)
                    <option value="{{ $k }}" {{ $k == $product->category_id ? 'selected' : '' }}>{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="">Sub-Category</label>

                <select class="form-select" name="subcategory_id" id="subcategory_id">
                    @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if ($subcategory->id == $product->subcategory_id)
                        selected
                        @endif
                        >{{ $subcategory->name }}</option>
                    @endforeach
                </select>

            </div>
            
            <div>
                <label for="">Sub-SubCategory</label>

                <select class="form-select" name="subsubcategory_id" id="subsubcategory_id">
                    @foreach ($subsubcategories as $subsubcategory)
                    <option value="{{ $subsubcategory->id }}" @if ($subsubcategory->id == $product->subcategory_id)
                        selected
                        @endif

                        >{{ $subsubcategory->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select class="form-control" id="brand_id" name="brand_id">
                    <option value="-1">Select</option>
                    @foreach ($brands as $k => $v)
                    <option value="{{ $k }}" {{ $k == $product->brand_id ? 'selected' : '' }}>{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="attributes">Attribute</label>
                <input type="text" class="form-control" id="attributes" name="attributes" value="{{ $product->attributes }}">
            </div>

            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku }}">
            </div>

            <div class="form-group">
                <label for="unit">Unit</label>
                <select class="form-control" id="unit" name="unit">
                    <option value="kg" {{ $product->unit === 'kg' ? 'selected' : '' }}>Kg</option>
                    <option value="pc" {{ $product->unit === 'pc' ? 'selected' : '' }}>Pc</option>
                    <option value="gms" {{ $product->unit === 'gms' ? 'selected' : '' }}>Gms</option>
                    <option value="itrs" {{ $product->unit === 'itrs' ? 'selected' : '' }}>Itrs</option>
                </select>
            </div>

            <div class="form-group">
                <label for="colorDropdown">Color</label>
                <select name="colors[]" id="colorDropdown" class="js-example-basic-multiple form-control" multiple>
                    @foreach ($colors as $k => $v)
                    @php
                    $selectedColors = json_decode($product->color, true); // Decode as an array
                    $isSelected = is_array($selectedColors) && in_array($k, $selectedColors);
                    @endphp
                    <option value="{{ $k }}" {{ $isSelected ? 'selected' : '' }}>{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <div class="form-label">Images</div>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                <hr>
                @if ($product && $product->images)
                @forelse ($product?->images as $img)
                <div class="d-inline-block position-relative p-3">
                    <img src="{{asset('storage/'.$img->name)}}" width="100px" alt="" loading="lazy">
                    <span data-id="{{$img->id}}" style="right:-10px;top:15px" class="pimage position-absolute translate-middle badge rounded-pill bg-danger" title="delete image">&times;</span>
                </div>
                @empty

                @endforelse
                @endif
            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input type="number" class="form-control" id="unit_price" name="unit_price" value="{{ $product->unit_price }}">
            </div>

            <div class="form-group">
                <label for="purchase_price">Purchase Price</label>
                <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="{{ $product->purchase_price }}">
            </div>
            <div class="form-group">
                <label for="selling_price">Selling Price</label>
                <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ $product->selling_price }}">
            </div>

            <div class="form-group">
                <label for="total_quantity">Total Quantity</label>
                <input type="number" class="form-control" id="total_quantity" name="total_quantity" value="{{ $product->total_quantity }}">
            </div>

            <div class="form-group">
                <label for="minimum_quantity">Minimum Quantity</label>
                <input type="number" class="form-control" id="minimum_quantity" name="minimum_quantity" value="{{ $product->minimum_quantity }}">
            </div>

            <div class="form-group">
                <label for="shipping_cost">Shipping Cost</label>
                <input type="number" step="0.01" class="form-control" id="shipping_cost" name="shipping_cost" value="{{ $product->shipping_cost }}">
            </div>

            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="{{ $product->discount }}">
            </div>

            <div class="form-group">
                <label for="discount_type">Discount Type</label>
                <select class="form-select" name="discount_type" id="discount_type">
                    <option value="flat" {{ $product->discount_type === 'flat' ? 'selected' : '' }}>Flat</option>
                    <option value="percent" {{ $product->discount_type === 'percent' ? 'selected' : '' }}>Percent</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tax">Tax</label>
                <input class="form-control" type="number" step="0.01" name="tax" value="{{ $product->tax }}" required>
            </div>

            <div class="form-group">
                <label for="tax_model">Tax Model</label>
                <select class="form-select" name="tax_model" id="tax_model">
                    <option value="include" {{ $product->tax_model === 'include' ? 'selected' : '' }}>Include</option>
                    <option value="exclude" {{ $product->tax_model === 'exclude' ? 'selected' : '' }}>Exclude</option>
                </select>
            </div>

            <div class="form-group">
                <label for="featured">Featured</label>
                <input class="form-control" type="text" name="featured" value="{{ $product->featured }}">
            </div>


            <div class="form-group">
                <label for="search_tags">Search Tags</label>
                <input class="form-control" type="text" name="search_tags" value="{{ $product->search_tags }}">
            </div>

            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input class="form-control" type="text" name="meta_title" value="{{ $product->meta_title }}">
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <input class="form-control" type="text" name="meta_description" value="{{ $product->meta_description }}">
            </div>


            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    // ....................................Color Start......................................

    $(document).ready(function() {
        $('#colorDropdown').select2({
            templateResult: function(data) {
                if (!data.id) {
                    return data.text;
                }
                var color = data.id;
                var $option = $(
                    `<span class="color-swatch" style="background-color: ${color};">
                    </span><span class="color-swatch-text">${data.text}</span>`
                );
                return $option;
            }
        });

        $('#colorDropdown').on('change', function() {
            var selectedColors = $(this).val();
            var displayDiv = $('#selectedColors');


            displayDiv.empty();
            if (selectedColors) {
                selectedColors.forEach(function(color) {
                    displayDiv.append(
                        `<span class="color-swatch" style="background-color: ${color};"></span>`
                    );
                });
            }
        });
    });

    // ....................................Color End......................................


    // ....................................Dynamic Categories Start......................................

    function decorate_subcat(d) {
        $h = "<option value='-1'>Select</option>";
        for (const k in d) {
            $h += "<option value='" + k + "'>" + d[k] + "</option>";
        }
        $("#subcategory_id").html($h);
    }

    $(document).ready(function() {
        $("#category_id").change(function() {
            let id = $(this).val();

            if (id == "-1") {
                return;
            }
            let url = "{{url('getsubcat')}}/" + id;
            $.get(url, {}, function(d) {

                decorate_subcat(d);
            });

        })

    });


    function decorate_subsubcat(d) {
        $h = "<option value='-1'>Select</option>";
        for (const k in d) {
            $h += "<option value='" + k + "'>" + d[k] + "</option>";
        }
        $("#subsubcategory_id").html($h);
    }

    $(document).ready(function() {
        $("#subcategory_id").change(function() {
            let id = $(this).val();

            if (id == "-1") {
                return;
            }
            let url = "{{url('getsubsubcat')}}/" + id;
            $.get(url, {}, function(d) {

                decorate_subsubcat(d);
            });

        })
        // ....................................Dynamic Categories End......................................


        // ....................................Image Remove......................................

        $(".pimage").click(function() {
            $t = $(this);
            // alert($(this).data('id'));
            $.ajax({
                type: "post",
                url: "{{url('del_img')}}",
                data: {
                    id: $t.data('id')
                },
                dataType: "json",
                success: function(response) {
                    if (response.type = "info") {
                        Swal.fire(
                            'Message!',
                            response.message,
                            response.type
                        ).then(function() {
                            location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Message!',
                            response.message,
                            response.type
                        )
                    }
                    //console.log(response);

                }
            });

        })

    });
</script>

@endsection