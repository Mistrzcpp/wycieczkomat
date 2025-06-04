$(document).ready(function () {
	let searchParams = new URLSearchParams(window.location.search);
	var param = searchParams.getAll("id");
	$("#akceptuj").on("click", function () {
		$.post("akceptuj.php", { id: param }, function (response) {
			if (response == "ok") {
				window.location.href = "/twoje-wnioski.php";
			}
			if (response == "error") {
				window.location.href = "/blad.php";
			}
		});
	});
	$("#odrzuc").on("click", function () {
		$.post("odrzuc.php", { id: param }, function (response) {
			if (response == "ok") {
				window.location.href = "/twoje-wnioski.php";
			}
			if (response == "error") {
				window.location.href = "/blad.php";
			}
		});
	});
	$("#usun").on("click", function () {
		$("main").load("usun.php", {
			id: param,
		});
	});
	$("#edytuj").on("click", function () {
		$("main").load("edytuj.php", { id: param });
	});
	$("#drukuj").on("click", function () {
		const pdfCss = document.getElementById("pdf-css");
		pdfCss.disabled = false;
		const pageCss = document.getElementById("page-css");
		pageCss.disabled = true;
		const element = document.getElementById("page");

		html2pdf()
			.set({
				margin: [0, 0, 0, 0],
				filename: "wniosek.pdf",
				html2canvas: {
					scale: 2,
				},
				jsPDF: {
					unit: "mm",
					format: "a4",
					orientation: "portrait",
				},
			})
			.from(element)
			.save()
			.then(() => {
				pdfCss.disabled = true;
				pageCss.disabled = false;
			});
	});
});
