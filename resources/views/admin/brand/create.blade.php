@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Add New Brand</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" required>
                </td>

            </tr>

            <tr>
                <td>Logo</td>
                <td>
                    <input type="file" name="logo" id="logo" class="form-control" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Add Brand">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection