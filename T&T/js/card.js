function validateForm() {
  var cardNo = document.getElementById("cardNo").value;
  if (cardNo.length !== 16 || !/^\d{16}$/.test(cardNo)) {
    alert("Please enter valid card number.");
    return false;
  }
  var expiry = document.getElementById("expiry").value;
  var expiryParts = expiry.split("/");
  if (
    expiryParts.length !== 2 ||
    !/^\d{2}$/.test(expiryParts[0]) ||
    !/^\d{4}$/.test(expiryParts[1])
  ) {
    alert("Invalid expiry date format.");
    return false;
  }

  var currentDate = new Date();
  var currentMonth = currentDate.getMonth() + 1;
  var currentYear = currentDate.getFullYear();
  var expiryMonth = parseInt(expiryParts[0], 10);
  var expiryYear = parseInt(expiryParts[1], 10);
  if (
    expiryYear < currentYear ||
    (expiryYear === currentYear && expiryMonth <= currentMonth)
  ) {
    alert("Invalid expiry date.");
    return false;
  }
  var cvv = document.getElementById("cvv").value;
  if (cvv.length !== 3 || !/^\d{3}$/.test(cvv)) {
    alert("Invalid CVV.");
    return false;
  }
  return true;
}
