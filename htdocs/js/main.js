var from = document.getElementById("form");
var email = document.getElementById("email");
var checkbox = document.getElementById("checkbox");
var validEmailText = document.getElementById("valid-email");
var validCheckboxText = document.getElementById("valid-checkbox");
var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
var button = document.getElementById("icon-button");

function validation(){
  if (email.value == "" && checkbox.checked == false) {
    validEmailText.innerHTML = "Email adress is required";
    validCheckboxText.innerHTML = "You must accept the terms and conditions"

  }else if (email.value == "" && checkbox.checked == true) {
    validEmailText.innerHTML = "Email adress is required";
  }else if (email.value.slice(-3) == '.co') {
    validEmailText.innerHTML = "We are not accepting subscriptions from Colombia emails";
  }else if (email.value.match(pattern)) {
    validEmailText.innerHTML = "";

  }else{
    validEmailText.innerHTML = "Please provide a valid e-mail address";
  }


  if (email.value != "" && checkbox.checked == false || email.value == "" && checkbox.checked == false || email.value == "" && checkbox.checked == true || email.value.slice(-3) == '.co' && checkbox.checked == true || email.value.slice(-3) == '.co' && checkbox.checked == false
  || !email.value.match(pattern) && checkbox.checked == true) {
    button.disabled = true;
  } else {
    button.disabled = false;
  }

}

function emptyEmail(){
  if (email.value == "" && checkbox.checked == false) {
    validEmailText.innerHTML = "Email adress is required";
    validCheckboxText.innerHTML = "You must accept the terms and conditions";
  } else if(email.value == "" && checkbox.checked == true){
      validEmailText.innerHTML = "Email adress is required";
      validCheckboxText.innerHTML = "";
  } else if (email.value != "" && checkbox.checked == false) {
    validCheckboxText.innerHTML = "You must accept the terms and conditions";
  } else if (email.value != "" && checkbox.checked == true) {
    validCheckboxText.innerHTML = "";
  }
}
function emptyCheckbox(){
  if (email.value == "" && checkbox.checked == false) {
    validEmailText.innerHTML = "";
    validCheckboxText.innerHTML = "";
  } else if(email.value == "" && checkbox.checked == true){
      validEmailText.innerHTML = "Email adress is required";
      validCheckboxText.innerHTML = "";
  } else if (email.value != "" && checkbox.checked == false) {
    validCheckboxText.innerHTML = "You must accept the terms and conditions";
  } else if (email.value != "" && checkbox.checked == true) {
    validCheckboxText.innerHTML = "";
  }

  if (email.value != "" && checkbox.checked == false || email.value == "" && checkbox.checked == false || email.value == "" && checkbox.checked == true || email.value.slice(-3) == '.co' && checkbox.checked == true || email.value.slice(-3) == '.co' && checkbox.checked == false
  || !email.value.match(pattern) && checkbox.checked == true) {
    button.disabled = true;
  } else {
    button.disabled = false;
  }
}

function inputLeft(){
  if (email.value == "" && checkbox.checked == false) {
      validEmailText.innerHTML = "";
      validCheckboxText.innerHTML = "";
  }
}

function successMessage() {
var infoDIV = document.getElementById("info");
 document.getElementById("subscription").style.display = "none";
 document.getElementById("newsletter-form").style.display = "none";
 document.getElementById("terms").style.display = "none";

 var successImg = document.createElement("DIV");
 successImg.setAttribute("id","successImg");
 infoDIV.insertBefore(successImg, document.getElementById("subscription"));
 var img = document.createElement("img");
 img.src = "img/ic_success.svg";
 successImg.appendChild(img);

 var successText = document.createElement("DIV");
 successText.setAttribute("id","successText");
 infoDIV.insertBefore(successText, document.getElementById("subscription"));
 var headline = document.createElement("h2");
 headline.innerHTML = "Thanks for subscribing!";
 successText.appendChild(headline);
 var text = document.createElement("h5");
 text.innerHTML = "You have successfully subscribed to our email listing. Check your email for the discount code.";
 successText.appendChild(text);
}

$(document).ready(function(){
  $("form").submit(function(event){
    event.preventDefault()

    var postedEmail = document.getElementById("email").value

    $.post("includes/insert-email.php",{postedEmail:postedEmail},function(data){
      successMessage();
    })

  })
})
