<div class="container mt-5 mb-5">

    <h1 class="h4 text-center"><?= $h1 ?></h1>

    <form class="form-signin" action="login" method="post">

        <label for="inputLogin" class="sr-only">Логин</label>
        <input type="text" id="inputLogin" name="login" class="form-control mb-2" placeholder="Логин" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Пароль" required>

        <button class="btn btn-lg btn-info btn-block" type="submit">Войти</button>

    </form>

</div>
