// import 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

// import 'jquery-ui/ui/widgets/datepicker.js';

// A $( document ).ready() block.
$(document).ready(function() {
    if ($("body").hasClass("dashboard")) {
        setInterval(() => updateOperations(
            $('meta[name="csrf-token"]').attr('content'),
            'dashboardTable',
            'desc',
            '',
            5
        ), 5000);
    }

    $('#historyFilterButton').on('click', function(event) {
        updateOperations(
            $('meta[name="csrf-token"]').attr('content'),
            'historyTable',
            $('#order').val(),
            $('#search').val()
        );

        return false;
    });

});

function updateOperations(token, tableName, order, search, limit) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: "POST",
        url: 'http://0.0.0.0/history/filter',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({
            order: order,
            search: search,
            limit: limit
        }),
        success: function(response) {
            $('#' + tableName + ' tbody').html('');

            response.forEach((operation) => {
                $('#' + tableName + ' tbody').append("<tr>" +
                    "<td>" + operation.created_at + "</td>" +
                    "<td>" + operation.amount + "</td>" +
                    "<td>" + operation.total + "</td>" +
                    "<td>" + operation.description + "</td>" +
                    "</tr>");
            })
        },
        error: function(response) {
            console.log(response);
        }
    });
}
