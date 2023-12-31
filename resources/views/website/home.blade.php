<!DOCTYPE html>
<html lang="zxx" class="no-js">

<!-- Mirrored from preview.colorlib.com/theme/shop/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Apr 2023 15:51:06 GMT -->

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('assets/img/fav.html') }}">

    <meta name="author" content="CodePixar">

    <meta name="description" content="">

    <meta name="keywords" content="">

    <meta charset="UTF-8">

    <title>Shop</title>

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui-1.13.2/jquery-ui.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<style>
    /* .........................CART BADGE................................... */

    .cart-badge {
        position: relative;
        display: inline-block;
    }


    .cart-icon {
        display: inline-block;
        width: 45px;
        height: 20px;

    }


    .cart-count {
        position: absolute;
        top: -5px;
        right: -15px;
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        background-color: #f41068;
        color: white;
        border-radius: 50%;
    }


    /* .........................MULTI DROPDOWN.................................... */

    .parent {
        display: block;
        position: relative;
        float: left;
        line-height: 30px;

    }

    .parent a {
        margin: 10px;
        color: #f41068;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 600;
        color: #f41068;
        padding: 5px;

    }

    .parent:hover>ul {
        display: block;
        position: absolute;
    }

    .child {
        display: none;
    }

    .child li {
        background-color: white;
        line-height: 30px;
        border-bottom: #CCC 1px solid;
        border-right: #CCC 1px solid;
        width: 200px;
    }

    .child li a {
        color: #000000;
    }

    .child li a:hover {
        color: #f41068;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0px;
        min-width: 10em;
    }

    ul ul ul {
        left: 100%;
        top: 0;
        margin-left: 1px;
    }

    li:hover {
        background-color: #95B4CA;

    }

    .parent li:hover {
        background-color: #F0F0F0;
        color: #f41068;
    }

    .expand {
        font-size: 12px;
        float: right;
        margin-right: 5px;
    }
</style>

<body>
    <header class="default-header">
        <div class="menutop-wrap">
            <div class="menu-top container">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="list">
                        <li><a href="tel:+12312-3-1209">+12312-3-1209</a></li>
                        <li><a href=""></a>
                        </li>
                    </ul>
                    <ul class="list">
                        <li><a href="#">login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">



                    <ul id="menu">
                        <li class="parent"><a href="#">Category <i class="fa-solid fa-caret-down"></i></a>
                            <ul class="child">
                                @foreach($categories as $category)
                                <li class="parent"><a href="#">{{ $category->name }}<span class="expand">»</span></a>
                                    <ul class="child">
                                        @foreach($category->subcategories as $subcategory)
                                        <li class="parent"><a href="#">{{ $subcategory->name }}<span class="expand">»</span></a>
                                            <ul class="child">
                                                @foreach($subcategory->subsubcategories as $subsubcategory)
                                                <li><a href="#">{{ $subsubcategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>


                    <ul class="navbar-nav">
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li><a href="#men">Men</a></li>
                        <li><a href="#women">Women</a></li>
                        <li><a href="#latest">Latest</a></li>
                        <li>
                            <a href="{{ route('order.create') }}">
                                <div class="cart-badge">
                                    <span class="cart-icon">Cart</span>
                                    <span id="cartTotal" class="cart-count"></span>
                                </div>
                            </a>
                        </li>
                        @if (Auth::check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Account
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            </div>
                        </li>
                        @endif
                    </ul>

                </div>
            </div>
        </nav>

    </header>
    @yield('content');

    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About</h6>
                        <ul>
                            <li><a style="color: #f41068;" href="">About Us</a></li>
                            <li><a style="color: #f41068;" href="">Contact Info</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <div class="d-flex flex-row">
                                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>

                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="{{ asset('assets/img/i1.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i2.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i3.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i4.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i5.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i6.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i7.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('assets/img/i8.jpg') }}" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">

                <p class="footer-text m-0">Copyright &copy;

                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com/" target="_blank">IshratZahan</a>
                </p>

            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha512-LCNYs7jH7Odmoc6adflrhgpq0cJmq8fwQJq3ICCBuk8BKFwA0PL6pVgVcKFnfNc0dJ+UmFp5sYvjG+jjlh7nXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>


    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        async function test() {
            let response = await fetch("https://www.cloudflare.com/cdn-cgi/trace", {
                mode: "cors"
            });
            let text = await response.text();

        }
        test()
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>


    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7bf8b452ba54bc2d","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script>
        var cart = new Cart();


        $(document).ready(function() {


            $("#cartTotal").html(cart.totalItems());


            $(".lnr.lnr-cart").click(function() {
                var productId = $(this).data("product-id");


                const existingItem = cart.getItems().find(item => item.id === productId);

                if (existingItem) {

                    existingItem.quantity++;
                } else {

                    $.getJSON("{{ url('cart') }}/" + productId, function(d) {
                        const id = d.id;
                        const name = d.name;
                        const price = d.selling_price;
                        let images = [];

                        d.images.forEach(function(image) {
                            images.push(image.name);
                        });

                        const product = {
                            'id': id,
                            'name': name,
                            'price': price,
                            'image': images,
                            'quantity': 1,
                        };

                        cart.addItem(product);
                    });
                }

                $("#cartTotal").html(cart.totalItems());
            });
        });


        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }

        $(document).ready(function() {
            let showItem = new Cart();

            let cartInfo = showItem.getItems();
            // console.log(cartInfo);

            let html = "";
            cartInfo.forEach(p => {

                html += `<tr>       
                <td>${p.name}</td>       
                <td style="width: 100px;">
                    <div style="max-width: 100%; max-height: 100px; display: flex; align-items: center; justify-content: center;">
                        <img style="max-width: 100%; max-height: 100%; object-fit: contain;" src="{{ asset('storage/') }}/${p.image}" class="img-fluid" alt="">
                    </div>
                </td>
                <td class="price">${p.price}</td>
                <td><input type="number" class="qu" name="quantity" value="${p.quantity}" min="1"></td>
                <td class="itemtotal">${p.price}</td>
                <td>
                    <a href="#" class="removeItem" data-item='${p.id}'><i style="color: #DD5903; font-size: larger;" class="fa-solid fa-trash-can"></i></a>
                </td>

                </tr>`;

                return html;

            })

            $("#dyn_tr").html(html);


            updateTotal();
            $(document).on('blur change keyup', '.qu', function() {
                var $row = $(this).closest('tr');
                var qty = $row.find('.qu').val();
                var price = $row.find('.price').text();
                var itemtotal = qty * price;
                $row.find('.itemtotal').text(financial(itemtotal));
                updateTotal();
            });


            function updateTotal() {
                var total = 0;
                var updatedCart = showItem.getItems(); // Get the current cart from your JavaScript object
                $(".itemtotal").each(function(index) {
                    total += parseFloat($(this).text());

                    // Update the quantity in the cart for the corresponding item
                    var newQuantity = parseInt($("input[name='quantity']").eq(index).val());
                    updatedCart[index].quantity = newQuantity;
                });

                $(".grandtotal").text(total);

                // Save the updated cart in local storage
                showItem.updateStorage(); // Use your Cart's updateStorage method
            }


        });

        $(document).on('click', '.myorder', function(event) {
            event.preventDefault();

            let newcart = new Cart();

            let items = newcart.getItems();
            // console.log(items);
            let order = [];

            items.forEach(e => {
                let product_id = e.id;
                let name = e.name;
                let price = e.price;
                let quantity = e.quantity;

                order.push({
                    product_id: product_id,
                    p_name: name,
                    price: price,
                    quantity: quantity,
                })


            })
            // console.log(order);
            let user_id = $('#userid').val();
            let billing_address = $('#billing_address').val();
            let shipping_address = $('#shipping_address').val();
            let comment = $('#comment').val();
            let status = 'pending';

            $.ajax({
                url: "{{ route('order.store') }}",
                type: 'post',
                data: {
                    orders: order,
                    total: $('.grandtotal').text(),
                    user_id: user_id,
                    billing_address: billing_address,
                    shipping_address: shipping_address,
                    comment: comment,
                    status: status

                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                container: 'custom-swal-container',
                            },
                        }).then(() => {
                            cart.emptyCart();
                            location.reload();
                        });
                    }
                },

                error: function(xhr, status, error) {
                    console.error(xhr.responseText)
                }
            })

        })
    </script>

</body>


</html>