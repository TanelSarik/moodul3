<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Muuda toodet</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white p-10">

  <h1 class="text-3xl font-bold mb-6">Muuda toodet</h1>

  <form method="POST"
        action="{{ route('admin.products.update', $product) }}"
        enctype="multipart/form-data"
        class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')

    <div>
      <label class="block mb-1">Toote nimi</label>
      <input type="text" name="name" class="input input-bordered w-full"
             required value="{{ old('name', $product->name) }}">
    </div>

    <div>
      <label class="block mb-1">Kirjeldus</label>
      <textarea name="description"
                class="textarea textarea-bordered w-full">{{ old('description', $product->description) }}</textarea>
    </div>

    <div>
      <label class="block mb-1">Hind (€)</label>
      <input type="number" step="0.01" name="price"
             class="input input-bordered w-full"
             value="{{ old('price', $product->price) }}">
    </div>

    <div>
      <label class="block mb-1">Suurused</label>
      <input type="text" name="sizes" class="input input-bordered w-full"
             value="{{ old('sizes', $product->sizes) }}">
    </div>

    <div>
      <label class="block mb-1">Värvid</label>
      <input type="text" name="colors" class="input input-bordered w-full"
             value="{{ old('colors', $product->colors) }}">
    </div>

    <div>
      <label class="block mb-1">Pilt</label>
      @if($product->image_path)
        <div class="mb-2">
          <img src="{{ asset('storage/'.$product->image_path) }}" class="h-24">
        </div>
      @endif
      <input type="file" name="image"
             class="file-input file-input-bordered w-full">
    </div>

    <button class="btn bg-green-600 border-none">Salvesta muudatused</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-ghost">Tagasi</a>
  </form>

</body>
</html>
