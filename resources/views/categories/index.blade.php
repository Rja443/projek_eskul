@extends('layouts.app')

@section('content')

<style>
    /* Tema Soft Blue & Gentle Gray (sama seperti halaman lainnya) */
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9eef5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    /* Kartu utama */
    .main-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 1px 2px rgba(0, 0, 0, 0.02);
        overflow: hidden;
    }

    /* Header */
    .page-header {
        background: linear-gradient(135deg, #1e2a3a 0%, #0f1724 100%);
        padding: 1.5rem 2rem;
        border-bottom: 3px solid #8b5cf6;
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
        content: "📂";
        font-size: 1.8rem;
    }

    /* Tombol tambah */
    .btn-tambah {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #8b5cf6;
        color: white;
        padding: 0.6rem 1.4rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.3px;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(139, 92, 246, 0.2);
        border: none;
    }

    .btn-tambah:hover {
        background: #7c3aed;
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(139, 92, 246, 0.3);
        color: white;
    }

    /* Header action wrapper */
    .header-action {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    /* Tabel */
    .category-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 1.5rem;
        width: calc(100% - 3rem);
    }

    .category-table th {
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

    .category-table td {
        padding: 1rem 1rem;
        border-bottom: 1px solid #eef2f6;
        color: #334155;
        font-size: 0.9rem;
    }

    .category-table tr:hover td {
        background: #fefce8;
    }

    /* Badge ID */
    .badge-id {
        background: #e2e8f0;
        color: #475569;
        padding: 0.25rem 0.6rem;
        border-radius: 2rem;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }

    /* Nama kategori dengan icon */
    .category-name {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .category-name::before {
        content: "📁";
        font-size: 1rem;
    }

    /* Tombol aksi */
    .btn-edit {
        color: #8b5cf6;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8rem;
        margin-right: 1rem;
        transition: 0.1s;
    }

    .btn-edit:hover {
        color: #6d28d9;
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

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
    }

    /* Responsive */
    @media (max-width: 640px) {
        .category-table th,
        .category-table td {
            padding: 0.75rem 0.5rem;
            font-size: 0.75rem;
        }
        .page-header {
            padding: 1rem 1.5rem;
        }
        .page-header h2 {
            font-size: 1.4rem;
        }
        .header-action {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="container">
    <div class="main-card">
        <!-- Header -->
        <div class="page-header">
            <div class="header-action">
                <h2>Daftar Kategori</h2>
                <a href="{{ route('categories.create') }}" class="btn-tambah">
                    ✨ Tambah Kategori
                </a>
            </div>
        </div>

        <!-- Tabel -->
        <table class="category-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td><span class="badge-id">#{{ $category->id }}</span></td>
                    <td><span class="category-name">{{ $category->name }}</span></td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus kategori {{ addslashes($category->name) }}?')">
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
        }</table>

        @if($categories->isEmpty())
        <div class="empty-state">
            📭 Belum ada kategori.<br>
            <a href="{{ route('categories.create') }}" style="color:#8b5cf6; font-weight:600; text-decoration:none; margin-top:0.5rem; display:inline-block;">
                Klik di sini untuk menambah kategori pertama
            </a>
        </div>
        @endif
    </div>
</div>

@endsection