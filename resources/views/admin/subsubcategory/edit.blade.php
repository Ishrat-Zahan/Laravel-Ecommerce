@extends('layouts.main')
@section('content')

<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Edit Sub sub-category</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('subsubcategory.update', $subsubcategory->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $subsubcategory->name }}" required>
                </td>
            </tr>

            <tr>
                <td>Category</td>
                <td>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="-1">Select</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $subsubcategory->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Sub-Category</td>
                <td>
                    <select class="form-select" name="subcategory_id" id="subcategory_id">
                        @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" @if ($subcategory->id == $subsubcategory->subcategory_id) selected @endif>{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Priority</td>
                <td>
                    <select name="priority" class="form-select">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" @if ($i==$subsubcategory->priority) selected @endif>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Update Sub Sub-category">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection

@section('script')
<script>
    function decorate_subcat(d) {

        // console.log(d);
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

            // alert(id);
            $.get(url, {}, function(d) {

                decorate_subcat(d);
            });


        })

    });
</script>
@endsection