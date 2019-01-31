$(function () {

    function newRow(){
        return '<tr class="my-2">' +
                '<td> <input type="text" class="form-control" placeholder="e.g. Height" required name="attribute_name[]"> </td>' +
                '<td> <input type="text" class="form-control" placeholder="e.g. 90cm" required name="attribute_value[]"> </td>' +
                '<td> <button class="btn btn-sm btn-danger btn-remove-attribute">Remove</button> </td>' +
              '</tr>';
    }

    $('.btn-remove-saved-attribute').on('click', function (e) {
        e.preventDefault();
        if (confirm("Are you sure you want to do this?")) {

            const url = "/attributes/"+$(this).attr('id');
            axios.delete(url).then(
                $(this).closest("tr").remove(),
            ).catch(
                function (error) {
                    alert("Error deleting attribute")
                }
            ).then();
        }
    });

    $('#new-attribute-btn').on('click', function (e) {
        e.preventDefault();
        $("#attributes-table >tbody:last-child").append(newRow());
        initNewRowRemoval();
    });

    function initNewRowRemoval(){
        $('.btn-remove-attribute').on('click', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
    }

});