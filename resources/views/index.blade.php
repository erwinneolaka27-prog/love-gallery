@extends('layout')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12 relative">

    <!-- Garis Timeline Tengah -->
    <div class="absolute left-1/2 transform -translate-x-1/2 border-l-2 border-pink-200 dark:border-gray-700 h-full"></div>

    <!-- Item Timeline -->
    <div class="space-y-16 relative">
        @foreach($photos as $index => $photo)
        <div class="relative flex flex-col md:flex-row items-center justify-center group" data-aos="fade-up">

            <!-- Titik Tengah -->
            <div class="absolute left-1/2 transform -translate-x-1/2 bg-white dark:bg-gray-800 border-2 border-pink-400 rounded-full w-10 h-10 flex items-center justify-center z-10 group-hover:bg-pink-500 group-hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.654 0-3 1.346-3 3 0 2.5 3 6 3 6s3-3.5 3-6c0-1.654-1.346-3-3-3z" />
                </svg>
            </div>

            <!-- Card dengan overlay -->
            <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition w-full md:w-1/2 mx-auto p-4 mt-12 md:mt-0 overflow-hidden group">

                <!-- Overlay lembut -->
                <div class="absolute inset-0 bg-pink-500/10 dark:bg-pink-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-md -z-10"></div>

                <!-- Gambar -->
                <div class="relative overflow-hidden rounded-t-2xl cursor-pointer" onclick="openModal('{{ asset('uploads/'.$photo->image) }}')">
                    <img src="{{ asset('uploads/'.$photo->image) }}"
                         class="w-full h-60 object-cover rounded-t-2xl transition-transform duration-500 ease-in-out group-hover:scale-105">
                    <div class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity">
                        <p class="text-pink-300 text-sm font-semibold">Klik untuk perbesar 💫</p>
                    </div>
                </div>

                <!-- Konten -->
                <div class="p-5 relative z-10">
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">
                        {{ \Carbon\Carbon::parse($photo->date)->format('F d, Y') }}
                    </p>
                    <h2 class="text-lg font-semibold mb-2 transition-colors duration-300 group-hover:text-pink-500">
                        {{ $photo->title }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">{{ $photo->description }}</p>

                    <!-- Tombol CRUD -->
                    <div class="flex gap-3 mt-4">
                        <a href="{{ route('gallery.edit', $photo->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm transition">Edit</a>
                        <form action="{{ route('gallery.destroy', $photo->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin hapus kenangan ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <p class="text-center text-gray-400 dark:text-gray-600 text-sm mt-16">Made with 💕 by Us</p>
</div>

<!-- Modal Preview Gambar -->
<div id="imageModal" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="relative">
        <img id="modalImage" src="" alt="Preview" class="max-h-[80vh] max-w-[90vw] rounded-xl shadow-2xl transform scale-95 opacity-0 transition-all duration-500">
        <button onclick="closeModal()" class="absolute top-2 right-2 bg-white/70 hover:bg-white text-pink-500 rounded-full p-2 shadow-md">
            ✕
        </button>
    </div>
</div>

<!-- Script Modal -->
<script>
function openModal(src) {
    const modal = document.getElementById('imageModal');
    const img = document.getElementById('modalImage');
    modal.classList.remove('hidden');
    img.src = src;
    setTimeout(() => {
        img.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    const img = document.getElementById('modalImage');
    img.classList.remove('opacity-100', 'scale-100');
    setTimeout(() => modal.classList.add('hidden'), 300);
}
</script>
@endsection
