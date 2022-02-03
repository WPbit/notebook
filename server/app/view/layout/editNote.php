<div class="container mt-5 mb-5">

    <h1 class="h4 text-center"><?= $h1 ?></h1>

    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <p><b>Имя:</b> <?= $record[0]['name'] ?><br>
            <b>Email:</b> <?= $record[0]['email'] ?></p>

            <form action="edit" method="post">

                <input type="hidden" name="id" value="<?= $record[0]['id'] ?>">

                <div class="form-group">
                    <label for="inputText"><b>Текст задачи:</b></label>
                    <textarea name="text" class="form-control" id="inputText"><?= $record[0]['text'] ?></textarea>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="edited" type="checkbox" id="checkbox1" value="1">
                    <label class="form-check-label" for="checkbox1">Выполнено</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info mt-3">Сохранить</button>
                </div>

            </form>

        </div>
        <div class="col-md-3"></div>
    </div>

</div>
