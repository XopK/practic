<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capybara.com - панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
        a>img {
            width: 25px;
        }
    </style>
</head>
<x-admin.header />

<body>
    <main>
        <section>
            <div class="container">
                <h2 class="m-3">Список заявок</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Имя клиента</th>
                            <th scope="col">Курс</th>
                            <th scope="col">Дата заявки</th>
                            <th scope="col">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_applications as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->course_id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->is_confirm == 0)
                                        Не подтвержденна
                                    @else
                                        Подтвержденна
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_confirm == 1)
                                    @else
                                        <a href="/application/{{ $item->id }}/confirm">
                                            <img src="storage/img/free-icon-check-1828640.png" alt="Принять">
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div class="container">
                <h2 class="m-3">Добавить курс</h2>
                <form action="/course/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название курса</label>
                        <input type="text" class="form-control" id="title" name="title">
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание курса</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Стоимость курса</label>
                        <input type="text" class="form-control" id="cost" name="cost">
                        @error('cost')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Длительность курса (в неделях)</label>
                        <input type="number" class="form-control" id="duration" name="duration">
                        @error('cost')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение курса</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Категория курса</label>
                        <select class="form-select" name="category">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                    {{ session()->get('succes') }}
                </form>
            </div>
        </section>
        <section>
            <div class="container">
                <h2 class="m-3">Добавить категорию</h2>
                <form action="/category/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название категории</label>
                        <input type="text" class="form-control" id="title_cat" name="title_cat">
                        @error('title_cat')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </section>
    </main>

</body>

</html>
