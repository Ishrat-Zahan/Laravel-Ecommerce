@extends('layouts.main')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID:</strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                class="fas fa-print text-primary"></i> Print</a>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <p class="pt-0">shop.com</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;">fahima akter</span></li>
                                <li class="text-muted">Street, City</li>
                                <li class="text-muted">State, Country</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Supplier: </span></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Creation Date: </span></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-warning text-black fw-bold">
                                    </span></li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div style="width: 100%;" class="d-flex justify-content-between mb-3">
                            <div>


                                <div class="input-icons">
                                    <i class="fa-solid fa-magnifying-glass icons"></i>
                                    <input id="psearch" class="form-control input-field" placeholder="Search product"
                                        type="search" required="">

                                </div>


                                {{-- <select id="supplier_id" class="form-select" name="supplier_id">
                                    <option value="-1">Select Product</option>
                                    @forelse ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                    @endforelse
                                    
                                </select> --}}

                            </div>

                            <div>
                                <select id="supplier_id" class="form-select" name="supplier_id">
                                    <option value="-1">Select Supplier</option>
                                    @forelse ($supplier as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                    @endforelse


                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">



                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">subtotal</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody id="dyn_tr">



                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">


                        </div>
                        <div class="col-xl-3">

                            <p class="text-black float-start">
                                <span class="text-black me-3">Total Amount:</span>
                                <span class="grandtotal" style="font-size: 18px;"></span>
                            </p>
                        </div>
                    </div>

                    <hr>
                    <div style="margin-bottom: 100px;" class="d-flex justify-content-between">
                        <a id="purchesBtn" href="#" class="btn btn-bold px-4 float-right mt-3 mt-lg-0"
                            style="background-color:#84B0CA;">Proceed Purches</a>
                    </div>
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
        $("#psearch").autocomplete({
            source: "{{ url('searchbox') }}",
            minLength: 1,
            select: function(event, ui) {
                // console.log(ui)

                var html = "";
                html += "<tr>";
                html += "<td class='product_id'>" + ui.item.id + "</td>";
                html += "<td>" + ui.item.label + "</td>";
                html += "<td><input value='1' class='qu w-25 form-control' type='number'></td>";

                html += "<td class='price'>" + ui.item.price + "</td>";

                html += "<td class='itemtotal'>" + ui.item.price + "</td>";

                html += '<td><a href="#" class="deleteproduct btn" data-id="' + ui.item.id +
                    '" style="background-color:#84B0CA;"><i class="fa-solid fa-trash"></i></a></td>';

                html += "</tr>";

                $('#dyn_tr').append(html);
                $("#psearch").val("").focus();
                updateTotal();

            }
        });


        $(document).on('click', '.deleteproduct', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });


        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }


        $(document).on('blur change keyup', '.qu', function() {
            var $row = $(this).closest('tr');

            var qty = $row.find('.qu').val();
            var price = $row.find('.price').text();
            var itemtotal = qty * price;

            // console.log(itemtotal);

            $row.find('.itemtotal').text(financial(itemtotal));
            updateTotal();
        });



        function updateTotal() {

            var grandtotal = 0;
            $('.itemtotal').each(function() {
                grandtotal += parseFloat($(this).text());
            });

            $('.grandtotal').text(grandtotal);
        }


        $(document).on('click', '#purchesBtn', function() {

            var supplier_id = $('#supplier_id').val();


            var purches = [];
            $('.product_id').each(function() {
                var product_id = $(this).text();
                var qty = $(this).closest('tr').find('.qu').val();
                purches.push({
                    product_id: product_id,
                    qty: qty
                });
            });

            // console.log(purches,supplier_id);

            $.ajax({
                url: "{{ route('purches.store') }}",
                type: 'post',
                data: {
                    purches: purches,
                    supplier_id: supplier_id,
                    grandtotal: $('.grandtotal').text(),

                },
              
                
                success: function(response) {
                    // console.log(response);
                    // alert(response.message);
                    Swal.fire({
                        position: 'top-corner',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 30000,
                        customClass: {
                            container: 'custom-swal-container',
                        },
                    });
                    location.reload();
                }
            });
        })
    </script>
@endsection
