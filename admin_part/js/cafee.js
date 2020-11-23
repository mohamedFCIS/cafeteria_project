//show image profile in form when i selected it

$(".custom-file-input").on("change", showPreviewOne);

function showPreviewOne(event) {
  if (event.target.files.length > 0) {
    let src = URL.createObjectURL(event.target.files[0]);
    console.log(src);
    let preview = document.getElementById("myImageID");
    preview.src = src;
    preview.style.display = "block";
  }
}

let submit = document.getElementsByClassName("submite")[0];
let uploadImg = document.getElementsByClassName("custom-file")[0];
submit.addEventListener("click", ValidateEmail);
submit.addEventListener("click", uploadImgFun);
submit.addEventListener("click", CheckPassword);

// Valid email address

function ValidateEmail() {
  let email = document.getElementsByClassName("email")[0];
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (email.value.match(mailformat)) {
    return true;
  } else {
    evt.preventDefault();
    alert("You have entered an invalid email address!");
    email.focus();
    return false;
  }
}

//validation of password
function CheckPassword(evt) {
  let repassInput = document.getElementsByClassName("psw2")[0];
  // console.log(repassInput);

  let passInput = document.getElementsByClassName("psw")[0];
  var check = passInput.value.localeCompare(repassInput.value);
  // console.log(check);
  var equal;
  if (check == 0) {
    // return true;
    equal = 1;
  } else {
    evt.preventDefault();
    alert("passowrd didnot match repassword");
    passInput.focus();
    return false;
  }
  var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,20}$/; //litter capitale and lower litter and number
  if (passInput.value.match(passw) && equal == 1) {
    return true;
  } else {
    evt.preventDefault();
    alert("Wrong must contain lower ,upper and number ..!");
    passInput.focus();
    return false;
  }
}

function uploadImgFun(evt) {
  let imgInput = document.getElementsByClassName("customFile")[0];
  var avatar = imgInput.value;
  if (avatar) {
    var extension = avatar.split(".").pop().toUpperCase();
    if (avatar.length < 1) {
      avatarok = 0;
    } else if (
      extension != "PNG" &&
      extension != "JPG" &&
      extension != "GIF" &&
      extension != "JPEG"
    ) {
      avatarok = 0;
      alert("invalid extension " + extension);
    } else {
      avatarok = 1;
    }
    if (avatarok == 1) {
      return true;
    } else {
      evt.preventDefault();
      console.log("error");
      return false;
    }
  } else {
    evt.preventDefault();
    alert("error image not found");
    imgInput.focus();
    return false;
  }
}
