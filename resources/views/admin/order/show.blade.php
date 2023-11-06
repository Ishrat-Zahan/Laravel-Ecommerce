@extends('layouts.main')
@section('content')

<div class="card">

  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: {{$order->id}}</strong></p>
        </div>
        <div class="col-xl-3 float-end mb-2">
          <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
          <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</a>
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            <!-- <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i> -->
            <!-- <p class="pt-0">IShratZahan.com</p> -->
          </div>

        </div>


        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">From: <span style="color:#5B6BDC ;">Ishrat Zahan</span></li>
              <li class="text-muted">Amin Bazar</li>
              <li class="text-muted">Dhaka</li>
              <li class="text-muted"><i class="fas fa-phone"></i> 0179900000</li>
            </ul>
          </div>
          <div class="col-xl-4">

            <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">ID:</span>{{$order->id}}
              </li>

              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">Customer: </span>{{$order->user->name}}
              </li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">Email: </span>{{$order->user->email}}
              </li>

              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">Creation Date: </span>{{$order->created_at}}
              </li>

              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  {{$order->status}}</span>
              </li>

            </ul>
          </div>
        </div>

        <div class="row mt-5 my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#5B6BDC ;" class="text-white">



              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>

              </tr>
            </thead>
            <tbody>
              @forelse ($order->order_details as $item)

              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->product->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->product->selling_price}}</td>

              </tr>
              @empty

              @endforelse
            </tbody>

          </table>
        </div>
        <div class="row">
          <div class="col-xl-8">


          </div>
          <div class="col-xl-3">

            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">{{$order->total}}</span></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your purchase</p>
          </div>
          <div class="col-xl-2">

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection