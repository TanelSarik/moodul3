<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Ostukorv</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen p-10">

  <h1 class="text-3xl font-bold mb-6">Ostukorv</h1>

  @if(session('success'))
    <div class="mb-4 p-3 bg-green-600 rounded-lg">
      {{ session('success') }}
    </div>
  @endif

  @if($products->isEmpty())
    <p>Ostukorv on tühi.</p>
  @else
    <table class="table w-full mb-6">
      <thead>
      <tr>
        <th>Toode</th>
        <th>Kogus</th>
        <th>Hind</th>
        <th>Kokku</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach($products as $product)
        @php $qty = $cart[$product->id]; @endphp
        <tr class="border-b border-slate-700">
          <td>{{ $product->name }}</td>
          <td>{{ $qty }}</td>
          <td>{{ number_format($product->price, 2, ',', ' ') }} €</td>
          <td>{{ number_format($product->price * $qty, 2, ',', ' ') }} €</td>
          <td>
            <form method="POST" action="{{ route('cart.remove', $product) }}"
                  onsubmit="return confirm('Eemalda toode ostukorvist?')">
              @csrf
              <button class="btn btn-xs btn-error">Eemalda</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    <div class="flex items-center justify-between">
      <p class="text-xl font-semibold">
        Kokku: {{ number_format($total, 2, ',', ' ') }} €
      </p>

      <form method="POST" action="{{ route('cart.clear') }}">
        @csrf
        <button class="btn btn-outline btn-sm border-red-400 text-red-300">
          Tühjenda korv
        </button>
      </form>
    </div>
  @endif

  <div class="mt-8">
    <a href="{{ route('shop') }}" class="btn btn-ghost">← Tagasi poodi</a>
  </div>

</body>
</html>
