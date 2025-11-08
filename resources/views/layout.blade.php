<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love Memories 💞</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        // Tailwind dark mode toggle
        if (localStorage.getItem('theme') === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans bg-pink-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-500">
    <!-- Navbar -->
    <nav class="flex items-center justify-between px-6 py-4 bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50 transition-all">
        <div class="flex items-center gap-2">
            <span class="text-pink-500 text-2xl">❤️</span>
            <h1 class="text-lg md:text-xl font-bold">Love Memories</h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('gallery.index') }}" class="hover:text-pink-500 text-sm md:text-base transition">Gallery</a>
            <a href="{{ route('gallery.upload') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-full text-sm md:text-base transition">
                + Add Photo
            </a>
            <!-- Dark mode toggle -->
            
        </div>
    </nav>

    @yield('content')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({ duration: 1000, once: true });

      // Toggle theme
      const toggle = document.getElementById('themeToggle');
      toggle.addEventListener('click', () => {
          document.documentElement.classList.toggle('dark');
          localStorage.setItem('theme',
              document.documentElement.classList.contains('dark') ? 'dark' : 'light'
          );
      });
    </script>
</body>
</html>
