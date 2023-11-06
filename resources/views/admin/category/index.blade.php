@extends('layouts.main')
@section('content')



<div class="d-flex justify-content-between">
    <h2 class="text-dark">Category List</h2>
    <a href="{{route('category.create')}}" class="btn btn-outline-dark"> + </a>
</div>


<div style="background-color: white;">
    <table class="table mt-3">

        <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black;" class="">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Icon</th>
                <th scope="col">Priority</th>
                <th scope="col">Position</th>
                <th scope="col">Home Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($category as $row)
            <tr>

                <th scope="row">{{$row->id}}</th>
                <th scope="row">{{$row->name}}</th>
                <th scope="row">{{$row->slug}}</th>
                <td style="width: 100px; height: 100px; text-align: center;">
                    <img style="width: 100%; height: 100%; object-fit: contain;" src="{{asset('storage/')}}/{{$row->icon}}" alt="">
                </td>
                <th scope="row">{{$row->priority}}</th>
                <th scope="row">{{$row->position}}</th>
                <th>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" {{ $row->home_status == 1 ? 'checked' : '' }}>

                    </div>
                </th>


                <td>
                    <a class="btn btn-outline-primary" href="{{route('category.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('category.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('category.destroy',$row->id)}}" method="post">
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
{{ $category->links() }}









@endsection