$("#AddNewTab").removeClass("active");
$("#YoursTab").addClass("active");
$("#BrowseTab").removeClass("active");

function textShorter (){
    $(".tripHeader").each(function(){
        let text = $(this).text();
        if(text.length > 100){
            text = text.substring(0, 100) + "...";
            $(this).text(text);
        }
    })
} 
$(document).ready(function(){
    $("#searchBar").on("input", function(){
        $("#searchResults").load("search-document.php", {
            search: $("#searchBar").val()
        }, 
        function(){
            textShorter()
        });
    });
    $("#searchButton").on("click", function(){
        $("#searchResults").load("search-document.php", {
            search: $("#searchBar").val()
        }, 
        function(){
            textShorter()
        });
    });
    $(document).on('click', '.trip', function(){
        let id = $(this).attr("id");
        window.location.href = window.location.origin + `/podglad.php?id=${id}`;
    });
    $("#searchButton").click();
   
});