<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel App</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center">Artikel</h1>
                <h1>Artikel Terbaru</h1>
                <p class="mt-3">{{ $article->content ?? 'Belum ada artikel' }}</p>

                <!-- Pencarian Kata -->
                <h2 class="mt-4">Pencarian Kata</h2>
                <form action="{{ route('article.search') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="keyword" class="form-control" placeholder="Masukkan kata" required>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
                @if(isset($keyword))
                    <div class="alert alert-info mt-3">
                        Kata "<strong>{{ $keyword }}</strong>" ditemukan sebanyak <strong>{{ $count }}</strong> kali.
                    </div>
                @endif

                <h2 class="mt-4">Ganti Kata</h2>
                <form action="{{ route('article.replace') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-5">
                        <input type="text" name="find" class="form-control" placeholder="Cari kata" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="replace" class="form-control" placeholder="Ganti dengan" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning">Ganti</button>
                    </div>
                </form>

                <h2 class="mt-4">Urutkan Kata</h2>
                <a href="{{ route('article.sort') }}" class="btn btn-success">Urutkan</a>

                @if(isset($words))
                    <ul class="list-group mt-3">
                        @foreach($words as $word)
                            <li class="list-group-item">{{ $word }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
