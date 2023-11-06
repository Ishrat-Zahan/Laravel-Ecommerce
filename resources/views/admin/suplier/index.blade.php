@extends('layouts.main')
@section('content')

<div class=" d-flex justify-content-between">
    <h2 class="text-dark">Supplier List</h2>
    <a href="{{route('supplier.create')}}" class="btn btn-outline-dark"> + </a>
</div>


<div style="background-color: white;">
    <table class="table mt-3">

        <thead style="background-color: #D2E9FB; color: black; border-top: 1px solid black; border-bottom: 1px solid black;">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone }}</td>


                <td>
                    <a class="btn btn-outline-primary" href="{{route('supplier.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('supplier.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('supplier.destroy',$row->id)}}" method="post">
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