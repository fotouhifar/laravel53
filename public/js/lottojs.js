

window.onload = function () {
    $("#results_history_table").dataTable();
    $(".date-picker").datepicker({format: 'Y-m-d'});

};


function DeleteButton(formID) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this action!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, delete this item!',
        closeOnConfirm: false
    },
            function () {
                swal("Deleted!", "Item has been deleted!", "success");
                setTimeout($('#DeleteForm' + formID).submit(), 1000);
            });
}




