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
                <h2 class="text-dark">Create New Banner</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('shortbanner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>Banner URL</td>
                <td>
                    <input class="form-control" type="url" name="url" required>
                </td>

            </tr>

            <tr>
                <td>Banner Type</td>
                <td>
                    <select name="banner_type" class="form-select" id="">
                        <option value="main_banner">Main Banner</option>
                        <option value="main_section_banner">Main Section Banner</option>
                        <option value="sidebar_banner">Sidebar Banner</option>
                        <option value="top_sidebar">Top Sidebar Banner</option>
                        <option value="top_sidebar">Top Sidebar Banner</option>
                        <option value="header_banner">Header Banner</option>
                        <option value="popup_banner">Popup Banner</option>
                        <option value="footer_banner">Footer Banner</option>

                    </select>
                </td>
            </tr>

            <tr>
                <td> Banner Title</td>
                <td>
                    <input class="form-control" type="text" name="banner_title" required>
                </td>

            </tr>

            <tr>
                <td> Btn Text</td>
                <td>
                    <input class="form-control" type="text" name="btn_text" required>
                </td>

            </tr>
            <tr>
                <td>Bg Color</td>
                <td>
                    <select name="bg_color" id="colorDropdown" class="js-example-basic-multiple form-control" multiple>
                        @forelse ($colors as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @empty
                        <option value="" disabled>No colors available</option>
                        @endforelse
                    </select>
                </td>
            </tr>


            <tr>
                <td>Image</td>
                <td>
                    <input type="file" name="image" id="image" class="form-control" required>
                </td>
            </tr>
            <tr>

                <td>Status</td>
                <td>
                    <input value="1" type="checkbox" id="active" class="form-check" name="status">
                </td>
            </tr>
            <tr>
                <td>Discount </td>
                <td>
                    <input class="form-select" type="number"  name="discount" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Add Banner">
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