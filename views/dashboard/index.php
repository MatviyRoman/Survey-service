<?php require_once 'views/partials/header.php'; ?>

<h2>Dashboard</h2>

<section class="h-auto gradient-form" style="background-color: #eee;">
    <div class="container py-3">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="card-body p-md-5 mx-md-4">

                                <a href="/survey/create" class="btn btn-success m-2">Create Survey</a>
                                <br>
                                <a href="/surveys" class="btn btn-success m-2">My Survey</a>
                                <br>
                                <a href="/logout" class="btn btn-danger m-2">Logout</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'views/partials/footer.php'; ?>