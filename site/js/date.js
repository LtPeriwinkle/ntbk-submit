function setDates() {
  var d = new Date();
  document.getElementById("year").setAttribute("value", d.getFullYear().toString());
  document.getElementById("date").setAttribute("value", d.getDate().toString());
  var month = d.getMonth();
  document.getElementById(month.toString()).setAttribute("selected", "");
}
