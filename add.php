<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Post</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Post</h4>
        </div>

        <div class="card-body">

             <div id="message" class="mt-3"></div>

            <form action="save.php" method="POST" enctype="multipart/form-data" id="postForm">

                <!-- Post Title -->
                <div class="form-group">
                    <label>Post Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
                </div>

                <!-- Post Body -->
                <div class="form-group">
                    <label>Post Body <span class="text-danger">*</span></label>
                    <textarea name="body" rows="5" class="form-control" placeholder="Enter Post Body"></textarea>
                </div>

                

                <!-- Submit -->
                <button type="submit" class="btn btn-success">
                    Save Post
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Back
                </a>

            </form>

           
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


<script src="http://localhost/blog_mgmt/validate.js">

</script>


</body>
</html>
