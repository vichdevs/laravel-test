<div class="form-group row">
    {{Form::label('product_name', 'Product Name')}}
    {{Form::text('product_name', "", \App\Providers\AppServiceProvider::fieldAttr($errors->has('product_name'),['maxlength' => 255]))}}
    @if ($errors->has('product_name'))
    <small class="invalid-feedback">{{ $errors->first('product_name') }}</small>
    @endif
</div>
<div class="form-group row">
    {{Form::label('qty', 'Quantity')}}
    {{Form::text('qty', "", \App\Providers\AppServiceProvider::fieldAttr($errors->has('qty'),['maxlength' => 10]))}}
    @if ($errors->has('qty'))
    <small class="invalid-feedback">{{ $errors->first('qty') }}</small>
    @endif
</div>
<div class="form-group row">
    {{Form::label('price', 'Price')}}
    {{Form::text('price', "", \App\Providers\AppServiceProvider::fieldAttr($errors->has('price'),['maxlength' => 10]))}}
    @if ($errors->has('price'))
    <small class="invalid-feedback">{{ $errors->first('price') }}</small>
    @endif
</div>