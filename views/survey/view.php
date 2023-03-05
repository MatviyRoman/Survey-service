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

                            <h3>Question:</h3>
                            <p><?= $survey['question'] ?></p>
                            <h4>Answers:</h4>

                            <?php foreach ($survey['options'] as $option) : ?>
                                <p><?= $option['answer'] ?> <b>votes:</b> <?= $option['votes'] ?></p>
                            <?php endforeach; ?>

                            <h4>Status:</h4>
                            <p><?= $survey['status'] ?></p>

                            <h4>Created at:</h4>
                            <p><?= $survey['created_at'] ?></p>
                            <h4>Updated at:</h4>
                            <p><?= $survey['updated_at'] ?></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'views/partials/footer.php'; ?>