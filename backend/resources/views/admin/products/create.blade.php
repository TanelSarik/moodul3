<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Lisa toode – Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white p-10">

<h1 class="text-3xl font-bold mb-6">Lisa uus toode</h1>

<form method="POST" action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data"
      class="space-y-4 max-w-xl">
    @csrf
    <input type="hidden" name="return_to" value="{{ url()->previous() }}">

    <div>
        <label class="block mb-1">Toote nimi</label>
        <input type="text" name="name" class="input input-bordered w-full"
               required value="{{ old('name') }}">
    </div>

    <div>
        <label class="block mb-1">Kirjeldus</label>
        <textarea name="description" class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Hind (€)</label>
        <input type="number" step="0.01" name="price"
               class="input input-bordered w-full"
               value="{{ old('price', 0) }}">
    </div>

    <div>
        <label class="block mb-1">Suurused (nt S,M,L)</label>
        <input type="text" name="sizes" class="input input-bordered w-full"
               value="{{ old('sizes') }}">
    </div>

    <div>
        <label class="block mb-1">Värvid (nt punane,must)</label>
        <input type="text" name="colors" class="input input-bordered w-full"
               value="{{ old('colors') }}">
    </div>

    <div>
        <label class="block mb-1">Pilt</label>
        <input type="file" name="image" class="file-input file-input-bordered w-full">
    </div>

    <button class="btn bg-green-600 border-none">Salvesta</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-ghost">Tagasi</a>
</form>

</body>
</html>
