@extends('layouts.main')
@section('content')

<div class="card">

  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #5B6BDC;font-size: 20px;">Purches Invoice >> <strong>ID: {{$purches->id}}</strong></p>
        </div>
        <div class="col-xl-3 float-end mb-2">
          <a onclick="printPage()" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
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


            <p class="text-muted">From:</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">ID:</span>{{$purches->id}}
              </li>

              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">Supplier: </span>{{$purches->supplier->name}}
              </li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">Email: </span>{{$purches->supplier->email}}
              </li>

              <li class="text-muted"><i class="fas fa-circle" style="color:#5B6BDC ;"></i> <span class="fw-bold">Creation Date: </span>{{$purches->created_at}}
              </li>

          </div>
          <div class="col-xl-4">

            <ul class="list-unstyled">
              <li class="text-muted">To: <span style="color:#5B6BDC ;">Ishrat Zahan</span></li>
              <li class="text-muted">Amin Bazar</li>
              <li class="text-muted">Dhaka</li>
              <li class="text-muted"><i class="fas fa-phone"></i> 0179900000</li>
            </ul>





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
                <th scope="col">Subtotal</th>

              </tr>
            </thead>
            <tbody>
              @forelse ($purches->purchesdetails as $row)

              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$row->product->name}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{$row->product->selling_price}}</td>
                <td>{{$row->product->selling_price * $row->quantity}}</td>
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

            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">{{$purches->total}}</span></p>
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

@section('script')

<script>
  function printPage() {
    window.print();
  }
</script>

@endsection