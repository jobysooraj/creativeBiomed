$(document).ready(function() {
    var tableElement = $('#datatables-contactus');
    if (tableElement.length) {
        var contactusDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: contactusDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },            
                { data: 'email', name: 'email'},
                { data: 'subject', name: 'subject'},
                { data: 'message', name: 'message'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-contactus tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
