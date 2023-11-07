@extends('layouts.main')
@section('content')


<div class="d-flex justify-content-between">
    <h2 class="text-dark">Purches List</h2>

</div>


<div style="background-color: white;">

    <table class="table mt-3" style="border-spacing: 10px;">
        <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black; padding:20px;" class="">
            <tr>
                <th style="width:100px">SL</th>
                <th style="width:100px">Supplier</th>
                <th style="width:100px">total</th>
                <th style="width:300px">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purches as $row)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $row->supplier->name}}</td>
                <td>{{ $row->total }}</td>


                <td>
                    <a class="btn btn-outline-primary" href="{{route('purches.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('purches.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('purches.destroy',$row->id)}}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-outline-danger" name="delete"><i class='fa-solid fa-trash'></i></button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection