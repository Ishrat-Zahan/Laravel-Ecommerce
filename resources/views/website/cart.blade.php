@extends('website.home');
@section('content');



<section class="banner-area organic-breadcrumb">
    <div class="container">
      <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
        <div class="col-first">
          <h1>Shopping Cart</h1>
          <nav class="d-flex align-items-center justify-content-start">
            <a href="index-2.html">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
            <a href="cart.html">Shopping Cart</a>
          </nav>
        </div>
      </div>
    </div>
</section>


 
  <div class="container">

    <table id="product_table" class="table table-responsive mb-5">

        <tr>

            <th>Name</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Item Total</th>
            <th>Action</th>
        </tr>
        <tbody id="dyn_tr">

        </tbody>
       

    </table>
    <hr>



    <div class="row">
        <div class="col-lg-8 col-md-6">
          <h3>Billing Address</h3>
          <input type="hidden" value="{{$userId}}" id="userid">
          <input type="text" id="billing_address" placeholder="Billing Address*"onfocus="this.placeholder=''"
          onblur="this.placeholder = 'Billing Address*'" required class="common-input">
          <input type="text" id="shipping_address" placeholder="Shipping Address" onfocus="this.placeholder=''"
          onblur="this.placeholder = 'Shipping Address*'" required class="common-input">

        </div>
        <div class="col-lg-4 col-md-6">
            <div class="order-wrapper mt-50">
                <h3 class="billing-title mb-10">Your Order</h3>
                <div class="order-list">
                  
                  <div class="list-row d-flex justify-content-between">
                    <h6>Total</h6>
                    <div class="grandtotal">


                    </div>
                  </div>
                  <div class="row mx-0 mb-2">
                    <div class="col-sm-4 p-0 d-inline">
                        <span style="color: #f6398d;font-weight: bold;" class="me-2 mr-2 mt-2">Comment</span>
                    </div>
                    <div class="col-sm-8 p-0">
                        <textarea name="comment" id="comment" class="form-control"></textarea>
                    </div>
                </div>
                
                  <button class="myorder view-btn color-2 w-100 mt-20"><span>Proceed to Checkout</span></button>
                </div>
              </div>
        </div>
      </div>
  </div>

    @endsection