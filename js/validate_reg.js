
let image = document.querySelector(".displayPic")

let picLabel = document.querySelector("label[for='picInput']" ) 

let fileInput = document.querySelector("input[type='file']")

if (document.querySelector('#passErr-div')) {
	// alert("exists!")
}
function uploadPic() {
	file = fileInput.files[0];
	// console.log(file)
	let fileData = new FileReader();
	fileData.readAsDataURL(file)
	fileData.onload = function displayPic () {
		let fileURL = fileData.result;
		console.log(fileURL);
		image.src = fileURL;
		console.log(fileInput)
	};
	picLabel.style.display = "none";
};
