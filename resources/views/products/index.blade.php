@extends('layouts.app')

@section('content')

<h2>Daftar Barang</h2>

<a href="{{ route('products.create') }}">
    Tambah Barang
</a>

<br><br>

<form method="GET">

    <input type="text"
           name="search"
           placeholder="Cari barang..."
           value="{{ request('search') }}">

    <button type="submit">
        Cari
    </button>

</form>

<br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $product)

    <tr>

        <td>{{ $product->id }}</td>

        <td>{{ $product->name }}</td>

        <td>{{ $product->category->name }}</td>

        <td>{{ $product->price }}</td>

        <td>{{ $product->stock }}</td>

        <td>

            <a href="{{ route('products.edit',$product->id) }}">
                Edit
            </a>

            <form action="{{ route('products.destroy',$product->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

<br>

{{ $products->links() }}

@endsection