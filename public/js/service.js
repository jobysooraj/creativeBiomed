$(document).ready(function() {
    var tableElement = $('#datatables-services');
    if (tableElement.length) {
        var servicesDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: servicesDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },            
                { data: 'category', name: 'category'},
                { data: 'service', name: 'service'},
                { data: 'price', name: 'price'},
                { data: 'description', name: 'description'},
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-services tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
