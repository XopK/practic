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

<style>
    .hero {
        height: 75vh;
        width: 100%;
        overflow: hidden;
        background-image: url("storage/img/programming-languages.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 20%;
    }
</style>

<body>
    <x-header />
    <main>
        <section id="hero" class="hero d-flex justify-content-center align-items-center text-white">
            <h1 class="bg-dark p-1 opacity-75">Онлайн курсы - это круто!</h1>
        </section>
        <section id="about">
            <div class="container">
                <h2 style="margin:20px 0 20px 0">О нас</h2>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Информация о нас 1</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Информация о нас 2</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Информация о нас 3</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Информация о нас 4</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="courses">
            <div class="container">
                <h2 style="margin:20px 0 20px 0">Курсы</h2>
                <div class="d-flex flex-wrap">
                    @foreach ($courses as $item)
                        <div class="card" style="width: 18rem; margin: 10px 30px 0 0;">
                            <img src='storage/img/{{ $item->image }}' class="card-img-top" alt="IMG_2152.png">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-text">Длительность: {{ $item->duration }} недель(-и/-я)</p>
                                <h3 class="card-text">{{ $item->cost }}₽</h3>
                                <a href="#" class="btn btn-primary">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- @foreach ($errors->all() as $item)
            {{ $item }}
        @endforeach --}}

        <section id="enroll">
            <div class="container">
                <h2 style="margin:20px 0 20px 0">Записаться на курс</h2>
                <form method="POST" action="/enroll">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Ваш email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите курс</label>
                        <select class="form-select" name="course" required>
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Оставить заявку</button>
                </form>
            </div>

        </section>
    </main>
    <footer></footer>
</body>

</html>
