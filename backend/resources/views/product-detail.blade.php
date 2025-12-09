<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>{{ $product->name }} – Chaos shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-black min-h-screen flex flex-col">
  <div class="navbar bg-base-100 shadow-sm" style="background-color: brown">
    <div class="navbar-start">
      <a class="btn btn-ghost w-40" href="/">
        <img src="{{ asset('logo.png') }}" alt="Logo" />
      </a>
    </div>

    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1 gap-2">
        <a class="btn" href="{{ route('shop') }}">shop</a>
        <a class="btn" href="/contact">Contact us</a>
      </ul>
    </div>

    <div class="navbar-end gap-3">
      <a href="{{ route('cart.index') }}" class="btn btn-sm bg-white text-black border-none shadow">
        cart
      </a>

      @guest
        <a href="{{ route('admin.login') }}"
           class="btn btn-sm btn-outline border-white text-white hover:bg-white hover:text-black">
          Admin login
        </a>
      @endguest

      @auth
        <form method="POST" action="{{ route('admin.logout') }}">
          @csrf
          <button type="submit"
                  class="btn btn-sm btn-outline border-green-400 text-green-200 hover:bg-green-400 hover:text-black">
            Admin: {{ auth()->user()->name }} (logout)
          </button>
        </form>
      @endauth
    </div>
  </div>
  <main class="flex-1 bg-black py-16 px-6 lg:px-24">
    <div class="max-w-5xl mx-auto bg-base-100 rounded-3xl shadow-xl p-10 flex flex-col lg:flex-row gap-10">
      <div class="flex-1 flex flex-col justify-center">
        <h1 class="text-3xl lg:text-4xl font-bold mb-4">
          {{ $product->name }}
        </h1>

        <p class="text-xl font-semibold text-red-700 mb-3">
          {{ number_format($product->price, 2, ',', ' ') }} €
        </p>

        @if($product->description)
          <p class="mb-4 text-sm text-gray-600 leading-relaxed">
            {{ $product->description }}
          </p>
        @endif

        <div class="mb-4 text-sm text-gray-500 space-y-1">
          @if($product->sizes)
            <p><span class="font-semibold">Sizes:</span> {{ $product->sizes }}</p>
          @endif
          @if($product->colors)
            <p><span class="font-semibold">Colors:</span> {{ $product->colors }}</p>
          @endif
        </div>
        <form method="POST" action="{{ route('cart.add', $product) }}">
          @csrf
          <button
            class="btn mt-2 rounded-full px-8 bg-[#8b0000] hover:bg-[#a30000] border-none text-white">
            Add to cart
          </button>
        </form>

        @auth
          <div class="flex gap-2 mt-4">
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-xs btn-outline">
              Muuda
            </a>
            <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                  onsubmit="return confirm('Kustuta see toode?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-xs btn-error">Kustuta</button>
            </form>
          </div>
        @endauth

        <a href="{{ route('shop') }}" class="mt-6 text-sm text-blue-500 hover:underline">
          ← Tagasi poodi
        </a>
      </div>
      <div class="flex-1 flex items-center justify-center">
        <div class="bg-white rounded-3xl shadow-lg p-6">
          @if($product->image_path)
            <img src="{{ asset('storage/'.$product->image_path) }}"
                 alt="{{ $product->name }}"
                 class="max-h-96 object-contain">
          @else
            <div class="h-64 w-64 flex items-center justify-center text-gray-400">
              No image
            </div>
          @endif
        </div>
      </div>

    </div>
  </main>
  <footer class="bg-[#7a0d0d] text-white pt-16 pb-10 border-t-4 border-[#1e90ff]">
    <div class="flex justify-center mb-8">
      <img src="{{ asset('logo.png') }}" alt="Chaos Logo" class="h-20 w-auto" />
    </div>
    <p class="max-w-2xl mx-auto text-center text-sm leading-relaxed">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry...
    </p>
    <p class="mt-10 text-center text-sm tracking-wide">
      CONTACT US &nbsp; HELP
    </p>
    <div class="flex justify-center gap-6 mt-6">
      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('twitter.png') }}" alt="Twitter" class="w-6 h-6" />
      </a>
      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('youtube.png') }}" alt="YouTube" class="w-6 h-6" />
      </a>
      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('facebook.png') }}" alt="Facebook" class="w-6 h-6" />
      </a>
      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('instagram.png') }}" alt="Instagram" class="w-6 h-6" />
      </a>
      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('gmail.png') }}" alt="Gmail" class="w-6 h-6" />
      </a>
    </div>
  </footer>

</body>
</html>
