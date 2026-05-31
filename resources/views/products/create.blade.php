@extends('layouts.app')

@section('content')

<h2>Tambah Barang</h2>

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('products.store') }}"
      method="POST">

    @csrf

    <label>Nama Barang</label>
    <br>

    <input type="text"
           name="name">

    <br><br>

    <label>Kategori</label>
    <br>

    <select name="category_id">

        @foreach($categories as $category)

        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>

        @endforeach

    </select>

    <br><br>

    <label>Harga</label>
    <br>

    <input type="number"
           name="price">

    <br><br>

    <label>Stok</label>
    <br>

    <input type="number"
           name="stock">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

@endsection