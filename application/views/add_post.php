<!DOCTYPE html>
<html lang="en">
<?php
$this->load->helper('url') ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
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
            margin-bottom: 70px;
            /* space for footer */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a href="<?php echo base_url('index.php/dashboard') ?>"> <button class="btn btn-link navbar-btn" type="button">
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
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ml-3" href="<?php echo base_url('index.php/dashboard/add_post') ?>">Add
                        Post</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <form method="post" action="<?php echo base_url('index.php/dashboard/save_post') ?>">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Add New Post</h2>

                            <div class="form-group">
                                <label for="postTitle">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter post title">
                            </div>
                            <div class="form-group">
                                <label for="postContent">Content</label>
                                <textarea class="form-control" name="content" rows="10"
                                    placeholder="Enter post content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="postCategory">Category</label>
                                <select class="form-control" name="category">
                                    <option value="" selected disabled>select catagory </option>
                                    <?php foreach ($catagory as $row) { ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->cat; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a href="index.html" class="btn btn-secondary ml-2">Cancel</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">&copy; My Blog 2024</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>