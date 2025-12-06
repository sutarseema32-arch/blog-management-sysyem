$(document).ready(function () {

    // Add custom validation method
$.validator.addMethod("alphaNumSpace", function(value, element) {
// Only letters, numbers, spaces
return this.optional(element) || /^[a-zA-Z0-9\s&]+$/.test(value);
}, "Post Title can contain only letters, numbers, and spaces11");


    $("#postForm").validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
                maxlength: 255,
                alphaNumSpace: true// only letters, numbers, spaces
            },
            body: {
                required: true,
                minlength: 20
            }
        },

        messages: {
            title: {
                required: "Post Title field is required.",
                minlength: "Post Title must be at least 5 characters",
                maxlength: "Post Title cannot be more than 255 characters",
            },
            body: {
                required: "Post Body field is required.",
                minlength: "Post content must be at least 20 characters"
            }
        },

        errorClass: "text-danger",
        errorElement: "small",

        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });


    $("#postForm").on("submit", function(e) {
        e.preventDefault(); // stop default submit

        // Check if form is valid
        if ($("#postForm").valid()) {

            // Collect form data (including file)
            var formData = new FormData(this);

            $.ajax({
                url: 'save.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                
                success: function(response) {
                $("#message").html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Post saved successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                `);
                $("#postForm")[0].reset(); // clear form
                $("#postForm").find('.is-invalid').removeClass('is-invalid'); // remove error highlight
                },
                error: function(xhr, status, error) {
                $("#message").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error saving post!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                `);
                }
            });

        } else {
            // Form is invalid, validation messages will show automatically
            console.log("Form invalid");
        }
    });


});