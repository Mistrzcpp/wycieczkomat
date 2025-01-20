$(document).ready(function(){
    $(document).on("change", function(){
        let isValid = [];
        //data
        let dataOd = $("#dataOd").val().replace("T"," ");
        let dataDo = $("#dataDo").val().replace("T"," ");
        let start = new Date(dataOd);
        let end = new Date(dataDo);
        if(start > end){
            $("#dataOd").addClass("is-invalid");
            $("#dataDo").addClass("is-invalid");
            isValid.push(false);
        }
        else{
            $("#dataOd").removeClass("is-invalid");
            $("#dataDo").removeClass("is-invalid");
        }
        //liczba uczniow
        if($("#liczbaUczniow").val() > 100){
            $("#liczbaUczniow").addClass("is-invalid");
            isValid.push(false);
        }
        else{
            $("#liczbaUczniow").removeClass("is-invalid");
        }
        //telefon
        if($("#telefon").val().length > 9){
            $("#telefon").addClass("is-invalid");
            isValid.push(false);
        }
        else{
            $("#telefon").removeClass("is-invalid");
        }
        
        //zapisz
        if(isValid.includes(false)){
            $("#saveButton").addClass("disabled");
        }
        else{
            $("#saveButton").removeClass("disabled");
        }
    })
})