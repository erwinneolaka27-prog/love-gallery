@extends('layout')

@section('content')
<h1 class="text-2xl font-bold text-center mb-6 dark:text-white">🌹 Tambah Foto Kenangan 🌹</h1>

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data"
      class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md transition-colors duration-500">
    @csrf

    <!-- Judul -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Judul</label>
        <input type="text" name="title"
               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
               placeholder="Contoh: Liburan ke Bali"
               required>
    </div>

    <!-- Deskripsi -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Deskripsi</label>
        <textarea name="description"
                  class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2
                         bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                         focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                  placeholder="Ceritakan sedikit tentang kenangan ini..." rows="3"></textarea>
    </div>

    <!-- Tanggal -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Tanggal Kenangan</label>
        <input type="date" name="date"
               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
    </div>

    <!-- Foto -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Pilih Foto</label>
        <input type="file" name="image" accept="image/*"
               class="w-full text-gray-900 dark:text-gray-100 dark:file:text-gray-100
                      file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0
                      file:text-sm file:font-semibold
                      file:bg-pink-100 hover:file:bg-pink-200
                      dark:file:bg-pink-600 dark:hover:file:bg-pink-700
                      transition" required>
    </div>

    <!-- Tombol Simpan -->
    <button type="submit"
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg w-full font-semibold transition">
        Simpan
    </button>
</form>
@endsection
