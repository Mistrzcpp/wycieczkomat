$(function(){
    $("textarea").css("height", "100px")
    $('textarea').on('input', function(){
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    })
})