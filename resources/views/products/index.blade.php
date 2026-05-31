@extends('layouts.app')

@section('content')

<style>
    /* Tema Soft Blue & Gentle Gray */
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9eef5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
    }

    /* Kartu utama */
    .main-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 1px 2px rgba(0, 0, 0, 0.02);
        overflow: hidden;
        transition: all 0.2s ease;
    }

    /* Header */
    .page-header {
        background: linear-gradient(135deg, #1e2a3a 0%, #0f1724 100%);
        padding: 2rem 2rem;
        border-bottom: 3px solid #3b82f6;
    }

    .page-header h2 {
        color: white;
        font-size: 1.85rem;
        font-weight: 700;
        letter-spacing: -0.01em;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-header h2::before {
        content: "📦";
        font-size: 1.8rem;
    }

    /* Tombir tambah */
    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #3b82f6;
        color: white;
        padding: 0.6rem 1.4rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.3px;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(59,130,246,0.2);
        border: none;
    }

    .btn-tambah:hover {
        background: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(59,130,246,0.3);
        color: white;
    }

    /* Form pencarian */
    .search-box {
        background: #f8fafc;
        border-radius: 1rem;
        padding: 1.25rem 1.5rem;
        margin: 1.5rem 1.5rem 0 1.5rem;
        border: 1px solid #e2e8f0;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #cbd5e1;
        border-radius: 2rem;
        font-size: 0.9rem;
        transition: all 0.2s;
        background: white;
    }

    .search-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
    }

    .btn-cari {
        background: #3b82f6;
        color: white;
        border: none;
        padding: 0.75rem 1.8rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: 0.2s;
        white-space: nowrap;
    }

    .btn-cari:hover {
        background: #2563eb;
        transform: scale(0.98);
    }

    /* Tabel */
    .product-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 1.5rem;
        width: calc(100% - 3rem);
    }

    .product-table th {
        text-align: left;
        padding: 1rem 1rem;
        background: #f1f5f9;
        color: #1e293b;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid #e2e8f0;
    }

    .product-table td {
        padding: 1rem 1rem;
        border-bottom: 1px solid #eef2f6;
        color: #334155;
        font-size: 0.9rem;
    }

    .product-table tr:hover td {
        background: #fefce8;
    }

    /* Badge kategori */
    .badge-kategori {
        background: #dbeafe;
        color: #1e40af;
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }

    /* Badge stok */
    .badge-stok-low {
        background: #fee2e2;
        color: #b91c1c;
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.7rem;
        font-weight: 700;
        display: inline-block;
    }

    .badge-stok-normal {
        background: #dcfce7;
        color: #15803d;
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.7rem;
        font-weight: 700;
        display: inline-block;
    }

    /* Harga */
    .harga {
        font-weight: 700;
        color: #0f3b2c;
    }

    /* Tombol aksi */
    .btn-edit {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8rem;
        margin-right: 1rem;
        transition: 0.1s;
    }

    .btn-edit:hover {
        color: #1e40af;
        text-decoration: underline;
    }

    .btn-hapus {
        background: none;
        border: none;
        color: #ef4444;
        font-weight: 600;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.1s;
    }

    .btn-hapus:hover {
        color: #b91c1c;
        text-decoration: underline;
    }

    /* Pagination */
    .pagination-wrapper {
        padding: 1rem 1.5rem 2rem 1.5rem;
        background: white;
        border-top: 1px solid #eef2f6;
    }

    .pagination-wrapper .pagination {
        justify-content: center;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-table th, 
        .product-table td {
            padding: 0.75rem 0.5rem;
            font-size: 0.75rem;
        }
        .page-header {
            padding: 1.25rem;
        }
        .flex-between {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>

<div class="container">
    <div class="main-card">
        <!-- Header -->
        <div class="page-header">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <h2>Daftar Barang</h2>
                <a href="{{ route('products.create') }}" class="btn-tambah">
                    ✨ Tambah Barang
                </a>
            </div>
        </div>

        <!-- Search -->
        <div class="search-box">
            <form method="GET" style="display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;">
                <div style="flex: 1; min-width: 200px;">
                    <input type="text"
                           name="search"
                           placeholder="🔍 Cari berdasarkan nama atau kategori..."
                           value="{{ request('search') }}"
                           class="search-input">
                </div>
                <button type="submit" class="btn-cari">
                    Cari
                </button>
            </form>
        </div>

        <!-- Tabel -->
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><span class="badge-kategori">{{ $product->category->name }}</span></td>
                    <td class="harga">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        @if($product->stock <= 5)
                            <span class="badge-stok-low">⚠️ Stok menipis</span>
                        @else
                            <span class="badge-stok-normal">✓ Tersedia</span>
                        @endif
                        <span style="font-size:0.7rem; color:#475569;"> ({{ $product->stock }})</span>
                    </td>
                    <td>
                        <a href="{{ route('products.edit',$product->id) }}" class="btn-edit">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('products.destroy',$product->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus {{ addslashes($product->name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($products->isEmpty())
        <div class="empty-state">
            📭 Belum ada data barang.<br>
            <a href="{{ route('products.create') }}" style="color:#3b82f6; font-weight:600; text-decoration:none;">Klik di sini untuk menambah</a>
        </div>
        @endif

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection