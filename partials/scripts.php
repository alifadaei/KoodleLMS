<script>
    function cleanTable() {
        $('table').html('');
    }

    function disableButtons() {
        $('.btn').attr('disabled', 'disabled');
    }

    function enableButtons() {
        $('.btn:not([must-disable])').removeAttr('disabled');
    }

    function showSpinner(jElem) {
        jElem = $(jElem);
        jElem.find('span.spinner-border').show();
    }

    function hideSpinners() {
        $('span.spinner-border').hide();
    }


    function getTable(name) {
        $.ajax({
            url: `get-${name}.php`,
            type: "GET",
            cache: false,
            success: function(data) {
                $("table").html($.parseHTML(data));
                attachHandlers();
                hideSpinners();
            }
        });
    }

    function resetForm(form) {
        $(':input', form)
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .prop('checked', false)
            .prop('selected', false);
        $(form).removeClass('was-validated').addClass('needs-validation');
    }
</script>