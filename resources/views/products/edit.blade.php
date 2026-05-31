@extends('layouts.app')

@section('content')

<h2>Edit Barang</h2>

<form action="{{ route('products.update',$product->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Nama Barang</label>
    <br>

    <input type="text"
           name="name"
           value="{{ $product->name }}">

    <br><br>

    <label>Kategori</label>
    <br>

    <select name="category_id">

        @foreach($categories as $category)

        <option
            value="{{ $category->id }}"
            {{ $product->category_id == $category->id ? 'selected' : '' }}>

            {{ $category->name }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Harga</label>
    <br>

    <input type="number"
           name="price"
           value="{{ $product->price }}">

    <br><br>

    <label>Stok</label>
    <br>

    <input type="number"
           name="stock"
           value="{{ $product->stock }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

@endsection