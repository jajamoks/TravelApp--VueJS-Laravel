<div class="row">
    <div class="col-md-8">
        <div class="form-group
		{{$errors->has('credit_card_number') ? 'has-error' : '' }}">
            <label for="cc_number">Credit Card Number</label>
            <input class="form-control" type="text" name="credit_card_number" value="{{old('credit_card_number')}}"
                   required/>
            <span class="help-block" style="color:red;font-size: 8px"> *please don't put any character/space between your credit card number </span>
            @if($errors->has('credit_card_number'))
                <span id="" class="help-block">{{$errors->first('credit_card_number')}}</span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group
		{{$errors->has('discount_code') ? 'has-error' : '' }}">
            <label for="cc_number">Discount Code</label>
            <input class="form-control" type="text" name="discount_code" value="{{old('discount_code')}}"/>
            @if($errors->has('discount_code'))
                <span id="" class="help-block">{{$errors->first('discount_code')}}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group
		{{$errors->has('expiration_month') || $errors->has('expiration_year') ? 'has-error' : '' }}">
            <label for="expiry_date">Expiration Date</label>
            <div>
                <input
                        class="form-control inline-input-expiry"
                        type="number" name="expiration_month" placeholder="MM" value="{{old('expiration_month')}}"
                        required/>
                <input
                        class="form-control inline-input-expiry"
                        type="number" name="expiration_year"
                        placeholder="YYYY"
                        value="{{old('expiration_year')}}" required/>
                @if($errors->has('expiration_year') || $errors->has('expiration_month'))
                    <span id="" class="help-block">
						<div>
							{{$errors->first('expiration_month')}}
						</div>
						<div>
							{{$errors->first('expiration_year')}}
						</div>
					</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group
		{{$errors->has('cvv_code') ? 'has-error' : '' }}">
            <label for="expiry_date">CVV Code</label>
            <input
                    class="form-control"
                    type="number" name="cvv_code" value="{{old('cvv_code')}}" required/>
            @if($errors->has('cvv_code'))
                <span id="" class="help-block">{{$errors->first('cvv_code')}}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="deposit-total">${{$cart->display_deposit}}</div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <div class="AuthorizeNetSeal">
                <script type="text/javascript"
                        language="javascript">var ANS_customer_id = "fa834793-4805-4123-b758-872c39be07cd";</script>
                <script type="text/javascript" language="javascript" src="//verify.
		authorize.net/anetseal/seal.js"></script>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-primary-filled btn-lg" value="Reserve"/>

        @if($cart->escape->escape_type->insurance_required)
            <p>
                <strong>Travel insurance is required for this escape.</strong>
            </p>
    @endif
    <!-- (c) 2005, 2017. Authorize.Net is a registered trademark of CyberSource Corporation -->

    </div>
    @if(isset($payment_status))
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ $payment_status['message'] }}
            </div>
        </div>
    @endif
</div>
