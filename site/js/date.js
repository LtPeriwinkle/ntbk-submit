function setDates() {
  var d = new Date();
  document.getElementById("year").setAttribute("value", d.getFullYear().toString());
  document.getElementById("date").setAttribute("value", d.getDate().toString());
  //this is a mess but i do not care
  var month = d.getMonth();
  document.getElementById(month).setAttribute("selected", "");
}
