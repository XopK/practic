<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Capybara.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/#about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/#courses">Курсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/#enroll">Записаться</a>
                </li>
                <div class="d-flex" style="gap: 10px">
                    @guest
                        <a href="/login" class="btn btn-outline-primary">Вход</a>
                        <a href="/reg" class="btn btn-outline-success">Регистрация</a>
                    @endguest
                    @auth
                        <a href="/acc" class="btn btn-primary">Личный кабинет</a>
                        <a href="/logout" class="btn btn-danger">Выход</a>
                    @endauth
                </div>
            </ul>
        </div>
    </div>
</nav>
