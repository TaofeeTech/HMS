@extends('main_master')
@section('main')

<!-- tp-breadcrumb-area-start -->
<div class="tp-breadcrumb-area pt-130 pb-100 p-relative">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8">
            <div class="tp-breadcrumb-title-wrap text-center">
               <h2 class="tp-breadcrumb-title-blog tp-breadcrumb-title-blog-3 mb-15">Shopping Cart</h2>
               <div class="tp-breadcrumb-list">
                  <span> <a href="{{ url("/") }}">Home</a></span>
                  <span> Shopping Cart</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- tp-breadcrumb-area-end -->





<!-- cart area start -->
<section class="tp-cart-area pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xl-9 col-lg-8">
            <div class="tp-cart-list mb-25 mr-30">
               <table class="table">
                  <thead>
                     <tr>
                        <th colspan="2" class="tp-cart-header-product">Product</th>
                        <th class="tp-cart-header-price">Price</th>
                        {{-- <th class="tp-cart-header-quantity">Quantity</th> --}}
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse ($cartItems as $item)
                     <tr>
                        <!-- img -->
                        <td class="tp-cart-img"><a href="room-details-1.html"> <img style="object-fit: contain; "
                                 src="{{ $item->attributes->image }}" alt=""></a></td>
                        <!-- title -->
                        <td class="tp-cart-title text-capitalize"><a href="room-details-1.html">{{
                              $item->attributes->room_type }} Room</a></td>
                        <!-- price -->
                        <td class="tp-cart-price"><span>&#8358;{{ number_format($item->price) }}</span></td>
                        <!-- quantity -->
                        {{-- <td class="tp-cart-quantity">
                           <div class="tp-product-quantity mt-10 mb-10">
                              <span class="tp-cart-minus minus">
                                 <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                 </svg>
                              </span>
                              <input class="tp-cart-input" id="quantity" type="text" value="{{ $item->quantity }}">
                              <span class="tp-cart-plus plus">
                                 <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                    <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                       stroke-linejoin="round" />
                                 </svg>
                              </span>
                           </div>
                        </td> --}}
                        <!-- action -->
                        <td class="tp-cart-action">
                           <a href="{{ route("remove.cart", $item->id) }}" class="tp-cart-action-btn">
                              <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                    fill="currentColor" />
                              </svg>
                              <span>Remove</span>
                           </a>
                        </td>
                     </tr>
                     @empty
                     <div class="text-danger h4 text-center">Your Cart is Empty!</div>
                     @endforelse
                  </tbody>
               </table>
            </div>
            <div class="tp-cart-bottom">
               <div class="row align-items-end">
                  <div class="col-xl-6 col-md-8">
                     <div class="tp-cart-coupon">
                        <form action="#">
                           <div class="tp-cart-coupon-input-box">
                              <label>Coupon Code:</label>
                              <div class="tp-cart-coupon-input d-flex align-items-center">
                                 <input type="text" placeholder="Enter Coupon Code">
                                 <button type="submit">Apply</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-xl-6 col-md-4">
                     <div class="tp-cart-update text-md-end">
                        <button type="button" class="tp-cart-update-btn">Update Cart</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="tp-cart-checkout-wrapper">
               <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                  <span>Total</span>
                  <span>&#8358;{{ number_format($totalPrice, 2) }}</span>
               </div>
               <div class="tp-cart-checkout-proceed">
                  <a href="{{ route('checkout') }}" id="checkout" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- cart area end -->

{{-- <script>
   const checkoutBtn = document.getElementById('checkout');
   const quantityInput = document.getElementById('quantity');
   let quantity = quantityInput.value;

   const minus = document.querySelector('.minus');
   const plus = document.querySelector('.plus');

   plus.addEventListener('click', () => {

      quantity = parseInt(quantity) + 1;

      quantityInput.value = quantity;

   });

   minus.addEventListener('click', () => {

      quantity = parseInt(quantity) - 1;

      if (quantity < 0) quantity = 0; 

      quantityInput.value = quantity;

   });

   checkoutBtn.addEventListener('click', (e) => {
      
      e.preventDefault()
      console.log(quantity);
      

   })

</script> --}}

@endsection