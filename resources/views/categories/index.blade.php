@extends('layouts.app')

@section('content')

<h2>Daftar Kategori</h2>

<a href="{{ route('categories.create') }}">
    Tambah Kategori
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>

    @foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>

            <a href="{{ route('categories.edit',$category->id) }}">
                Edit
            </a>

            <form action="{{ route('categories.destroy',$category->id) }}"
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

@endsection