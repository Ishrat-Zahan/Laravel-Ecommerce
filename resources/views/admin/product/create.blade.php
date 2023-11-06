@extends('layouts.main')
@section('content')
@section('css')

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

@endsection

<div class="row">

    <table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
        <thead>
            <tr>
                <th colspan="2" class="text-center">
                    <h4 class="text-dark">Create Product</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <form id="productForm" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <tr>
                    <td>Name</td>
                    <td>
                        <input class="form-control" type="text" name="name">
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <input type="text" id="product-description" class="form-control" name="description" maxlength="255" aria-required="true">
                    </td>
                </tr>

                <tr>
                    <td>Product Type</td>
                    <td>
                        <select class="form-select" name="product_type" id="product_type">
                            <option value="physical">Physical</option>
                            <option value="digital">Digital</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="-1">Select</option>
                            @forelse ($categories as $k=>$v)
                            <option value="{{$k}}">{{$v}}</option>
                            @empty

                            @endforelse
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sub-Category</td>
                    <td>
                        <select class="form-select" name="subcategory_id" id="subcategory_id"></select>
                    </td>
                </tr>
                <tr>
                    <td>Sub-Sub-Category</td>
                    <td>
                        <select class="form-select" name="subsubcategory_id" id="subsubcategory_id"></select>
                    </td>
                </tr>

                <tr>
                    <td>Brand</td>
                    <td>
                        <select class="form-select" name="brand_id" id="brand_id">
                            <option value="-1">Select</option>
                            @forelse ($brands as $k=>$v)
                            <option value="{{$k}}">{{$v}}</option>
                            @empty

                            @endforelse
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Attribute</td>
                    <td>
                        <input class="form-control" type="text" name="attributes">
                    </td>
                </tr>

                <tr>
                    <td>SKU</td>
                    <td>
                        <input class="form-select" type="text" name="sku" required>
                    </td>
                </tr>

                <tr>
                    <td>Unit</td>
                    <td>
                        <select class="form-select" name="unit" id="unit">
                            <option value="kg">Kg</option>
                            <option value="pc">Pc</option>
                            <option value="gms">Gms</option>
                            <option value="itrs">Itrs</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>
                        <select name="colors[]" id="colorDropdown" class="js-example-basic-multiple form-control" multiple>
                            @forelse ($colors as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                            @empty
                            <option value="" disabled>No colors available</option>
                            @endforelse
                        </select>
                    </td>
                </tr>



                <tr>
                    <td>Images</td>
                    <td>
                        <input type="file" name="images[]" id="images" class="form-control" required multiple>
                    </td>
                </tr>


                <tr>
                    <td>Unit Price</td>
                    <td>
                        <input class="form-select" type="number" name="unit_price" required>
                    </td>
                </tr>
                <tr>
                    <td>Purches Price</td>
                    <td>
                        <input class="form-select" type="number" name="purchase_price" required>
                    </td>
                </tr>
                <tr>
                    <td>Selling Price</td>
                    <td>
                        <input class="form-select" type="number" name="selling_price" required>
                    </td>
                </tr>
                <tr>
                    <td>Total Quantity </td>
                    <td>
                        <input class="form-select" type="number" name="total_quantity" required>
                    </td>
                </tr>


                <tr>
                    <td>Minimum Quantity </td>
                    <td>
                        <input class="form-select" type="number" name="minimum_quantity" required>
                    </td>
                </tr>

                <tr>
                    <td>Shipping Cost </td>
                    <td>
                        <input class="form-select" type="number" step="0.01" name="shipping_cost" required>
                    </td>
                </tr>
                <tr>
                    <td>Discount </td>
                    <td>
                        <input class="form-select" type="number" step="0.01" name="discount" required>
                    </td>
                </tr>

                <tr>
                    <td>Discount Type </td>
                    <td>
                        <select class="form-select" name="discount_type" id="discount_type">
                            <option value="flat">Flat</option>
                            <option value="percent">Percent</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tax </td>
                    <td>
                        <input class="form-select" type="number" step="0.01" name="tax" required>
                    </td>
                </tr>

                <tr>
                    <td>Tax Model</td>
                    <td>
                        <select class="form-select" name="tax_model" id="tax_model">
                            <option value="include">Include</option>
                            <option value="exnclude">Exnclude</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Fetured</td>
                    <td>
                        <input value="1" type="checkbox" id="featured" class="form-check" name="featured">

                    </td>
                </tr>

                <tr>
                    <td>Search Tags</td>
                    <td>
                        <input class="form-select" type="text" name="search_tags">
                    </td>
                </tr>
                <tr>
                    <td>Meta Title </td>
                    <td>
                        <input class="form-select" type="text" name="meta_title">
                    </td>
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td>
                        <input class="form-select" type="text" name="meta_description">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input class="btn btn-primary mt-3" type="submit" value="Add Product">
                    </td>
                </tr>




        </tbody>
    </table>

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

    });

    // ....................................Dynamic Categories End......................................
</script>
@endsection