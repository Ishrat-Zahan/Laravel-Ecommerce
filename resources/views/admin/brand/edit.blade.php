@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Edit Brand</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $brand->name }}" required>
                </td>
            </tr>
            <tr>
                <td>Current Logo</td>
                <td>

                    @if($brand->logo && file_exists(public_path('storage/' . $brand->logo)))
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="brand logo" style="max-width: 100px; max-height: 100px; margin: 5px;">
                    @else
                    <p>No Logo found.</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>New Logo</td>
                <td>
                    <input type="file" name="logo" id="logo" class="form-control">

                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Update Brand">
                </td>
            </tr>

        </form>
    </tbody>
</table>

@endsection