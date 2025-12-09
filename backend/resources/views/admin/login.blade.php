<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Admin login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-900">

<div class="bg-white p-10 rounded-xl shadow-xl w-full max-w-sm">
    <h1 class="text-2xl font-bold text-center mb-6">Admin login</h1>

    @if ($errors->any())
        <div class="alert alert-error mb-4">
            Vale email või parool
        </div>
    @endif

    <form method="POST" action="/admin/login" class="space-y-4">
        @csrf

        <input type="email" name="email" placeholder="Email"
               class="input input-bordered w-full" required>

        <input type="password" name="password" placeholder="Parool"
               class="input input-bordered w-full" required>

        <button class="btn btn-primary w-full">Logi sisse</button>
    </form>
</div>

</body>
</html>
