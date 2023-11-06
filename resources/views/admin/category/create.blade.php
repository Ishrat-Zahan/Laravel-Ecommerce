@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Create New Category</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" required>
                </td>

            </tr>
            <tr>
                <td>Slug</td>
                <td>
                    <input class="form-control" type="text" name="slug" required>
                </td>

            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="position" class="form-select" id="">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
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
                <td>Icon</td>
                <td>
                    <input type="file" name="icon" id="icon" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>Home Status</td>
                <td>
                    <input value="1" type="checkbox" id="active" class="form-check" name="home_status">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Add Category">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection