function setDates() {
  var d = new Date();
  document.getElementById("year").setAttribute("value", d.getFullYear().toString());
  document.getElementById("date").setAttribute("value", d.getDate().toString());
  //this is a mess but i do not care
  var month = "";
  switch (d.getMonth()) {
    case 0:
      month = "jan";
      break;
    case 1:
      month = "feb";
      break;
    case 2:
      month = "mar";
      break;
    case 3:
      month = "apr";
      break;
    case 4:
      month = "may";
      break;
    case 5:
      month = "jun";
      break;
    case 6:
      month = "jul";
      break;
    case 7:
      month = "aug";
      break;
    case 8:
      month = "sep";
      break;
    case 9:
      month = "oct";
      break;
    case 10:
      month = "nov";
      break;
    case 11:
      month = "dec";
  }
  document.getElementById(month).setAttribute("selected", "")
}
