@extends('layouts.app')

@section('content')

<style>
    /* Tema Soft Blue & Gentle Gray (konsisten dengan halaman kategori lain) */
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9eef5 100%);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .container {
        max-width: 800px;
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
        content: "✏️";
        font-size: 1.8rem;
    }

    /* Form container */
    .form-container {
        padding: 2rem;
    }

    /* Form group */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #475569;
        margin-bottom: 0.5rem;
    }

    .form-group label::before {
        content: "▸";
        color: #8b5cf6;
        margin-right: 0.4rem;
        font-size: 0.7rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.75rem;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        background: #fafcff;
    }

    .form-control:focus {
        outline: none;
        border-color: #8b5cf6;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        background: white;
    }

    /* Tombol update */
    .btn-update {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        color: white;
        border: none;
        padding: 0.85rem 2rem;
        border-radius: 2rem;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s ease;
        width: 100%;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
    }

    .btn-update:active {
        transform: translateY(0);
    }

    /* Link kembali */
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        margin-bottom: 1rem;
        color: #8b5cf6;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.85rem;
        transition: 0.2s;
    }

    .back-link:hover {
        color: #6d28d9;
        gap: 0.6rem;
    }

    /* Info card (menampilkan ID yang sedang diedit) */
    .info-card {
        background: #f8fafc;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid #e2e8f0;
    }

    .info-card .label {
        font-size: 0.75rem;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
    }

    .info-card .value {
        font-size: 0.85rem;
        font-weight: 700;
        color: #1e293b;
        background: white;
        padding: 0.2rem 0.6rem;
        border-radius: 2rem;
        border: 1px solid #e2e8f0;
    }

    /* Responsive */
    @media (max-width: 640px) {
        .form-container {
            padding: 1.5rem;
        }
        .page-header {
            padding: 1rem 1.5rem;
        }
        .page-header h2 {
            font-size: 1.4rem;
        }
    }
</style>

<div class="container">
    <div class="main-card">
        <!-- Header -->
        <div class="page-header">
            <h2>Edit Kategori</h2>
        </div>

        <!-- Form -->
        <div class="form-container">
            <a href="{{ route('categories.index') }}" class="back-link">
                ← Kembali ke Daftar Kategori
            </a>

            <!-- Info ID yang sedang diedit -->
            <div class="info-card">
                <span class="label">Sedang mengedit:</span>
                <span class="value">ID: {{ $category->id }}</span>
            </div>

            <form action="{{ route('categories.update', $category->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text"
                           name="name"
                           value="{{ $category->name }}"
                           class="form-control"
                           placeholder="Contoh: Elektronik, Pakaian, Makanan"
                           autofocus>
                </div>

                <button type="submit" class="btn-update">
                    💾 Update Kategori
                </button>
            </form>
        </div>
    </div>
</div>

@endsection