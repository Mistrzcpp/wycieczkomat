function validateInputLength(element, length){
    let inputValue = $(element).val();
    if(inputValue.length > length){
        $(element).addClass('is-invalid');
        $('#saveButton').attr('disabled');
    }
    else{
        $(element).removeClass('is-invalid');
        $('#saveButton').removeAttr('disabled');
    }
    if(inputValue == ''){
        $(element).removeClass('is-invalid');
        $('#saveButton').removeAttr('disabled');
    }
}
$('#telefon').on('input', function(e){
    let phone = $(this).val();
    let regex = /^\d+$/;
    if (phone.length > 9 || !regex.test(phone)) {
        $(this).addClass('is-invalid');
        $('#saveButton').attr('disabled');
    }
    else {
        $(this).removeClass('is-invalid');
        $('#saveButton').removeAttr('disabled');
    }
    if(phone == '') {
        $(this).removeClass('is-invalid');
        $('#saveButton').removeAttr('disabled');
    }
})
$('#klasa').on('input', function(){
    validateInputLength(this, 3);
})
$('#liczbaUczniow').on('input', function(){
    let regex = /^\d+$/;
    let count = $(this).val();
    if(!regex.test(count)){
        $(this).addClass('is-invalid');
        $('#saveButton').attr('disabled');
    }
    else{
        $(this).removeClass('is-invalid');
        $('#saveButton').removeAttr('disabled');
    }
    if(count == ''){
        $(this).removeClass('is-invalid');
        $('#saveButton').removeAttr('disabled');
    }
})
$('#miejsce').on('input', function(){
    validateInputLength(this, 200);
})
$('#program').on('input', function(){
    validateInputLength(this, 2000);
})
$('#cel').on('input', function(){
    validateInputLength(this, 2000);
})
$('#korzysci').on('input', function(){
    validateInputLength(this, 2000);
})
$('#informacje').on('input', function(){
    validateInputLength(this, 2000);
})