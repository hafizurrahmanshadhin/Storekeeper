@extends('layouts.app')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card mt-3 p-4">
                <p>Name: <b>{{ $product->name }}</b></p>
                <p>Description: <b>{{ $product->description }}</b></p>
                <p>Price: <b>{{ $product->price }}</b></p>
                <p>Quantity: <b>{{ $product->quantity }}</b></p>
                <img src="{{ asset('products/' . $product->image) }}" class="rounded" alt="Not Found" width="100%""
            </div>
        </div>
    </div>
</div>
@endsection
