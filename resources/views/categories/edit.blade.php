@extends('layouts.app')

@section('content')

<h2>Edit Kategori</h2>

<form action="{{ route('categories.update',$category->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Nama Kategori</label>
    <br>

    <input type="text"
           name="name"
           value="{{ $category->name }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

@endsection
