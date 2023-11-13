$(document).ready(function () {

    $(document).on('click','.btn-edit', function (e) {
        e.preventDefault();

        var id = $(this).val();

        document.getElementById('clinicAdd').classList.add('hide');
        document.getElementById('clinicAdd').classList.remove('view');

        document.getElementById('clinicEdit').classList.add('view');
        document.getElementById('clinicEdit').classList.remove('hide');
    });   
});