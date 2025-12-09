<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Avaleht</title>

  <!-- Tailwind + DaisyUI CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />

  <!-- sinu enda CSS (kui sul seda on) -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

  <!-- NAVBAR -->
  <div class="navbar bg-base-100 shadow-sm" style="background-color: brown">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>

        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li><a href="#">Item 1</a></li>
          <li>
            <a>Parent</a>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </li>
          <li><a href="#">Item 3</a></li>
        </ul>
      </div>

      <!-- Logo -->
      <a class="btn btn-ghost w-40">
        <img src="{{ asset('logo.png') }}" alt="Logo" />
      </a>
    </div>

    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1 gap-2">

        <!-- NAVIGATSIOON LARAVELI ROUTE`IDEGA -->
       <a class="btn" href="{{ route('shop') }}">shop</a>
        <a class="btn" href="/contact">Contact us</a>

      </ul>
    </div>
    <div class="navbar-end gap-3">


  @guest
    {{-- kui admin EI ole sisse logitud --}}
    <a href="{{ route('admin.login') }}"
       class="btn btn-sm btn-outline border-white text-white hover:bg-white hover:text-black">
      Admin login
    </a>
  @endguest

  @auth
    {{-- kui admin on sisse logitud --}}
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit"
              class="btn btn-sm btn-outline border-green-400 text-green-200 hover:bg-green-400 hover:text-black">
        Admin: {{ auth()->user()->name }} (logout)
      </button>
    </form>
  @endauth
</div>

    <a href="{{ route('cart.index') }}" class="btn btn-sm bg-white text-black border-none shadow">
  cart
</a>
  </div>
<div class="navbar-end gap-3">
  {{-- ostukorv --}}

</div>


  <!-- HERO SECTION -->
  <div class="hero min-h-150" style="
        background-image: url(https://img.freepik.com/free-photo/esports-presentation-background-3d-illustration_1419-2783.jpg?semt=ais_hybrid&w=740&q=80);
      ">
    <div class="hero-overlay backdrop-blur-md bg-black/30"></div>
    <div class="hero-content text-neutral-content text-center">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">never back down never what</h1>
        <p class="mb-5">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda
          excepturi exercitationem quasi. In deleniti eaque aut repudiandae et
          a id nisi.
        </p>

        <!-- Laravel route link -->
        <a class="btn bg-red-800 text-white" href="/pood">buy Merch</a>
      </div>
    </div>
  </div>

  <!-- BANNER -->
  <div class="w-full bg-gradient-to-b from-[#7b0000] via-[#8b0000] to-[#5a0000] text-center text-white font-bold py-5 shadow-sm">
    Chaos on the field
  </div>

  <!-- PLAYERS -->
  <section class="bg-black py-16">
    <h2 class="text-4xl font-bold text-left text-white mb-12 lg:px-24">Our players</h2>

    <div class="flex flex-wrap justify-center gap-8">

      <!-- PLAYER KAARDID (uuenda pildid vastavalt public kaustale) -->
      <div class="card w-60 bg-white shadow-xl rounded-2xl overflow-hidden">
        <figure class="p-3">
          <img src="{{ asset('PLAYER1.png') }}" class="rounded-2xl" />
        </figure>
        <div class="card-body items-center text-center p-4">
          <h2 class="font-semibold text-black">Jon Jones</h2>
          <p class="text-xs text-gray-500">IGL</p>
        </div>
      </div>

      <div class="card w-60 bg-white shadow-xl rounded-3xl overflow-hidden">
        <figure class="p-3">
          <img src="{{ asset('PLAYER2.png') }}" class="rounded-2xl" />
        </figure>
        <div class="card-body items-center align-text-bottom p-4">
          <h2 class="font-semibold text-black">Jon Jones</h2>
          <p class="text-xs text-gray-500">IGL</p>
        </div>
      </div>

      <div class="card w-80 bg-white shadow-xl rounded-4xl overflow-hidden">
        <figure class="p-4">
          <img src="{{ asset('PLAYER3.png') }}" class="rounded-2xl" />
        </figure>
        <div class="card-body items-center align-text-bottom p-4">
          <h2 class="font-semibold text-black">Jon Jones</h2>
          <p class="text-xs text-gray-500">IGL</p>
        </div>
      </div>

      <div class="card w-60 bg-white shadow-xl rounded-3xl overflow-hidden">
        <figure class="p-4">
          <img src="{{ asset('PLAYER4.png') }}" class="rounded-2xl" />
        </figure>
        <div class="card-body items-center align-text-bottom p-4">
          <h2 class="font-semibold text-black">Jon Jones</h2>
          <p class="text-xs text-gray-500">IGL</p>
        </div>
      </div>

      <div class="card w-60 bg-white shadow-xl rounded-3xl overflow-hidden">
        <figure class="p-4">
          <img src="{{ asset('PLAYER5.png') }}" class="rounded-2xl" />
        </figure>
        <div class="card-body items-center text-center p-4">
          <h2 class="font-semibold text-black">Jon Jones</h2>
          <p class="text-xs text-gray-500">IGL</p>
        </div>
      </div>

    </div>
  </section>

  <!-- POPULAR ITEMS -->
  <section class="bg-black py-16 px-6 lg:px-24">
    <h2 class="text-4xl font-bold text-white mb-12">Popular items</h2>

    <div class="flex flex-wrap justify-center gap-12">

      <div class="flex flex-col items-center">
        <div class="card w-64 h-[360px] bg-base-100 rounded-3xl shadow-xl overflow-hidden flex items-center justify-center">
          <figure class="p-10">
            <img src="{{ asset('mug.png') }}" class="w-full h-auto" />
          </figure>
        </div>

        <div class="mt-4 text-center text-white">
          <p class="font-semibold">Black Notepad</p>
          <p class="text-sm text-gray-300">40,20 €</p>
        </div>

        <a class="mt-4 btn rounded-full px-8 bg-[#8b0000] hover:bg-[#a30000] border-none text-white"
           href="/kruus">Add to cart</a>
      </div>

      <div class="flex flex-col items-center">
        <div class="card w-64 h-[360px] bg-base-100 rounded-3xl shadow-xl overflow-hidden flex items-center justify-center">
          <figure class="p-10">
            <img src="{{ asset('shirt.png') }}" class="w-full h-auto" />
          </figure>
        </div>

        <div class="mt-4 text-center text-white">
          <p class="font-semibold">Black Notepad</p>
          <p class="text-sm text-gray-300">40,20 €</p>
        </div>

        <a class="mt-4 btn rounded-full px-8 bg-[#8b0000] hover:bg-[#a30000] border-none text-white"
           href="/detail">Add to cart</a>
      </div>

      <div class="flex flex-col items-center">
        <div class="card w-64 h-[360px] bg-base-100 rounded-3xl shadow-xl overflow-hidden flex items-center justify-center">
          <figure class="p-10">
            <img src="{{ asset('bag.png') }}" class="w-full h-auto" />
          </figure>
        </div>

        <div class="mt-4 text-center text-white">
          <p class="font-semibold">Black Notepad</p>
          <p class="text-sm text-gray-300">40,20 €</p>
        </div>

        <a class="mt-4 btn rounded-full px-8 bg-[#8b0000] hover:bg-[#a30000] border-none text-white"
           href="/kott">Add to cart</a>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-[#7a0d0d] text-white pt-16 pb-10 border-t-4 border-[#1e90ff]">
    <div class="flex justify-center mb-8">
      <img src="{{ asset('logo.png') }}" alt="Chaos Logo" class="h-20 w-auto" />
    </div>

    <p class="max-w-2xl mx-auto text-center text-sm leading-relaxed">
      Lorem Ipsum is simply dummy text of the printing and typesetting
      industry...
    </p>

    <p class="mt-10 text-center text-sm tracking-wide">
      CONTACT US &nbsp; HELP
    </p>

    <div class="flex justify-center gap-6 mt-6">
      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('twitter.png') }}" class="w-6 h-6" />
      </a>

      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('youtube.png') }}" class="w-6 h-6" />
      </a>

      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('facebook.png') }}" class="w-6 h-6" />
      </a>

      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('instagram.png') }}" class="w-6 h-6" />
      </a>

      <a href="#" class="bg-white rounded-full p-3 hover:scale-110 transition">
        <img src="{{ asset('gmail.png') }}" class="w-6 h-6" />
      </a>
    </div>
  </footer>

  <!-- JS fail (kui sul seda on) -->
  <script type="module" src="{{ asset('js/main.js') }}"></script>

</body>
</html>
