$(document).ready(function() {
    $('#userTable').DataTable({
        "pageLength": 25
    });
    $('select[name="userTable_length"]').css({ 'width': '50px' });
});