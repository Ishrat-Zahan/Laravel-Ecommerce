@extends('layouts.main')

@section('content')

<table style="width: 50%; margin: auto; background-color:white; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;" class="table table-bordered mt-4">
    <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th colspan="2" class="text-center">
                <h2 class="text-dark">Banner Details</h2>
            </th>
        </tr>
    </thead>
    <tbody>
      
        <tr>
            <th class="text-center">Image</th>
            <th class="text-center">
                <img src="{{ asset('storage/' . $shortbanner->image) }}" alt="shortbanner image" style="max-width: 150px;">
            </th>
        </tr>

        <tr>
            <th class="text-center">Banner Type</th>
            <th class="text-center">{{ $shortbanner->banner_type }}</th>
        </tr>
        
        <tr>
            <th class="text-center">Status</th>
            <th class="text-center">
                {{ $shortbanner->status ? 'Active' : 'Inactive' }}
            </th>
        </tr>
        <tr>
            <th class="text-center">Banner URL</th>
            <th class="text-center">{{ $shortbanner->url }}</th>
        </tr>
        <tr>
            <th class="text-center">Banner Title</th>
            <th class="text-center">{{ $shortbanner->banner_title }}</th>
        </tr>
        <tr>
            <th class="text-center">BG Color</th>
            <th class="text-center">{{ $shortbanner->bg_color }}</th>
        </tr>
        <tr>
            <th class="text-center">Button Text</th>
            <th class="text-center">{{ $shortbanner->btn_text }}</th>
        </tr>
        <tr>
            <th class="text-center">Discount</th>
            <th class="text-center">{{ $shortbanner->discount }}</th>
        </tr>
    </tbody>
</table>

@endsection