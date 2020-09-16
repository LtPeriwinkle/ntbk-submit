function imageSize() {
  var imgarray = document.getElementsByTagName('IMG');
  for i in imgarray {
    i.setAttribute('width', '80%');
    i.setAttribute('height', '80%');
  }
}
