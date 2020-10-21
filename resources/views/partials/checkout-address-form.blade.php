<h3>Address</h3>
<section>
    <h4 class="text-center font-22 mb-5">Address</h4>
    @if(auth()->user()->has_shipping_details())
        <blockquote class="blockquote text-right"><small class="text-dark"><span class="text-info">double tap</span> to edit this address!</small></blockquote>
    @endif
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input type="text" class="form-control shipping" id="name" name="name" value="{{auth()->user()->has_shipping_details() ? auth()->user()->shipping_address()->first()->name : ''}}" {{auth()->user()->has_shipping_details() ? 'readonly' : ''}}>
        </div>
    </div>
    <div class="form-group">
        <label for="address">DeliveryAddress</label>
        <input type="text" class="form-control shipping" id="address" name="address" value="{{auth()->user()->has_shipping_details() ? auth()->user()->shipping_address()->first()->address : ''}}" {{auth()->user()->has_shipping_details() ? 'readonly' : ''}}>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="city">City</label>
            <input type="text" class="form-control shipping" id="city" name="city" value="{{auth()->user()->has_shipping_details() ? auth()->user()->shipping_address()->first()->city : ''}}" {{auth()->user()->has_shipping_details() ? 'readonly' : ''}}>
        </div>
        <div class="form-group col-md-6">
            <label for="district">District</label>
            <input type="text" class="form-control shipping" name="district" value="{{auth()->user()->has_shipping_details() ? auth()->user()->shipping_address()->first()->district : ''}}" {{auth()->user()->has_shipping_details() ? 'readonly' : ''}}>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="contact_number">Mobile Number</label>
            <input type="text" class="form-control shipping" id="contact_number" maxlength="11" value="{{auth()->user()->has_shipping_details() ? auth()->user()->shipping_address()->first()->contact_number : ''}}" {{auth()->user()->has_shipping_details() ? 'readonly' : ''}}>
        </div>
        <div class="form-group col-md-6">
            <label for="post_code">Postal Code</label>
            <input type="text" class="form-control shipping" id="post_code" value="{{auth()->user()->has_shipping_details() ? auth()->user()->shipping_address()->first()->post_code : ''}}" {{auth()->user()->has_shipping_details() ? 'readonly' : ''}}>
        </div>
    </div>
</section>
