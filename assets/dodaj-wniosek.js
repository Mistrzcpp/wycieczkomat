var selectedPeopleArr = [];
$("#AddNewTab").addClass("active");
$("#YoursTab").removeClass("active");
$("#BrowseTab").removeClass("active");

$(document).ready(function(){
    $(function(){
        $("textarea").css("height", "100px")
        $('textarea').on('input', function(){
            this.style.height = "auto";
            this.style.height = this.scrollHeight + "px";
        })
    });
    $("#button-search").click(function(){
        $("#results").load("search-names.php",{
            name: $("#searchInput").val()});
    });
    $("#searchInput").on('input', function(){
        $("#results").load("search-names.php",{
            name: $("#searchInput").val()});
    });
    $(document).on('click', '.names', function() {
        let button = $(this);
        let id = button.attr("id");
        if(selectedPeopleArr.includes(id)){
            button.removeClass("active");
            let index = selectedPeopleArr.indexOf(id);
            selectedPeopleArr.splice(index, 1);
            $(`#selectedPeople #${id}`).remove();
        }
        else{
            button.addClass('active');
            selectedPeopleArr.push(id);
            $("#selectedPeople").append(`
            <button type="button" class="btn btn-primary position-relative mx-1 mb-2" id="${id}">
                ${button.text()}
                <span class="position-absolute top-0 start-100 translate-middle px-2 bg-danger border border-light rounded-circle deletePeople" id="${id}">X</span>
            </button>`);
        }
    });
    $(document).on('click', '.deletePeople', function(){
        let id = $(this).attr("id");
        let index = selectedPeopleArr.indexOf(id);
        selectedPeopleArr.splice(index, 1);
        $(`#selectedPeople #${id}`).remove();
        $(`#results button#${id}`).removeClass("active");
    });
    $(document).on("click", "#saveButtonModal", function(){
        let string = "";
        let input = "";
        selectedPeopleArr.forEach((id)=>{
            let name = $(`#selectedPeople button#${id}`).text();
            name = name.trim().slice(0, -1).trim();
            string += name + ", ";
            input += id + " ";
        })
        string = string.slice(0,-2);
        input = input.slice(0,-1);
        $("#opiekunowie").val(string);
        $("#OpiekunowieId").val(input);
        $("#closeButton").click();
    });
    $(document).on('keydown', 'form', function(event) {
        if(event.keyCode === 13 && !$(event.target).is('textarea')){
            event.preventDefault();
        }
    });
})