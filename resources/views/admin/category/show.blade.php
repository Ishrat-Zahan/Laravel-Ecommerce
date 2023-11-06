@extends('layouts.main')

@section('content')

<table style="width: 50%; margin: auto; background-color:white; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" class="table table-bordered mt-4">
    <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black; ">
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Category Details</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">{{ $category->name }}</th>
        </tr>
        <tr>
            <th class="text-center">Slug</th>
            <th class="text-center">{{ $category->slug }}</th>
        </tr>
        <tr>
            <th class="text-center">Position</th>
            <th class="text-center">{{ $category->position }}</th>
        </tr>
        <tr>
            <th class="text-center">Priority</th>
            <th class="text-center">{{ $category->priority }}</th>
        </tr>
        <tr>
            <th class="text-center">Home Status</th>
            <th class="text-center">
                {{ $category->home_status ? 'Active' : 'Inactive' }}
            </th>
        </tr>
        <tr>
            <th class="text-center">Icon</th>
            <th class="text-center">
                <img src="{{ asset('storage/' . $category->icon) }}" alt="Category Icon" style="max-width: 150px;">
            </th>
        </tr>
     
    </tbody>
</table>

@endsection