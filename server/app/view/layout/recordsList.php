<div class="container mt-5 mb-5">

    <h1 class="h4 text-center"><?= $h1 ?></h1>

    <div class="row">

        <div class="col-md-6">
            <nav aria-label="notes">
                <ul class="pagination pagination-sm">
                    <?php for ($i = 1; $i <= $pagination['countPages']; ++$i): ?>
                        <?php if (isset($_GET['p']) && $_GET['p'] == $i): ?>
                            <li class="page-item active"><a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a></li>
                        <?php elseif (!isset($_GET['p']) && $i == 1): ?>
                            <li class="page-item active"><a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link" href="?p=<?= $i ?>"><?= $i ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>

        <div class="col-md-6 text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-info dropdown-toggle" href="#" role="button" id="sortMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Сортировать по: <?php if (!empty($_COOKIE['sort'])) { echo $_COOKIE['sort']; } ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortMenu">
                    <a class="dropdown-item" href="#" onclick="sort('name')">Имя</a>
                    <a class="dropdown-item" href="#" onclick="sort('email')">Электронная почта</a>
                    <a class="dropdown-item" href="#" onclick="sort('admin_edit')">Отредактированные</a>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <?php foreach ($showRecords as $values): ?>
        <div class="col-md-6 mt-4">
            <div class="p-3 border shadow bg-light">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green" class="bi bi-pin-angle-fill mt-n5" viewBox="0 0 16 16">
                        <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
                    </svg>
                </div>
                <p><b>Имя:</b> <?= $values['name']; ?><br>
                <b>Email:</b> <?= $values['email']; ?></p>
                <p><b>Заметка:</b> <?= $values['text']; ?></p>
                <?php if ($values['admin_edit'] == 1): ?>
                    <p class="text-center text-muted small">(Отредактировано администратором)</p>
                <?php endif; ?>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true): ?>
                <p class="text-center">
                    <a class="text-info small" href="edit?rec=<?= $values['id'] ?>">Редактировать</a>
                </p>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<script>
    function sort(sort)
    {
        document.cookie = 'sort=' + sort;
        location.reload();
    }
</script>
