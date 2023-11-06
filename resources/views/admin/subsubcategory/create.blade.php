@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Create Sub sub-Category</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('subsubcategory.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" required>
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
                <td>Priority</td>
                <td>
                    <select name="priority" class="form-select" id="">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Add Sub Sub-category">
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
            // alert(url);
            // alert(id);
            $.get(url, {}, function(d) {

                decorate_subcat(d);
            });


        })

    });
</script>

@endsection