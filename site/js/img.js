function imageSize() {
  var imgarray = document.getElementsByTagName('IMG');
  for (i = 0; i < imgarray.length; i++) {
    imgarray[i].setAttribute('width', '80%');
    imgarray[i].setAttribute('height', '80%');
  }
}
