<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Blog Post</title>
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
            margin-bottom: 70px; /* space for footer */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="btn btn-primary ml-3" href="add-post.html">Add Post</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $post->title; ?></h1>
                        <p class="card-text"><?php echo $post->content ?></p>
                        <a href="<?php echo base_url('dashboard') ?>" class="btn btn-secondary mt-3">Back to Blog</a>
                    </div>
                    
                </div>
                <!-- Comment Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Comments</h5>
                        <form method="post" action="<?php echo base_url('dashboard/comment') ?>">
                            <div class="form-group">
                                <label for="commentContent">Leave a Comment</label>
                                <textarea class="form-control" name="comment" rows="3" placeholder="Write your comment here..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- Existing Comments -->
                         <?php foreach($lst as $row){ ?>
                        <div class="mt-4">
                            <h6><?php echo $row->name ?></h6>
                            <p ><?php echo $row->comment ?></p>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
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
