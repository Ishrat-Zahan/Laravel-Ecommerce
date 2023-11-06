@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row"> 

        <div class="col-md-12 pt-5">
            <div class="card ">
               
                <div class="card-body">
                    {{-- <a href="{{ route('order.create') }}" class="btn btn-success btn-sm" >
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New content
                    </a> --}}
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                
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
                                @foreach($order as $item)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->user_id}}</td>
                                    <td>{{ $item->billing_address}}</td>
                                    <td>{{ $item->shipping_address}}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('order.show', $item->id) }}" title="View content"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ route('order.edit', $item->id) }}" title="Edit content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ route('order.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline"  onsubmit="return confirm('Confirm delete?')">
                                          @csrf 
                                          @method('delete')
                                           
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete content">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection