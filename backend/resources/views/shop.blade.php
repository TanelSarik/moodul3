<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pood</title>

  {{-- Tailwind + DaisyUI --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />

  {{-- sinu enda CSS, kui on --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-black">

  {{-- NAVBAR --}}
  <div class="navbar bg-base-100 shadow-sm" style="background-color: brown">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <ul tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li><a href="/">Home</a></li>
          <li><a href="{{ route('shop') }}">Pood</a></li>
          <li><a href="/contact">Kontakt</a></li>
        </ul>
      </div>

      <a class="btn btn-ghost w-40" href="/">
        <img src="{{ asset('logo.png') }}" alt="Logo" />
      </a>
    </div>

    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1 gap-2">
        <a class="btn btn-active" href="{{ route('shop') }}">shop</a>
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

  {{-- POOD – tooted DB-st --}}
  <section class="bg-black py-16 px-6 lg:px-24">
    <div class="flex items-center justify-between mb-12">
  <h2 class="text-4xl font-bold text-white">Popular items</h2>

  @auth
    <a href="{{ route('admin.products.create') }}"
       class="btn btn-sm bg-green-600 hover:bg-green-700 border-none text-white">
      + Lisa toode
    </a>
  @endauth
</div>

    <div class="flex flex-wrap justify-center gap-12">

      @forelse($products as $product)
        <div class="flex flex-col items-center">
          <div
            class="card w-64 h-[360px] bg-base-100 rounded-3xl shadow-xl overflow-hidden flex items-center justify-center">
            <a href="{{ route('product.show', $product) }}">
  <div
    class="card w-64 h-[360px] bg-base-100 rounded-3xl shadow-xl overflow-hidden flex items-center justify-center hover:scale-105 transition">
    <figure class="p-10">
      @if($product->image_path)
        <img src="{{ asset('storage/'.$product->image_path) }}"
             alt="{{ $product->name }}"
             class="w-full h-auto object-contain" />
      @endif
    </figure>
  </div>
</a>

<div class="mt-4 text-center text-white">
  <a href="{{ route('product.show', $product) }}" class="font-semibold hover:underline">
    {{ $product->name }}
  </a>
  <p class="text-sm text-gray-300">
    {{ number_format($product->price, 2, ',', ' ') }} €
  </p>
  ...
</div>
          </div>

          <div class="mt-4 text-center text-white">
            <p class="font-semibold">{{ $product->name }}</p>
            <p class="text-sm text-gray-300">
              {{ number_format($product->price, 2, ',', ' ') }} €
            </p>

            @if($product->sizes)
              <p class="text-xs text-gray-400">Sizes: {{ $product->sizes }}</p>
            @endif

            @if($product->colors)
              <p class="text-xs text-gray-400">Colors: {{ $product->colors }}</p>
            @endif
          </div>

          <form method="POST" action="{{ route('cart.add', $product) }}" class="mt-4">
  @csrf
  <button
    class="btn rounded-full px-8 bg-[#8b0000] hover:bg-[#a30000] border-none text-white">
    Add to cart
  </button>
</form>

@auth
  <div class="flex gap-2 mt-3">
    <a href="{{ route('admin.products.edit', $product) }}"
       class="btn btn-xs btn-outline">
      Muuda
    </a>

    <form method="POST"
          action="{{ route('admin.products.destroy', $product) }}"
          onsubmit="return confirm('Kustuta see toode?')">
      @csrf
      @method('DELETE')
      <button class="btn btn-xs btn-error">
        Kustuta
      </button>
    </form>
  </div>
@endauth
      <form method="POST" action="{{ route('cart.add', $product) }}" class="mt-4">
  @csrf

</form>
        </div>
      @empty
        <p class="text-white">Hetkel ühtegi toodet ei ole. Lisa midagi admin-paneelis.</p>
      @endforelse

    </div>
  </section>

  {{-- FOOTER --}}
  <footer class="bg-[#7a0d0d] text-white pt-16 pb-10 border-t-4 border-[#1e90ff]">
    <div class="flex justify-center mb-8">
      <img src="{{ asset('logo.png') }}" alt="Chaos Logo" class="h-20 w-auto" />
    </div>
    <p class="max-w-2xl mx-auto text-center text-sm leading-relaxed">
      Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry’s standard dummy text ever
      since the 1500s, when an unknown printer took a galley of type and
      scrambled it to make a type specimen book.
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

  <script type="module" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
