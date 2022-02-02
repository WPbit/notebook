<div class="container mt-5">

    <h1 class="h4 text-center"><?= $h1 ?></h1>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form action="add" method="post">
                <div class="form-group">
                    <label for="inputName" class="small">Имя</label>
                    <input type="text" name="name" class="form-control" id="inputName" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="small">Адрес электронной почты</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" required>
                </div>
                <div class="form-group">
                    <label for="inputText" class="small">Текст заметки</label>
                    <textarea name="text" class="form-control" id="inputText"></textarea>
                </div>

                <button type="submit" class="btn btn-info mt-3">Сохранить</button>
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>

</div>
