<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact us</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-black">
  <div class="navbar bg-base-100 shadow-sm" style="background-color: brown">
    <div class="navbar-start">
      <a class="btn btn-ghost w-40" href="/">
        <img src="{{ asset('logo.png') }}" alt="Logo" />
      </a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1 gap-2">
        <a class="btn" href="/pood">shop</a>
        <a class="btn btn-active" href="/contact">contact</a>
      </ul>
    </div>
    <div class="navbar-end">
      <button class="btn">cart</button>
    </div>
  </div>
  <section class="py-20 px-6 lg:px-24 text-white">
    <h1 class="text-5xl font-bold mb-10">Contact us</h1>
    @if (session('success'))
      <div class="alert alert-success mb-6">
        {{ session('success') }}
      </div>
    @endif
    <div class="max-w-xl bg-base-100 rounded-3xl shadow-xl p-10 text-black">
      <form class="space-y-5" method="POST" action="{{ route('contact.store') }}">
        @csrf
        <div class="form-control">
          <label class="label font-semibold">Your name</label>
          <input type="text" name="name" class="input input-bordered w-full" required>
        </div>
        <div class="form-control">
          <label class="label font-semibold">Email</label>
          <input type="email" name="email" class="input input-bordered w-full" required>
        </div>
        <div class="form-control">
          <label class="label font-semibold">Message</label>
          <textarea name="message" class="textarea textarea-bordered w-full" rows="5" required></textarea>
        </div>
        <button class="btn w-full bg-red-800 hover:bg-red-900 text-white border-none">
          Send message
        </button>
      </form>
    </div>
  </section>
  <footer class="bg-[#7a0d0d] text-white pt-16 pb-10 mt-20">
    <div class="flex justify-center mb-8">
      <img src="{{ asset('logo.png') }}" alt="Chaos Logo" class="h-20 w-auto" />
    </div>
    <p class="text-center text-sm max-w-xl mx-auto">
      Get in touch with us – we usually respond within 24 hours.
    </p>
  </footer>
</body>
</html>
