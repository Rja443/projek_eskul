@extends('layouts.app')

@section('content')

<h2>Tambah Kategori</h2>

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('categories.store') }}"
      method="POST">

    @csrf

    <label>Nama Kategori</label>
    <br>

    <input type="text"
           name="name">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

@endsection