@extends('layouts.main')
@section('content')



<div class=" d-flex justify-content-between">
    <h2 class="text-dark">Banner List</h2>
    <a href="{{route('shortbanner.create')}}" class="btn btn-outline-dark"> + </a>
</div>


<div style="background-color: white;">
    <table class="table mt-3">

        <thead style="background-color: #D2E9FB; color: black; border-top: 1px solid black; border-bottom: 1px solid black;">
            <tr>
                <th scope="col" style="padding: 20px;">ID</th>
                <th scope="col" style="padding: 20px;">Image</th>
                <th scope="col" style="padding: 20px;">Banner Type</th>
                <th scope="col" style="padding: 20px;">Banner Title</th>
                <th scope="col" style="padding: 20px;">Status</th>
                <th scope="col" style="padding: 20px;">Url</th>
                <th scope="col" style="padding: 20px;">Discount</th>
                <th scope="col" style="padding: 20px;">Bg Color</th>
                <th scope="col" style="padding: 20px;">Button Text</th>
                <th scope="col" style="padding: 20px;">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($sbanner as $row)
            <tr>

                <td scope="row">{{$row->id}}</td>
                <td style="width: 150px; height: 120px; text-align: center; padding: 10px;">
                    <img style="width: 100%; height: 100%; object-fit: contain;" src="{{asset('storage/')}}/{{$row->image}}" alt="">
                </td>


                <td scope="row">{{$row->banner_type}}</td>
                <td scope="row">{{$row->banner_title}}</td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" {{ $row->status == 1 ? 'checked' : '' }}>

                    </div>
                </td>
                <td scope="row">{{$row->url}}</td>
                <td scope="row">{{$row->discount}}</td>
                <td scope="row">{{$row->bg_color}}</td>
                <td scope="row">{{$row->btn_text}}</td>



                <td>
                    <a class="btn btn-outline-primary" href="{{route('shortbanner.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('shortbanner.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('shortbanner.destroy',$row->id)}}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-outline-danger" name="delete"><i class='fa-solid fa-trash'></i></button>
                    </form>

                </td>

            </tr>


            @empty

            @endforelse

        </tbody>
    </table>
</div>
<hr>




@endsection