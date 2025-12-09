@extends('layouts.app')
@section('content')
<h3>{{ isset($product) ? 'Edit' : 'Create' }} Product</h3>
<form action="{{ isset($product) ? route('products.update',$product) : route('products.store') }}" method="POST">
  @csrf
  @if(isset($product)) @method('PUT') @endif

  <div class="mb-3">
    <label>Name</label>
    <input name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label>Price</label>
    <input name="price" value="{{ old('price', $product->price ?? '') }}" class="form-control">
    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label>Stock</label>
    <input name="stock" value="{{ old('stock', $product->stock ?? '') }}" class="form-control">
    @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
  </div>

  <button class="btn btn-primary">Save</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection