<?php require_once 'views/partials/header.php'; ?>

<!-- <h2>Login</h2> -->

<!-- <form method="POST" action="index.php?page=login">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form> -->

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Register</h4>
                                </div>

                                <form method="POST" action="register">
                                    <p>Please register your account</p>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Email</label>
                                        <input name="email" type="email" id="form2Example11" class="form-control" placeholder="Email address" value="<?= $email ?>" required />
                                        <?php
                                        if(isset($errors['email'])) :
                                            echo '<p class="text-danger">'.$errors['email'].'</p>';
                                        endif; ?>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Password</label>
                                        <input name="password" type="password" id="form2Example22" class="form-control" value="<?= $password ?>" required />
                                        <?php
                                        if(isset($errors['password'])) :
                                            echo '<p class="text-danger">'.$errors['password'].'</p>';
                                        endif; ?>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                                        <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">You have an account?</p>
                                        <a href="/login" class="btn btn-outline-danger">Login</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2 overflow-auto">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Survey service</h4>
                                <p class="small mb-0">
                                    Service aggregator for conducting fake surveys

                                    A necessary service that can provide functionality for managing fake surveys (with a predetermined number of votes) (hereinafter referred to as "surveys").
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card my-4">
        <div class="card-body">
          <h5 class="card-title">Service aggregator for conducting fake surveys</h5>
          <p class="card-text">
            <pre>

A necessary service that can provide functionality for managing fake surveys (with a predetermined number of votes) (hereinafter referred to as "surveys").

The service user should be able to enter the public part of the program, register, and create any number of surveys with a predetermined number of answers to a particular question in the format:

Question?

1. Answer 1
2. Answer 2
3. ...
...
n. ...

Necessary functionality:

1. Authentication on the service.
Registration page
Login page
Logout
2. The user only needs an email and password.
3. Authenticated users go to their personal account.
4. Personal cabinet:
Contains a section with a list of their own surveys.
Sorting the list by "creation date", "title", "status".
CRUD for managing surveys.
Each survey contains:
text of the question (title);
any number of answers;
number of votes for each answer;
status "draft" or "published".

The end user who uses this service should have access to the API to receive data on a published random survey from their list.
The data should include:
Title
response items with the number of votes for each of them.

The API will be tested using Postman.

Implementation requirements:

It is necessary to implement the MVC model using pure PHP
PHP frameworks cannot be used, libraries can be used.
This application does not require a complex architecture, solve the tasks set with the minimum amount of code.
Bootstrap layout, no special requirements.

After completing the task, it is necessary to:
Provide a link to the git repository of your work.
Provide minimal necessary documentation in any readable format with a description of the API's operation.
Deploy on any free hosting so that you can see the result.
</pre>
</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'views/partials/footer.php'; ?>