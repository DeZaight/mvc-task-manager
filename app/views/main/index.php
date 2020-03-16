<div class="container">
    <div class="task row d-flex justify-content-center">
        <div class="task__wrapper col-6">
            <div class="row">
                <div class="task__title col-12"> Test User <span class="task__email">(email@mail.com)</span></div>
            </div>
            <div class="row">
                <div class="task__text col-12">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod numquam eligendi necessitatibus eius, atque optio quos dicta. Iure exercitationem corporis, sapiente in cupiditate dolor quasi unde non adipisci quas quibusdam?
                </div>
            </div>
        </div>
    </div>
    <div class="task row d-flex justify-content-center">
        <div class="task__wrapper col-6">
            <div class="row">
                <div class="task__title col-12">Test User <span class="task__email">(email@mail.com)</span></div>
            </div>
            <div class="row">
                <div class="task__text col-12">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod numquam eligendi necessitatibus eius, atque optio quos dicta. Iure exercitationem corporis, sapiente in cupiditate dolor quasi unde non adipisci quas quibusdam?
                </div>
            </div>
        </div>
    </div>
    <div class="task row d-flex justify-content-center">
        <div class="task__wrapper col-6">
            <div class="row">
                <div class="task__title col-12">Test User <span class="task__email">(email@mail.com)</span></div>
            </div>
            <div class="row">
                <div class="task__text col-12">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod numquam eligendi necessitatibus eius, atque optio quos dicta. Iure exercitationem corporis, sapiente in cupiditate dolor quasi unde non adipisci quas quibusdam?
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
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
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNewTaskBtn">Create task</button>
            </div>
        </div>
    </div>
</div>