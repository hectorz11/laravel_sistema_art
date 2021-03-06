	$(document).ready(function() {
        event.preventDefault()
        $('#tableCivils').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/civils',
        });

        $('#tableCivilsUser').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/users/civils',
        });
    });