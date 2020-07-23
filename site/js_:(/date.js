function setDates() {
  var d = new Date();
  document.getElementById("year").setAttribute("value", d.getFullYear().toString());
  document.getElementById("date").setAttribute("value", d.getDate().toString());
  document.getElementById(d.getMonth()).setAttribute("selected", "");
}
