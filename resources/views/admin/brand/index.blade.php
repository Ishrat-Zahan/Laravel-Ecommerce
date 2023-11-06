@extends('layouts.main')
@section('content')



<div class="d-flex justify-content-between">
    <h2 class="text-dark">Brand List</h2>
    <a href="{{route('brand.create')}}" class="btn btn-outline-dark"> + </a>
</div>


<div style="background-color: white;">
    <table class="table mt-3" style="border-spacing: 10px;">
        <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black; padding:20px;" class="">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Logo</th>
                <th scope="col"></th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($brand as $row)
            <tr>

                <th scope="row">{{$row->id}}</th>
                <td scope="row">{{$row->name}}</td>
             

                <td style="width: 100px; height: 120px; text-align: center; padding-right: 10px; ">
                    <img style="width: 100%; height: 100%; object-fit: contain;" src="{{asset('storage/')}}/{{$row->logo}}" alt="">
                </td>
                <td scope="row"></td>



                <td>
                    <a class="btn btn-outline-primary" href="{{route('brand.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('brand.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('brand.destroy',$row->id)}}" method="post">
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
{{$brand->onEachSide(2)->links()}}









@endsection