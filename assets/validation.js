function validateInputLength(element, length){
    let inputValue = $(element).val();
    if(inputValue.length > length)
        $(element).addClass('is-invalid');
    else
        $(element).removeClass('is-invalid');
    if(inputValue == '')
        $(element).removeClass('is-invalid');
}
$('#telefon').on('input', function(){
    let phone = $(this).val();
    let regex = /^\d+$/;
    if(phone.length > 15 || !regex.test(phone))
        $(this).addClass('is-invalid');
    else
        $(this).removeClass('is-invalid');
    if(phone == '')
        $(this).removeClass('is-invalid');
})
$('#klasa').on('input', function(){
    validateInputLength(this, 3);
})
$('#liczbaUczniow').on('input', function(){
    let regex = /^\d+$/;
    let count = $(this).val();
    if(!regex.test(count))
        $(this).addClass('is-invalid');
    else
        $(this).removeClass('is-invalid');
    if(count == '')
        $(this).removeClass('is-invalid');
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
