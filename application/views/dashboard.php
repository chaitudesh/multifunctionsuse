<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 1rem;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .main-content {
            margin-bottom: 56px;
            /* space for footer */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="<?php echo base_url('index.php/dashboard/dashboard') ?>"> <button class="btn btn-link navbar-btn"
                type="button">
                <i class="fas fa-arrow-left"></i>
            </button></a>
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ml-3" href="dashboard/add_post">Add Post</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-content">
        <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?>" role="alert">
            <?php echo $this->session->flashdata('alert'); ?>
        </div>
        <div class="row">
            <div class="col-md-8">

                <?php foreach ($list as $row) { ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row->title; ?></h2>
                            <p class="card-text"> Written by <?php echo $row->fullname ?>.....</p>
                            <a href="<?php echo base_url('dashboard/view_data/') . $row->id ?>" class="btn btn-primary">Read
                                More &rarr;</a>
                            <?php if ($this->session->userdata('userid') == $row->userid) { ?>
                                <a href="<?php echo base_url('dashboard/update_post/') . $row->id ?>"
                                    class="btn btn-secondary">Edit</a>
                                <a href="<?php echo base_url('dashboard/delete_post/') . $row->id ?>"
                                    class="btn btn-danger">Delete</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <!-- Add more blog posts here -->
            </div>
            <div class="col-md-4">
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($cat as $row) { ?>
                                        <li>
                                            <a
                                                href="<?php echo base_url('dashboard/catagory/') . $row->id ?>"><?php echo $row->cat; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the new Bootstrap 4 card containers!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Copyright &copy; My Blog 2024</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>