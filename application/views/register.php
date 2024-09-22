<?php $this->load->helper('url'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-primary" id="content">
  <h1>Register User</h1>
  <?php
  if ($this->session->flashdata('alert')) {
    ?>
    <div class="alert alert-<?php echo $this->session->flashdata('alert_type') ?>" role="alert">
      <?php echo $this->session->flashdata('alert'); ?>
    </div>
  <?php } ?>
  <div id="alert_msg"></div>

  <div class="card bg-warning mx-5">
    <form action="<?php echo (base_url('login/register')); ?>" method="post" id="form2">
      <div class="card-body align-items-center">

        <div class="col-md-4">
          <label class="floatingInput"> Name </label>

          <div class="input-group mb-3">
            <input type="text" class="form-control" required name="name" placeholder="Email/Username"
              aria-label="First Name" aria-describedby="basic-addon1" onkeypress="alphaOnly(this)">
          </div>
        </div>
        <div class="col-md-4">
          <label class="floatingInput"> User Name </label>

          <div class="input-group mb-3">
            <input type="text" class="form-control" required name="uname" onkeypress="alphaOnly(this)"
              placeholder="Email/Username" aria-label="Last Name" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="col-md-4">
          <label class="floatingInput"> Email </label>

          <div class="input-group mb-3">
            <input type="email" class="form-control" required name="email" placeholder="Email/Username"
              aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>

        <div class="col-md-4">
          <label class="floatingInput"> Password </label>
          <div class="input-group mb-3">
            <input type="password" name="password" required class="form-control" placeholder="Username"
              aria-label="Username" aria-describedby="basic-addon1">


          </div>
          <div class="row mb-2">
            <a href="<?php echo (base_url('index.php/login')); ?>" class="text-decoration-none text-blue">Login</a>
          </div>
        </div>

        <div class="col-md-4">
          <input type="submit" value="submit" name="submit" class="btn btn-success"></input>
        </div>

      </div>
    </form>
  </div>
  <script>
    function alphaOnly(event) {
      var key = event.keyCode;
      return ((key >= 65 && key <= 90) || key == 8);
    }; <script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <script>
        $('#form2').on('submit',function(e){
          e.preventDefault();
        var info = new FormData(this);
        $.ajax({
          type :'post',
        url: '<?php echo (base_url('login/register')) ?>',
        data: info,
        async:false,
        cache:false,
        contentType:false,
        processData: false,
        success: function(data){
      if(data=='00'){
        var response = '<div class="alert alert-success mx-3" > user Added Successfully!'  +
          '</div>';
        $('#alert_msg').html(response);
        $('#alert_msg').show();
        $('html, body').animate({
          scrollTop: $("#content").offset().top
                    }, 500);
        $('#form2')[0].reset();

      }else{
        var response = '<div class="alert alert-danger mx-3" >' + data +
          '</div>';
        $('#alert_msg').html(response);
        $('#alert_msg').show();
        $('html, body').animate({
          scrollTop: $("#content").offset().top
                    }, 500);
                
      }
    }
            
            
  })
});
  </script>
</body>

</html>