<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capybra.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <x-header />
    <div class="container" style="margin-top: 40px;">
        <h1>{{ $cate->title }}</h1>
        @forelse ($courses as $item)
            <div class="d-flex flex-wrap">
                <div class="card" style=" margin: 10px 30px 0 0;">
                    <img src='/storage/img/{{ $item->image }}' class="card-img-top" loading="lazy" alt="IMG_2152.png">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text">Длительность: {{ $item->duration }} недель(-и/-я)</p>
                        <h3 class="card-text">{{ $item->cost }}₽</h3>
                        <a href="#" class="btn btn-primary">Купить</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="card-body">
                Пусто
            </div>
        @endforelse
    </div>
    </div>
</body>

</html>
