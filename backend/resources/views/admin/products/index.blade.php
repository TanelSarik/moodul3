<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Tooted – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white p-10">

<h1 class="text-3xl font-bold mb-6">Tooted</h1>

<a href="{{ route('admin.products.create') }}"
   class="btn btn-sm bg-green-600 border-none mb-4">
    + Lisa uus toode
</a>

@if(session('success'))
    <div class="mb-4 text-green-300">
        {{ session('success') }}
    </div>
@endif

<table class="table w-full text-sm">
    <thead>
    <tr>
        <th>Nimi</th>
        <th>Hind</th>
        <th>Suurused</th>
        <th>Värvid</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr class="border-b border-slate-700">
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }} €</td>
            <td>{{ $product->sizes }}</td>
            <td>{{ $product->colors }}</td>
            <td class="flex gap-2">
                <a href="{{ route('admin.products.edit', $product) }}"
                   class="btn btn-xs btn-outline">
                    Muuda
                </a>
                <form method="POST"
                      action="{{ route('admin.products.destroy', $product) }}"
                      onsubmit="return confirm('Kustuta toode?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-error">
                        Kustuta
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
