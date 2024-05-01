<!-- JS Global -->
<script src="{{ asset('frontend/assets/plugins/jquery/jquery-2.1.3.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/royalslider/jquery.royalslider.min.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/bootstrap-select-1.9.3/dist/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/owl-carousel2/owl.carousel.min.js') }}"></script>

<script
    src="{{ asset('frontend/assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js') }}">
</script>

<script src="{{ asset('frontend/assets/plugins/isotope-master/dist/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('frontend/assets/plugins/subscribe-better-master/jquery.subscribe-better.min.js') }}"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- Page JS -->
<script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function handleRadioChange(clickedRadio) {
        if (clickedRadio.id === "paid") {
            // If "Paid" is checked, uncheck "Unpaid"
            document.getElementById("unpaid").checked = false;
        } else if (clickedRadio.id === "unpaid") {
            // If "Unpaid" is checked, uncheck "Paid"
            document.getElementById("paid").checked = false;
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#menu-main > li > .dropdown-toggle').click(function() {
            window.location = $(this).attr('href');
        });
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>

{{-- addToCartDetails --}}
<script>
    function addToCartDetails() {

        var product_name = $('#dname').text();
        var id = $('#dproduct_id').val();
        var color = $('#dcolor option:selected').text();
        var quantity = $('#dqty').val();

        $.ajax({

            type: 'POST',
            dataType: 'json',

            url: "/dcart/data/store/" + id,

            data: {

                color: color,
                quantity: quantity,
                product_name: product_name,

            },

            success: function(data) {

                miniCart();

                // Start Message 

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message 
            }

        })

    }
</script>

{{-- MiNiCart  --}}

<script>
    function miniCart() {

        $.ajax({

            type: 'GET',
            dataType: 'json',
            url: '/product/mini/cart',

            success: function(response) {

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);

                var miniCart = ""

                $.each(response.carts, function(key, value) {

                    miniCart += `<ul id="minicartHeader" class="product_list_widget list-unstyled">

                            <li>
                                <div class="media clearfix">

                                    <div class="media-lefta">
                                        <a href="single-product.html">
                                            <img src="/${value.options.image}" style="width:50px;height:50px;" alt="hoodie_5_front" />
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <a href="">${value.name}</a>

                                        <span class="price">
                                            <span class="amount">
                                                Tk ${value.price}
                                            </span>
                                        </span>

                                        <span class="quantity">Qty: ${value.qty} Pcs</span>

                                    </div>

                                </div>
                                <div class="product-remove">

                                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="btn-remove" title="Remove this item">
                                        <i class="fa fa-close"></i>
                                    </a>

                                </div>
                            </li>

                            </ul>`

                });

                $('#miniCart').html(miniCart);

            }

        })

    }

    miniCart();
</script>

{{-- //MiNiCart Remove  --}}
<script>
    function miniCartRemove(rowId) {

        $.ajax({

            type: 'GET',
            url: '/minicart/product/remove/' + rowId,
            dataType: 'json',
            success: function(data) {

                miniCart();

                // Start Message 

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }

                // End Message  

            }



        })
    }
</script>

{{-- Load My Cart  --}}
<script type="text/javascript">
    function cart() {
        $.ajax({
            type: 'GET',
            url: '/get-cart-product',
            dataType: 'json',
            success: function(response) {
                // console.log(response)

                var rows = ""

                $.each(response.carts, function(key, value) {
                    rows += `
                    
                    
                    <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="">
                                                    <img src="/${value.options.image}" class="mb-2" style="width:70px;height:70px;" alt="poster_2_up" />
                                                </a>
                                            </td>
                                           <br>

                                            <td class="product-name">
                                                    <h4>${value.name}</h4>
                                            </td>

                                            <td class="product-price">
                                                <p class="font-3 fsz-18 no-mrgn">
                                                    <b class="amount blk-clr">Tk ${value.price}</b>
                                                    
                                                </p>
                                                
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity input-group">

                                                    

                                                    <input type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" value="-" />

                                                    <input type="text" name="quantity" value="${value.qty}" maxlength="2"
                                                        max="10" size="1" min="1"  />

                                                    <input type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" value="+" />

                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <p class="font-3 fsz-18 no-mrgn">
                                                    <b class="amount blk-clr">Tk ${value.subtotal}</b>
                                                </p>
                                            </td>

                                            <td class="">
                                                <a type="submit" href="" class="text-body"  id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                        </tr>

                                        


                    `
                });

                $('#cartPage').html(rows);

            }

        })
    }
    cart();
</script>


{{-- ============================ --}}
{{-- <script type="text/javascript">
    function cart() {
        $.ajax({
            type: 'GET',
            url: '/get-cart-product1',
            dataType: 'json',
            success: function(response) {
                // console.log(response)

                var rows = ""

                $.each(response.carts, function(key, value) {
                    rows += `


                    <tr class="cart-subtotal">
                                                <th>Sub Total:</th>
                                                <td><span class="drk-gry">Tk ${value.subtotal}</span></td>
                                            </tr>

                                            

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td>
                                                    <strong><span class="amount">Tk ${value.subtotal}</span></strong>
                                                </td>
                                            </tr>
                    
                    
                    
                    `
                });

                $('#cartPage1').html(rows);

            }

        })
    }
    cart();
</script> --}}
{{-- ====================================== --}}

{{-- // Cart INCREMENT  --}}
<script>
    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function(data) {
                // couponCalculation();

                cart();
                miniCart();

            }
        });
    }


    // Cart INCREMENT End 

    // Cart Decrement Start

    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function(data) {
                // couponCalculation();

                cart();
                miniCart();

            }
        });
    }
</script>

{{-- Cart Remove --}}
<script>
    function cartRemove(id) {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/cart-remove/" + id,

            success: function(data) {

                cart();
                miniCart();
                // couponCalculation();
                // Start Message 

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })

                } else {

                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }

                // End Message  


            }
        })
    }
    // Cart Remove End 
</script>
