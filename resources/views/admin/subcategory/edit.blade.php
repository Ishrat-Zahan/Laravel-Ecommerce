@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">
    <thead>
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Edit Subategory</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <tr>
                <td>Name</td>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $subcategory->name }}" required>
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select class="form-select" name="category_id" required>
                        <option value="-1">Select Category</option>
                        @foreach ($category as $row)
                        <option value="{{ $row->id }}" {{ $subcategory->category_id == $row->id ? 'selected' : '' }}>
                            {{ $row->name }}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Current Icon</td>
                <td>

                    @if($subcategory->icon && file_exists(public_path('storage/' . $subcategory->icon)))
                    <img src="{{ asset('storage/' . $subcategory->icon) }}" alt="subcategory icon" style="max-width: 100px; max-height: 100px; margin: 5px;">
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
                <td>Priority</td>
                <td>
                    <select name="priority" class="form-select" id="">
                        @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}" {{ old('priority', $subcategory->priority) == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-primary mt-3" type="submit" value="Update Subategory">
                </td>
            </tr>
        </form>
    </tbody>
</table>

@endsection