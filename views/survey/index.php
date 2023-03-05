<?php require_once 'views/partials/header.php'; ?>

<h2>My surveys</h2>

<section class="h-auto gradient-form" style="background-color: #eee;">
    <div class="container py-3">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-12">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="card-body p-md-5 mx-md-4">
                                <table class="surveys" id="surveys">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th class="no_sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($surveys)) { ?>
                                            <?php foreach($surveys as $survey) { ?>
                                                <tr>
                                                    <td><?= $survey['id']; ?></td>
                                                    <td><?= $survey['question']; ?></td>
                                                    <td><?= $survey['status']; ?></td>
                                                    <td><?= $survey['created_at']; ?></td>
                                                    <td>
                                                        <a href="/survey/view/<?= $survey['id']; ?>" class="btn btn-info">View</a>
                                                        <a href="/survey/edit/<?= $survey['id']; ?>" class="btn btn-success">Edit</a>
                                                        <a href="/survey/delete/<?= $survey['id']; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="/assets/css/jquery.dataTables.min.css">
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#surveys', {
    "responsive": true,
    "searching": false,
    'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['no_sort']
    }]
});
</script>

<?php require_once 'views/partials/footer.php'; ?>