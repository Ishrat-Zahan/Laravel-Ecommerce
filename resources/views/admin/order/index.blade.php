@extends('layouts.main')
@section('content')


<div class="d-flex justify-content-between">
    <h2 class="text-dark">Order List</h2>

</div>


<div style="background-color: white;">

    <table class="table mt-3" style="border-spacing: 10px;">
        <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black; padding:20px;" class="">
            <tr>
                <th style="width:100px">SL</th>
                <th style="width:100px">user_id</th>
                <th style="width:200px">billing_address</th>
                <th style="width:200px">shipping_address</th>
                <th style="width:100px">total</th>
                <th style="width:100px">comment</th>
                <th style="width:100px">status</th>
                <th style="width:300px">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $row)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $row->user->name}}</td>
                <td>{{ $row->billing_address}}</td>
                <td>{{ $row->shipping_address}}</td>
                <td>{{ $row->total }}</td>
                <td>{{ $row->comment }}</td>
                <td>{{ $row->status }}</td>

                <td>
                    <a class="btn btn-outline-primary" href="{{route('order.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('order.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('order.destroy',$row->id)}}" method="post">
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