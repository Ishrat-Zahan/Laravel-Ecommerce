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


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Edit Banner</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('shortbanner.update', $shortbanner->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <tr>
                <td>Banner Type</td>
                <td>
                    <select name="banner_type" class="form-select">
                        <option value="main_banner" {{ $shortbanner->banner_type == 'main_banner' ? 'selected' : '' }}>Main Banner</option>
                        <option value="main_section_banner" {{ $shortbanner->banner_type == 'main_section_banner' ? 'selected' : '' }}>Main Section Banner</option>
                        <option value="sidebar_banner" {{ $shortbanner->banner_type == 'sidebar_banner' ? 'selected' : '' }}>Sidebar Banner</option>
                        <option value="top_sidebar" {{ $shortbanner->banner_type == 'top_sidebar' ? 'selected' : '' }}>Top Sidebar Banner</option>
                        <option value="header_banner" {{ $shortbanner->banner_type == 'header_banner' ? 'selected' : '' }}>Header Banner</option>
                        <option value="popup_banner" {{ $shortbanner->banner_type == 'popup_banner' ? 'selected' : '' }}>Popup Banner</option>
                        <option value="footer_banner" {{ $shortbanner->banner_type == 'footer_banner' ? 'selected' : '' }}>Footer Banner</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>BG Color</td>
                <td>
                    <select name="bg_color" id="colorDropdown" class="js-example-basic-multiple form-control">
                        @foreach ($colors as $k => $v)
                        <option value="{{ $k }}" {{ $shortbanner->bg_color == $k ? 'selected' : '' }}>{{ $v }}</option>
                        @endforeach
                    </select>

                </td>
            </tr>


            <tr>
                <td>Current Image</td>
                <td>

                    @if($shortbanner->image && file_exists(public_path('storage/' . $shortbanner->image)))
                    <img src="{{ asset('storage/' . $shortbanner->image) }}" alt="shortbanner image" style="max-width: 100px; max-height: 100px; margin: 5px;">
                    @else
                    <p>No Image found.</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>New Image</td>
                <td>
                    <input type="file" name="image" id="image" class="form-control">

                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input class="form-control" type="text" name="status" value="{{ $shortbanner->status }}">
                </td>

            </tr>


            <tr>
                <td>URL</td>
                <td>
                    <input class="form-control" type="url" name="url" value="{{ $shortbanner->url }}">
                </td>
            </tr>
            <tr>
                <td>Banner Title</td>
                <td>
                    <input class="form-control" type="text" name="banner_title" value="{{ $shortbanner->banner_title }}">
                </td>
            </tr>

            <tr>
                <td>Button Text</td>
                <td>
                    <input class="form-control" type="text" name="btn_text" value="{{ $shortbanner->btn_text }}">
                </td>
            </tr>
            <tr>
                <td>Discount</td>
                <td>
                    <input type="number" class="form-control" id="discount" name="discount" value="{{ $shortbanner->discount }}">
                </td>
            </tr>


           
            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Update Banner">
                </td>
            </tr>
        </form>
    </tbody>
</table>

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
</script>
@endsection