$("#AddNewTab").removeClass("active");
$("#YoursTab").addClass("active");
$("#BrowseTab").removeClass("active");

$(document).ready(function(){
    $("#searchBar").on("input", function(){
        $("#searchResults").load("search-document.php", {
            search: $("#searchBar").val()
        });
    });
    $("#searchButton").on("click", function(){
        $("#searchResults").load("search-document.php", {
            search: $("#searchBar").val()
        });
    });
    $("#searchButton").click();
});
