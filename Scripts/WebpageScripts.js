function ResizeImage() {
	var count=0;
	var img= new Image();
	img.src = count + ".jpg"


}
function Shift(argument) {
	var count=0;
	count++;
	if (count>3) {
		count=0;
	}

	var img= new Image();
	img.src = count + ".jpg"
	img.onload = getSize;

	document.getElementById('SlideShow').src=img.src;
}
function GetSize(argument) {

}