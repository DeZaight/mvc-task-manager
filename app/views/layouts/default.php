<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link rel="shortcut icon" href="app/views/layouts/assets/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="app/views/layouts/css/main.css">

    <script src="https://kit.fontawesome.com/52e2ca1900.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            Task manager
        </a>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <?php if ($vars['auth']) : ?>
                    <a class="nav-link" data-toggle="modal" data-target="#logoutForm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php else : ?>
                    <a class="nav-link" data-toggle="modal" data-target="#signinForm">
                        <i class="fas fa-sign-in-alt"></i> Signin
                    </a>
                <?php endif ?>
            </li>
        </ul>
    </nav>

    <div class="wrapper">
        <?= $content ?>
    </div>

    <div class="modal fade" id="signinForm" tabindex="-1" role="dialog" aria-labelledby="signinFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signinFormLabel">Signin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" class="form-control" id="signinFormLogin" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" id="signinFormPassword" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-error" id="signinFormError"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="signinFormBtn">Signin</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutForm" tabindex="-1" role="dialog" aria-labelledby="logoutFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutFormLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            Are you sure?
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" id="logoutFormBtn">Yes</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="app/views/layouts/js/main.js"></script>
</body>

</html>