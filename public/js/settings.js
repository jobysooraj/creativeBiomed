$(document).ready(function() {
    var tableElement = $('#datatables-settings');
    if (tableElement.length) {
        var settingsDataUrl = tableElement.data('url'); 
        var table = tableElement.DataTable({
            pageLength: 6,
            lengthChange: false,
            bFilter: false,
            autoWidth: false,
            processing: true, 
            serverSide: true, 
            ajax: settingsDataUrl, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'logo_image', name: 'logo_image' },            
                { data: 'email', name: 'email'},
                { data: 'company_address', name: 'company_address'},
                { data: 'phone', name: 'phone'},
                { data: 'whatsapp_id', name: 'whatsapp_id'},
                { data: 'instagram_id', name: 'instagram_id'},
                { data: 'facebook_id', name: 'facebook_id'},
                { data: 'location', name: 'location'},
                { data: 'action', name: 'action'},
            ],
            initComplete: function() {
                setTimeout(function() {
                    $('#datatables-settings tbody tr:first').trigger('click');
                }, 500);
            }
        });

        // Handle row click event
       
        
    } else {
        console.error("Table with ID 'datatables-stocks' not found.");
    }
   
});
