@extends('layouts.main')

@section('content')

<table style="width: 50%; margin: auto; background-color: white; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" class="table table-bordered mt-4">
    <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Sub sub-category Details</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">{{ $subsubcategory->name }}</th>
        </tr>
        <tr>
            <th class="text-center">Category</th>
            <th class="text-center">{{ $subsubcategory->category->name }}</th>
        </tr>
        <tr>
            <th class="text-center">Subcategory</th>
            <th class="text-center">{{ $subsubcategory->subcategory->name }}</th>
        </tr>
        <tr>
            <th class="text-center">Priority</th>
            <th class="text-center">{{ $subsubcategory->priority }}</th>
        </tr>
    </tbody>
</table>

@endsection