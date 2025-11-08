@extends('layout')

@section('content')
<h1 class="text-2xl font-bold text-center mb-6 text-pink-600 dark:text-pink-400">🖋️ Edit Kenangan</h1>

<form action="{{ route('gallery.update', $photo->id) }}" method="POST" enctype="multipart/form-data"
      class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md transition-colors duration-500">
    @csrf
    @method('PUT')

    <!-- Judul -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Judul</label>
        <input type="text" name="title" value="{{ $photo->title }}"
               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
               placeholder="Judul kenangan kamu..."
               required>
    </div>

    <!-- Deskripsi -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Deskripsi</label>
        <textarea name="description"
                  class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2
                         bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                         focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                  placeholder="Ceritakan kembali momen ini..." rows="3">{{ $photo->description }}</textarea>
    </div>

    <!-- Tanggal Kenangan -->
    <div class="mb-4">
        <label class="block font-semibold mb-2 dark:text-gray-200">Tanggal Kenangan</label>
        <input type="date" name="date" value="{{ $photo->date }}"
               class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                      focus:outline-none focus:ring-2 focus:ring-pink-400 transition">
    </div>

    <!-- Ganti Foto -->
    <div class="mb-6">
        <label class="block font-semibold mb-2 dark:text-gray-200">Ganti Foto (opsional)</label>
        <input type="file" name="image" accept="image/*"
               class="w-full text-gray-900 dark:text-gray-100 dark:file:text-gray-100
                      file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0
                      file:text-sm file:font-semibold
                      file:bg-pink-100 hover:file:bg-pink-200
                      dark:file:bg-pink-600 dark:hover:file:bg-pink-700
                      transition">
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Foto saat ini:</p>
        <img src="{{ asset('uploads/'.$photo->image) }}"
             class="w-40 h-40 object-cover rounded-lg mt-2 shadow-md border border-gray-200 dark:border-gray-700">
    </div>

    <!-- Tombol Simpan -->
    <button type="submit"
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg w-full font-semibold transition">
        Simpan Perubahan
    </button>
</form>
@endsection
