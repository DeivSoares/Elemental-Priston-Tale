window.onload = function() {
	var txtArea = document.getElementById('txtView');
	var txtHidden = document.getElementById('txt1');

	txtArea.addEventListener('input', inputHandler)

	function breakLines(str) {
		var newLineRegex = /(\n|\n|\r)/gm
		return str.replace(newLineRegex, '<br/>');
	}

	function inputHandler() {	
		var brakLinesText = breakLines(txtArea.value)
		txtHidden.value = brakLinesText
	}
};