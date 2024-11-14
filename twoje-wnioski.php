<?php include 'partial/header.php' ?>
<script>
    try{document.getElementById("AddNewTab").classList.remove("active");}catch(e){}
    try{document.getElementById("YoursTab").classList.add("active");}catch(e){}
    try{document.getElementById("BrowseTab").classList.remove("active");}catch(e){}</script>

<p>Siema, to strona główna o nazwie Twoje Wnioski</p>
<div id="elementsView"></div>
<div id="controlView"></div>

<?php include 'partial/footer.php' ?>
