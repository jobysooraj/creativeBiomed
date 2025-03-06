$(document).ready(function() {
    var tableElement = $('#datatables-aboutus');
    if (tableElement.length) {
        var aboutusDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: aboutusDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },            
                { data: 'title', name: 'title'},
                { data: 'description', name: 'description'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-aboutus tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
