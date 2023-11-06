@extends('layouts.main')

@section('content')

<table style="width: 50%; margin: auto; background-color:white; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" class="table table-bordered mt-4">
    <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Subategory Details</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">{{ $subcategory->name }}</th>
        </tr>
        <tr>
            <th class="text-center">Category</th>
            <th class="text-center">{{ $subcategory->category->name }}</th>
        </tr>
        <tr>
            <th class="text-center">Priority</th>
            <th class="text-center">{{ $subcategory->priority }}</th>
        </tr>
        <tr>
            <th class="text-center">Icon</th>
            <th class="text-center">
                <img src="{{ asset('storage/' . $subcategory->icon) }}" alt="subcategory Icon" style="max-width: 150px;">
            </th>
        </tr>

    </tbody>
</table>

@endsection