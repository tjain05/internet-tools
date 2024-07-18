function changeDays(amount) {
  let daysElement = document.getElementById("days");
  let currentDays = parseInt(daysElement.textContent);
  let newDays = currentDays + amount;
  if (newDays >= 0) {
    daysElement.textContent = newDays;
  }
}
