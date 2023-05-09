function loadTargetDropdown() {
    var selectedValue = $('#sizeType').val();
    $.ajax({
        url: 'ajaxGetSizeValues.php',
        data: { selectedValue: selectedValue },
        dataType: 'json',
        success: function(data) {
            // Clear the current options from the target dropdown
            $('#sizeValue').empty();

            // Add the new options to the target dropdown
            $.each(data, function(index, option) {
                $('<option>')
                    .attr('value', option.id)
                    .text(option.name)
                    .appendTo('#sizeValue');
            });
        }
    });
}

$(document).ready(function() {
    $('#sizeType').change(function() {
        loadTargetDropdown();
    });
});
