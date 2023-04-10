const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");



sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

const htmlEl = document.getElementsByTagName("html")[0];
const currentTheme = localStorage.getItem("theme")
  ? localStorage.getItem("theme")
  : null;
if (currentTheme) {
  htmlEl.dataset.theme = currentTheme;
}
const toggleTheme = (theme) => {
  htmlEl.dataset.theme = theme;
  localStorage.setItem("theme", theme);
};

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#id_password");

togglePassword.addEventListener("click", function (e) {
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});

const toggleReg = document.querySelector("#toggleReg");
const pass = document.querySelector("#id_reg");

function showModal(data) {
	var span = document.getElementById('error_text');
	span.innerText = data;
	$("#error_modal").modal('show');
}

function checkFormData() {
	event.preventDefault();
	if (validateFormData()) {
		var form = document.forms["login_form"];
		form.submit();
		console.log("form submitted");
	} else {
		console.log("error while submit");
	}
}

function showerror(msg) {

	showModal(msg);
}

function validateFormData() {
	var form = document.forms["login_form"];
	var email = form.elements["email"].value;
	var password = form.elements["password"].value;
	// var captcha = form.elements["captcha"].value;

	if (email.length == 0) {
		showerror("Enter Email ID");
		return false;
	}
	if (!validateEmail(email)) {
		showerror("Enter Valid Email ID");
		return false;
	}
	if (password.length == 0) {
		showerror("Please Enter Password");
		return false;
	}
	// if (captcha.length == 0) {
	// 	showerror("Enter Captcha.");
	// 	return false;
	// } else {
	// 	return true;
	// }
}

function validateEmail(elementValue) {
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return emailPattern.test(elementValue);
}

