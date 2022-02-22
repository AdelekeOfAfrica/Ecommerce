<main id="main" class="main-site">
    <style>
     
    </style>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/home" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
         <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>
                        <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input  type="text" name="firstname" value="" placeholder="Your name" wire:model="firstname">
                                @error('firstname')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input  type="text" name="lastname" value="" placeholder="Your last name" wire:model="lastname">
                                @error('lastname')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input  type="email" name="email" value="" placeholder="Type your email"  wire:model="email">
                                @error('email')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 digits format"  wire:model="mobile">
                                @error('mobile')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="phone">Line 1<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 digits format"  wire:model="line1">
                                @error('line1')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="phone">Line 2<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 digits format"  wire:model="line2">
                                @error('line2')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input type="text" name="country" value="" placeholder="country" wire:model="country">
                                @error('country')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input  type="text" name="city" value="" placeholder="City name" wire:model="city">
                                @error('city')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
    
                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input  type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                @error('zipcode')<p class="text-danger"> {{message}}</p>@enderror
                            </p>


                            <p class="row-in-form">
                                <label for="province">Province:</label>
                                <input  type="number" name="province" value="" placeholder="province" wire:model="province">
                                @error('province')<p class="text-danger"> {{message}}</p>@enderror
                            </p> 
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                    <p>Ship to a different address?</p>
                                </label>
                            </p> 
                        </div>
                    </div>
                    @if($ship_to_different  )
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                        <h3 class="box-title">Shipping Address</h3>
                        <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input  type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                                @error('s_firstname')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input  type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                                @error('s_lastname')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input  type="email" name="email" value="" placeholder="Type your email"  wire:model="s_email">
                                @error('s_email')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 digits format"  wire:model="s_mobile">
                                @error('s_mobile')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="phone">Line 1<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 digits format"  wire:model="s_line1">
                                @error('s_line1')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="phone">Line 2<span>*</span></label>
                                <input  type="number" name="phone" value="" placeholder="10 digits format"  wire:model="s_line2">
                                @error('s_line2')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input type="text" name="country" value="" placeholder="country" wire:model="s_country">
                                @error('s_country')<p class="text-danger"> {{message}}</p>@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input  type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                                @error('s_city')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="zip-code">Province:</label>
                                <input  type="number" name="province" value="" placeholder="province" wire:model="s_province">
                                @error('s_province')<p class="text-danger"> {{message}}</p>@enderror
                            </p>

                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input  type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                @error('s_zipcode')<p class="text-danger"> {{message}}</p>@enderror
                            </p>   
                        </div>
                    @endif
                    </div>
                </div>
                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        @if($paymentmode == 'card')
                            <div class="wrap-address-billing">
                                @if(Session::has('stripe_error'))
                                <div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
                                @endif
                                <p class="row-in-form">
                                    <label for="card-no">Card Number:</label>
                                    <input  type="text" name="card-no" value="" placeholder="Card Number" wire:model="card_no">
                                    @error('card_no')<p class="text-danger"> {{message}}</p>@enderror
                                </p>  

                                <p class="row-in-form">
                                    <label for="exp-month">Expiry Month:</label>
                                    <input  type="text" name="expiry-month " value="" placeholder="MM" wire:model="exp_month">
                                    @error('exp_month')<p class="text-danger"> {{message}}</p>@enderror
                                </p> 

                                <p class="row-in-form">
                                    <label for="exp-year">Expiry Year:</label>
                                    <input  type="text" name="Exp-year" value="" placeholder="YYYY" wire:model="exp_year">
                                    @error('exp_year')<p class="text-danger"> {{message}}</p>@enderror
                                </p> 

                                <p class="row-in-form">
                                    <label for="cvc">CVC:</label>
                                    <input  type="text" name="CVC" value="" placeholder="CVC" wire:model="cvc">
                                    @error('cvc')<p class="text-danger"> {{message}}</p>@enderror
                                </p> 

                            </div>
                        @endif
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                                <span>Cash on delivery</span>
                                <span class="payment-desc">Order now pay on delivery</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode" >
                                <span>Credit / Debit Card</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                            @error('paymentmode')<span class="text-danger"> {{message}}</span>@enderror
                        </div>
                        @if(Session::has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{Session::get('checkout')['total']}}</span></p>
                        @endif
                        @if($errors->isEmpty())
                            <div wire:ignore id="processing" style="font-size:22px; margin-bottom:20px; padding-left:37px; color:green;display:none;">
                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                            <span>Processing......</span>
                            </div>
                        @endif


                        <button type="submit" class="btn btn-medium">Place order now </button>
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0.00</span></p>
                    </div>
                </div>
         </form>
        </div><!--end main content area-->
    </div><!--end container-->

</main>
