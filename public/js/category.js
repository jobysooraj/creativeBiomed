$(document).ready(function() {
    var tableElement = $('#datatables-categories');
    if (tableElement.length) {
        var categoriesDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: categoriesDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },            
                { data: 'name', name: 'name'},
                { data: 'description', name: 'description'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-categories tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
