<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6">

        <h3>Statistik Barang</h3>

        <br>

        <p>
            Jumlah Barang :
            {{ $totalBarang }}
        </p>

        <p>
            Jumlah Kategori :
            {{ $totalKategori }}
        </p>

        <p>
            Total Stok :
            {{ $totalStok }}
        </p>

    </div>
</x-app-layout>