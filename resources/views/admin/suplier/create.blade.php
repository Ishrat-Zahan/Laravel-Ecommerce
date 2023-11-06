@extends('layouts.main')
@section('content')


<table style="width: 50%; margin: auto;" class="table table-bordered mt-4">

  <thead>

    <tr>

      <th colspan="2" class="text-center">
        <h2 class="text-dark">Add New Supplier</h2>
      </th>

    </tr>
  </thead>


  <tbody>

    <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">

      @csrf

      <tr>

        <td>Name</td>
        <td>
          <input class="form-control" type="text" name="name" required>
        </td>

      </tr>

      <tr>

        <td>Email</td>
        <td>
          <input type="email" name="email" id="email" class="form-control">
        </td>

      </tr>

      <tr>

        <td>Phone</td>
        <td>
          <input type="text" name="phone" id="phone" class="form-control"></br>
        </td>

      </tr>

      <tr>

        <td colspan="2">
          <input class="btn btn-primary mt-3" type="submit" value="Add Supplier">
        </td>

      </tr>

    </form>

  </tbody>

</table>

@endsection