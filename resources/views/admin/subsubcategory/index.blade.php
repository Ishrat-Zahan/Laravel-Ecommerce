@extends('layouts.main')
@section('content')



<div class="d-flex justify-content-between">
    <h2 class="text-dark">Sub Sub-category List</h2>
    <a href="{{route('subsubcategory.create')}}" class="btn btn-outline-dark"> + </a>
</div>


<div style="background-color: white;">
    <table class="table">

        <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black;">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Subcategory</th>
                <th scope="col">Priority</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($sscats as $row)
            <tr>

                <th scope="row">{{$row->id}}</th>
                <th scope="row">{{$row->name}}</th>
                <th scope="row">{{$row->category->name}}</th>
                <th scope="row">{{$row->subcategory->name}}</th>
                <th scope="row">{{$row->priority}}</th>



                <td>
                    <a class="btn btn-outline-primary" href="{{route('subsubcategory.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('subsubcategory.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('subsubcategory.destroy',$row->id)}}" method="post">
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
{{$sscats->onEachSide(2)->links()}}









@endsection