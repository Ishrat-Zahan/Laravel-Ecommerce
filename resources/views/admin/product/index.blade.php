@extends('layouts.main')
@section('content')

<div class="d-flex justify-content-between">

    <h2 class="text-dark" >Product List</h2>
    <a href="{{route('product.create')}}" class="btn btn-outline-dark m-3"> +  </a>

</div>


<div style="background-color: white;">

    <table class="table mt-3">
        <thead style="background-color: #D2E9FB; color:black; border-top: 1px solid black; border-bottom: 1px solid black;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Subcategory</th>
                <th scope="col">Sub subcategory</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Featured</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($product as $row)
            <tr>

                <td scope="row">{{$row->id}}</td>
                <td scope="row">{{$row->name}}</td>
                <td scope="row">{{$row->category->name}}</td>
                <td scope="row">{{$row->subcategory->name}}</td>
                <td scope="row">{{$row->subsubcategory->name}}</td>


                <!-- <td style="width: 100px; height: 100px; text-align: center;">
                    @forelse ($row->images as $image)

                    <img style="width: 100%; height: 100%; object-fit: contain;" src="{{asset('storage/'.$image->name)}}" alt="">
                    @empty
                    <div class="alert alert-warning" role="alert">
                        No Image Available
                    </div>
                    @endforelse
                </td> -->

                <td>
                    @forelse ($row->images as $image)
                    <a href="{{asset('storage/'.$image->name)}}" data-lightbox="product-{{$row->id}}">
                        <img src="{{asset('storage/'.$image->name)}}" width="70px" alt="" loading="lazy">
                    </a>
                    @empty
                    <div class="alert alert-warning" role="alert">
                        No Image Available
                    </div>
                    @endforelse
                </td>

                <td scope="row">{{$row->purchase_price}}</td>

                <th>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" {{ $row->featured == 1 ? 'checked' : '' }}>

                    </div>
                </th>


                <td>
                    <a class="btn btn-outline-primary" href="{{route('product.edit',$row->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a class="btn btn-outline-success" href="{{route('product.show',$row->id)}}"><i class="fa-solid fa-eye"></i></a>

                    <form class="d-inline" onsubmit="return confirm('Are you sure?')" action="{{route('product.destroy',$row->id)}}" method="post">
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

{{ $product->links() }}

@endsection