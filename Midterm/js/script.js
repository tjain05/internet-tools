function setDark(){
    document.body.style.backgroundColor="black";
  }
  function setLight(){
    document.body.style.backgroundColor="white";
  }
  function displayAnswer(){
    let digit=document.getElementById("value-box").value;
    var output=1;
    for(var i=1;i<=digit;i++){
        output*=i;
    }
    document.getElementById("answer").value=output;
}