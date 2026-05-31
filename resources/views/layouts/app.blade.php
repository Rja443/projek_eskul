<!DOCTYPE html>
<html>
<head>
    <title>Pendataan Barang</title>
</head>
<body>

    <h1>Sistem Pendataan Barang</h1>

    <hr>

    <a href="{{ route('dashboard') }}">Dashboard</a> |
    <a href="{{ route('categories.index') }}">Kategori</a> |
    <a href="{{ route('products.index') }}">Barang</a> |

    <form action="{{ route('logout') }}"
          method="POST"
          style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <hr>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
        <hr>
    @endif

    @yield('content')

</body>
</html>