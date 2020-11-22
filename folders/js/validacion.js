$(document).ready(function() {

    $("#submit").submit()("click", function() {

        let error = false;

        if ($('.textos') == null || $('.textos') == "" || $('.textos') == undefined) {

            error = true;
            $('.textos').addClass('border-danger');
            toastr.error('Debe llenar los campos.');
            alert("Debe llenar los campos.")

            location.reload();

        } else {

            error = false;
            $('.textos').removeClass('border-danger');

        }

    })


})