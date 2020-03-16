<div class="container">
    <?php if (!empty($vars['tasks'])) : ?>

        <?php foreach ($vars['tasks'] as $key => $value) : ?>
            <div class="task row d-flex justify-content-center" id="task<?= $value['id'] ?>">
                <div class="task__wrapper col-6">
                    <div class="row">
                        <div class="task__title col-12"> <?= $value['name'] ?> <span class="task__email">(<?= $value['email'] ?>)</span></div>
                        <?php if ($vars['auth']) : ?>
                            <a class="edit-button" onclick="editTask(<?= $value['id'] ?>)"><i class="fas fa-edit"></i></a>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="task__text col">
                            <?= $value['description'] ?>
                        </div>
                    </div>
                    <div class="row f-flex justify-content-between">
                        <div class="task__status col-8">
                            <?php if ($value['status'] == 1) : ?>
                                <span class="badge badge-warning">In progress</span>

                            <?php elseif ($value['status'] == 2) : ?>
                                <span class="badge badge-success">Complite</span>
                            <?php endif ?>

                            <?php if ($value['edited']) : ?>
                                <span class="badge badge-secondary">Edited</span>
                            <?php endif ?>
                        </div>

                        <?php if ($vars['auth']) : ?>
                            <div class="save col-auto"></div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <?php if ($vars['pagesCount'] > 1) : ?>
        <div class="row d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $vars['pagesCount']; $i++) : ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor ?>
                </ul>
            </nav>
        </div>
    <?php endif ?>
</div>

<button class="add-task btn btn-primary" data-toggle="modal" data-target="#addNewTask">
    <i class="fas fa-plus"></i>
</button>

<div class="modal fade" id="addNewTask" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTaskLabel">Create new task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="addNewTaskName" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="email" class="form-control" id="addNewTaskEmail" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" id="addNewTaskTextarea" rows="3" style="resize: none" placeholder="Your awesome task..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-error" id="addNewTaskError"></div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNewTaskBtn">Create task</button>
            </div>
        </div>
    </div>
</div>