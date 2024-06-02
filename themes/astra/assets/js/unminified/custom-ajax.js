jQuery(document).ready(function($) {
    $.ajax({
        url: custom_ajax_object.ajax_url,
        method: 'POST',
        data: {
            action: 'get_architecture_projects'
        },
        success: function(response) {
            if (response.success) {
                console.log(response.data); // Output the data to console for testing
                // You can loop through response.data and display the projects as needed
            } else {
                console.log(response.data); // Output error message
            }
        }
    });
});
