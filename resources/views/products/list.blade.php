@extends('layout')
@section('title', __('Products'))
@section('content')
<table class="table table-dark" id="productList">
    <thead>
        <tr>
            <th scope="col">Product name</th>
            <th scope="col">Quantity in stock</th>
            <th scope="col">Price per item</th>
            <th scope="col">Datetime submitted</th>
            <th scope="col">Total value number</th>
        </tr>
    </thead>
    <tbody></tbody>
    <tfoot></tfoot>
</table>
<div class="content px-3">
    <div class="card">
        <ul class="alert-success" id="success">

        </ul>
        <ul class="alert-danger" id="errors">

        </ul>
        {!! Form::open(['route' => 'store-product']) !!}
        <div class="card-body">
            <div class="row">
                @include('products.form')
            </div>
        </div>
        <div class="card-footer">
            {!! Form::submit(__('Save'), ['class' => 'btn btn-primary','id' => "submit_data"]) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection