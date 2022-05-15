var qty = 1;

function subtract() {
	if (qty > 1) {
		qty -= 1;
		document.getElementById("value").innerHTML = qty;
		document.getElementById("qty").value = qty;
		document.getElementById("left").style.cursor = "pointer";
		if (qty <= 1) {
			document.getElementById("left").style.cursor = "not-allowed";
		}
	} else {
		document.getElementById("left").style.cursor = "not-allowed";
		return 0;
	}
}
function add() {
	qty += 1;
	document.getElementById("value").innerHTML = qty;
	document.getElementById("qty").value = qty;
	document.getElementById("left").style.cursor = "pointer";
}