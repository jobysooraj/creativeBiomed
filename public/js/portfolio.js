$(document).ready(function() {
    var tableElement = $('#datatables-portfolio');
    if (tableElement.length) {
        var portfolioDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: portfolioDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },            
                { data: 'title', name: 'title'},
                { data: 'category', name: 'category'},
                { data: 'description', name: 'description'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-portfolio tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
