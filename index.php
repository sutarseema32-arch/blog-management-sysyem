<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DataTable Example</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" 
          href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.6.1/css/responsive.bootstrap4.min.css">


</head>

<body>
<div class="container mt-5">
    <a href="add.php" class="btn btn-primary" style="float: right;">Add Post</a>
    
    <h2 class="mb-4">Post Dashboard</h2>

     <div id="message" class=""></div>

     <div class="table-responsive">
    <table id="posts_tbl" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Post Title</th>
                <th>Post Body</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        
        </tbody>
    </table>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script>
var table = null;
$(document).ready(function() {
    table = $('#posts_tbl').DataTable({
        "ajax": "api.php",
        "columns": [
            { 
                "data": null, // Sr. No does not come from DB
                "render": function (data, type, row, meta) {
                    return meta.row + 1; // Increment row number
                }
            },
            { "data": "title" },
            { "data": "body" },
            { 
                "data": "created_at",
                "render": function(data, type, row) {
                    var date = new Date(data);
                    var day = ("0" + date.getDate()).slice(-2);
                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                    var year = date.getFullYear();
                    var hours = ("0" + date.getHours()).slice(-2);
                    var minutes = ("0" + date.getMinutes()).slice(-2);
                    return `${day}-${month}-${year} ${hours}:${minutes}`;
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `<button class="btn btn-danger btn-sm deleteBtn" data-id="${row.id}">Delete</button>`;
                }
           }
        ],
        responsive: true,
        order: [[3, 'desc']]
    });


    $('#posts_tbl').on('click', '.deleteBtn', function() {
        var id = $(this).data('id');

        // Bootstrap confirm
        if (confirm("Are you sure you want to delete this post?")) {
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                $("#message").html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Post deleted successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                `);
                table.ajax.reload(); // Reload table data
                },
                error: function() {
                $("#message").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error deleting post!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                `);
                }
            });
        }
    });

});
</script>

</body>
</html>
