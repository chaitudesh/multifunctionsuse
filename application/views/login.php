<?php
$this->load->helper('url');
$this->load->library('session');
?>

<!doctype html>
<html lang="en">

<head>
  <style>
    input:required {
      border: 2px dashed red;
    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-lg" style="width:30rem;background-color: #3498db !important;">
          <div class="card-body">
            <h1 class="text-center text-white">User Login</h1>
            <form action="<?php echo (base_url('index.php/login/signin')); ?>" method="post">
              <?php
              if ($this->session->flashdata('alert')) {
                ?>
                <div class="alert alert-<?php echo $this->session->flashdata('alert_type') ?>" role="alert">
                  <?php echo $this->session->flashdata('alert'); ?>
                </div>
              <?php } ?>
              <div class="mb-3">
                <label for="email" class="form-label text-white">Username</label>
                <input type="text" class="form-control border-dark" id="email" name="email" required
                  placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control border-dark" id="password" name="password" required
                  placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="row mb-2">
                <a href="<?php echo (base_url('index.php/login/register')); ?>"
                  class="text-decoration-none text-white">Register</a>
              </div>
              <div class="d-grid gap-2">
                <input type="submit" value="Login" class="btn btn-success btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>