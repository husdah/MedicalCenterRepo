$(document).ready(function () {

    $(document).on('click','.btn-edit', function (e) {
        e.preventDefault();

        var id = $(this).val();
        document.getElementById('editClinicFormId').value = id;

        var name = $(this).closest('tr').find('.ClinicNameRow').find('.name').text();
        $('#editClinicName').val(name);

        var desc = $(this).closest('.action_center').find('.desc').val();
        document.getElementById('editClinicDesc').textContent = desc;

        var imageSrc = $(this).closest('tr').find('.ClinicImgRow').find('.imageLB').find('img').attr('src');
        $('#oldClinicImgDisplayer').attr('href', imageSrc);
        $('#oldClinicImg').attr('src', imageSrc);

        let path = "../../uploads";
        let n = imageSrc.length - path.length;
        let string = imageSrc.substring(n-1);
        $('#old_image').val(string);

        document.getElementById('clinicAdd').classList.add('hide');
        document.getElementById('clinicAdd').classList.remove('view');

        document.getElementById('clinicEdit').classList.add('view');
        document.getElementById('clinicEdit').classList.remove('hide');
    });   

    $(document).on('click','#viewAddForm', function (e) {
        e.preventDefault();

        document.getElementById('clinicAdd').classList.add('view');
        document.getElementById('clinicAdd').classList.remove('hide');

        document.getElementById('clinicEdit').classList.add('hide');
        document.getElementById('clinicEdit').classList.remove('view');
    });
    
});