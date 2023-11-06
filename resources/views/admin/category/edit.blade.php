@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Edit Category</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}" required>
                </td>
            </tr>
            <tr>
                <td>Slug</td>
                <td>
                    <input class="form-control" type="text" name="slug" value="{{ $category->slug }}" required>
                </td>
            </tr>
            <tr>
                <td>Current Icon</td>
                <td>

                    @if($category->icon && file_exists(public_path('storage/' . $category->icon)))
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Category icon" style="max-width: 100px; max-height: 100px; margin: 5px;">
                    @else
                    <p>No Icon found.</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>New Icon</td>
                <td>
                    <input type="file" name="icon" id="icon" class="form-control">

                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="position" class="form-select" id="">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" {{ old('position', $category->position) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
            </tr>

            <tr>
                <td>Priority</td>
                <td>
                    <select name="priority" class="form-select" id="">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" {{ old('priority', $category->priority) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
            </tr>
            <tr>
                <td>Home Status</td>
                <td>
                    <input class="form-control" type="text" name="home_status" value="{{ $category->home_status }}" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Update Category">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection