<?php
$this->load->helper('url');
$this->load->library('session');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | <?php echo $this->session->userdata('username'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f7f7f7;
            /* light gray background */
            display: flex;
            /* add this to make the footer stick to the bottom */
            min-height: 100vh;
            /* add this to make the footer stick to the bottom */
            flex-direction: column;
            /* add this to make the footer stick to the bottom */
        }

        .header {
            background-image: linear-gradient(to bottom, #8bc34a, #66bb6a);
            /* green gradient */
            background-size: 100% 300px;
            background-position: 0% 100%;
            transition: background-position 0.5s ease-out;
        }

        .header:hover {
            background-position: 100% 100%;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #ccc;
        }

        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            /* white background */
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-weight: 600;
            color: #333;
            /* dark gray text */
        }

        .footer {
            background-color: #333;
            /* dark gray background */
            color: #fff;
            padding: 2rem;
            margin-top: auto;
            /* add this to make the footer stick to the bottom */
        }

        /* Add font style to title */
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #212529;
        }
    </style>
</head>

<body class="bg-light">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Welcome, <?php echo $this->session->userdata('username'); ?>!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <h1 class="text-center">My Dashboard</h1>
        <p class="text-center">Choose an option below:</p>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Weather Forecast</h5>
                        <p class="card-text">Get the latest weather updates.</p>
                        <a href="<?php echo base_url('/index.php/weather'); ?>" class="btn btn-success">Go to Weather
                            Forecast</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog Posts</h5>
                        <p class="card-text">Read our latest blog posts.</p>
                        <a href="<?php echo base_url('index.php/dashboard'); ?>" class="btn btn-info ">Go to Blog
                            Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p class="text-center">Copyright &copy; 2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>