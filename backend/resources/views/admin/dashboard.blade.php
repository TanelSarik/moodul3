<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Admin töötab ✅</h1>

<form method="POST" action="/admin/logout">
    @csrf
    <button>Logi välja</button>
</form>

</body>
</html>
