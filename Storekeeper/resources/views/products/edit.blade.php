@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3 class="text-muted">Product Edit #{{ $product->name }}</h3>
                    <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group>
                            <label for="name" id="name">
                            Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group>
                            <label for="description" id="description">
                            Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" id="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group>
                            <label for="price" id="price">Price</label>
                            <input type="number" name="price" class="form-control value="{{ old('name', $product->price) }}"
                            @error('price')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group>
                            <label for="quantity" id="quantity">quantity</label>
                            <input type="number" name="quantity" class="form-control value="{{ old('name', $product->quantity) }}"
                            @error('quantity')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
