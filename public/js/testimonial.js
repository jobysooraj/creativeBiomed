$(document).ready(function() {
    var tableElement = $('#datatables-testimonial');
    if (tableElement.length) {
        var testimonialDataUrl = tableElement.data('url');
        var table = tableElement.DataTable({
            pageLength: 6,
            responsive: true,
            scrollX: true,
            lengthChange: false,
            bFilter: false,
            autoWidth: true,
            processing: true,
            serverSide: true,
            ajax: testimonialDataUrl,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email'},
                { data: 'designation', name: 'designation'},
                { data: 'message', name: 'message'},
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-testimonial tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event


    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }

});
