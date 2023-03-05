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

                                <form method="POST" action="/survey/edit/<?= $survey['id'] ?>">
                                    <div class="form-group">
                                        <label for="question">Question:</label>
                                        <input type="text" class="form-control" id="question" name="question" value="<?= $survey['question'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="answers">Answers:</label>
                                        <div class="w-100 input-group mb-3">
                                        <?php foreach ($survey['options'] as $option) : ?>
                                            <input type="text" class="w-100  form-control mt-2" name="answers[]" value="<?= $option['answer'] ?>">
                                        <?php endforeach; ?>
                                        </div>

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary add-answer" type="button">Add Answer</button>
                                        </div>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="status">Status:</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="draft" <?php if($survey['status'] === 'draft') echo "selected"; ?>>Draft</option>
                                            <option value="published" <?php if($survey['status'] === 'published') echo "selected"; ?>>Published</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/main.js"></script>

<?php require_once 'views/partials/footer.php'; ?>