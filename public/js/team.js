$(document).ready(function() {
    var tableElement = $('#datatables-team');
    if (tableElement.length) {
        var teamDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: teamDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },            
                { data: 'name', name: 'name'},
                { data: 'designation', name: 'designation'},
                { data: 'email', name: 'email'},
                { data: 'phone', name: 'phone'},
                { data: 'bio', name: 'bio'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-team tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
