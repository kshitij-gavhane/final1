$(document).ready(function() {
		$('#dept_password').keyup(function() {
			validatePasswordStrength();
		});
		
		var ex1 = document.getElementById('registeredFor');
        var ex2 = document.getElementById('registeredFor1');
        
        	ex1.onclick = handler1; 
		  	ex2.onclick = handler2;
		  	
		$('#registeredFor1').prop('checked', false); 
		$('#registeredFor').prop('checked', false); 
				

	});
	
	if ( window.history.replaceState ) { 
        window.history.replaceState( null, null, window.location.href ); 
    	} 
	
	
	function loadInput(){
		var dept = document.getElementById('dept_name').value;
		
		var name = document.getElementById('name').value;
		var mail = document.getElementById('mail').value;
		var number = document.getElementById('number').value;
		var d = (new Date()).toString().split(' ').splice(1,3).join(' ');
		
		document.getElementById("dept").innerHTML=dept;
		document.getElementById("second_name").innerHTML=name;
		document.getElementById("second_number").innerHTML=number;
		document.getElementById("second_mail").innerHTML=mail;
		
		document.getElementById("3rd_name").innerHTML=name;
		document.getElementById("date").innerHTML=d;
		$('#exampleModalCenter').modal('show');
		
	}
	
	function checkmail(elementValue) {
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(elementValue.length!= 0){
			if(!emailPattern.test(elementValue)){
				showerror("dept_head_mail_err", "Enter valid Email.");
			}
			else if(/@yahoo.com\s*$/.test(elementValue) || /@gmail.com\s*$/.test(elementValue)){
				showerror("dept_head_mail_err", "company's mail should not contain gmail and yahoo domain name.");
			}
			else{
				showerror("dept_head_mail_err", "");
			}
		}
		else{
			showerror("dept_head_mail_err", "");
		}
	}
	
	function checkmobile(elementValue) {
		var mobilePattern = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
		if(elementValue.length!= 0){
			if(!mobilePattern.test(elementValue)){
				showerror("dept_head_number_err", "Enter Valid Mobile Number.");
			}
			else{
				showerror("dept_head_number_err", "");
			}
		}
		else{
			showerror("dept_head_number_err", "");
		}
	}
	
	function handler1() {
			 $('#dept_details').show(); 
			 $('#dept_head_details').show(); 
			 $('#deptauth').show();
			 
			  $('#changelevel').text("Is Your Company/Department Located In India?");
		}
		
		function handler2() {
			 $('#dept_details').hide(); 
			 $('#dept_head_details').hide(); 
			 $('#deptauth').hide();
			 $('#changelevel').text("Are You Resident Of India?");
			// $('#developercn').modal("show");
			 
			 $('#developercn').modal({
		    backdrop: 'static',
		    keyboard: false
			})  
		}
		
	function uncheck1(){
		$('#registeredFor1').prop('checked', false); 
	}	

	// function refreshCaptcha(){
	// 	document.getElementById("captchaimg").src = 'captcha-service?t=' + new Date().getTime();
	// }
	
	function validatePanNo(str){
		var regex = /^[a-zA-Z0-9]*$/;
		return regex.test(str);	
	}
	function validateEmail(elementValue) {
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		return emailPattern.test(elementValue);
	}
	function validateMobileNumber(mobile) {
		var mobilePattern = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
		return mobilePattern.test(mobile);
	}
	function showerror(elementid, msg) {
		/* showModal(msg); */
		ErrorLabel(elementid, msg);
		validateAll();
	}
	function ErrorLabel(elementid, msg) {
		var span = document.getElementById(elementid);
		span.innerText = msg;
		
	}
	function checkInputText(str) {
		let res = /^[a-zA-Z _]+$/;
		return res.test(str);
	}
	function resetForm(){
		var form = document.forms["dept_reg_form"];
		form.reset();
	}
	function validateAll() {
		var form = document.forms["dept_reg_form"];
		var registered = form.elements["registeredFor"];
		var dept_name = form.elements["dept_name"].value;
		var dept_head_name = form.elements["dept_head_name"].value;
		var dept_head_mail = form.elements["dept_head_mail"].value;
		var dept_head_number = form.elements["dept_head_number"].value;
		var dept_email = form.elements["dept_email"].value;
		var nodal_person = form.elements["nodal_person"].value;
		var dept_contact_number = form.elements["dept_mobile"].value;
		var dept_state = form.elements["dept_state"].value;
		var dept_city = form.elements["dept_city"].value;
		var dept_password = form.elements["dept_password"].value;
		var dept_cnf_password = form.elements["dept_cnf_password"].value;
		// var captcha = form.elements["captcha"].value;
		//var dept_undertacking = form.elements["dept_undertacking"];
		var ex1 = document.getElementById('registeredFor');
        var ex2 = document.getElementById('registeredFor1');
		
		if(ex1.checked!=true && ex2.checked!=true){
			ErrorLabel("Registering_For", "Please select Registration type");
			ErrorLabel("Registering_For1", "Please select Registration type");
		}
		
		if(registered.value == 1){
			if (dept_name.length == 0 || !checkInputText(dept_name)) {
			ErrorLabel("dept_name", "Enter valid Department Name.");

			}else{
				ErrorLabel("dept_name", "");
			}
			if (dept_head_name.length == 0 || !checkInputText(dept_head_name)) {
				ErrorLabel("dept_head_name", "Enter valid dept head name Number");
	
			}else{
				ErrorLabel("dept_head_name", "")
			}
			
			if (!validateEmail(dept_head_mail)) {
				ErrorLabel("dept_head_mail", "Enter Valid Email ID");

				}else{
					ErrorLabel("dept_email", "");
			}
			
			if (!validateMobileNumber(dept_head_number)
				|| dept_head_number.length < 10) {
			ErrorLabel("dept_mobile", "Invalid Mobile Number");

			}else{
				ErrorLabel("dept_mobile", "");
			}
			/*if(dept_undertacking.files.length == 0){
			ErrorLabel("dept_undertacking_error","Select Undertaking document");
			}else{
				ErrorLabel("dept_undertacking_error","");
			}	
			if(dept_undertacking.files.length != 0 && GetFileSize()){
				ErrorLabel("dept_undertacking_error2","Undertaking document is not in required format");
			}else{
				ErrorLabel("dept_undertacking_error2","");
			}*/	
		} 
		
		
		if (!validateEmail(dept_email)) {
			ErrorLabel("dept_email", "Enter Valid Email ID");

		}else{
			ErrorLabel("dept_email", "");
		}
		if (!validateMobileNumber(dept_contact_number)
				|| dept_contact_number.length < 10) {
			ErrorLabel("dept_mobile", "Invalid Mobile Number");

		}else{
			ErrorLabel("dept_mobile", "");
		}
		if (nodal_person.length == 0 || !checkInputText(nodal_person)) {
			ErrorLabel("nodal_person", "Enter valid Contact Person Name.")

		}else{
			ErrorLabel("nodal_person", "");
		}

		if (dept_state == "Select State") {
			ErrorLabel("dept_state", "Please select state.");

		}else{
			ErrorLabel("dept_state", "");	
		}
		if (dept_city == "" || !checkInputText(dept_city)) {
			ErrorLabel("dept_city", "Please enter city.");

		}else{
			ErrorLabel("dept_city", "");
		}
		
		
		if(dept_password.length == 0 ){
			ErrorLabel("password_format_error","Enter Valid Password");			
		}else{
			ErrorLabel("password_format_error", "");
		}
		
		if (!checkPassword()) {
			ErrorLabel("password_format_error","Password is not in required format");
		}else{
			ErrorLabel("password_format_error", "");
		}
		
		if (dept_password != dept_cnf_password) {
			ErrorLabel("cnf_password_error", "Password and Confirm password not same.")
		}else{
			ErrorLabel("cnf_password_error", "");
		}
		
		// if (captcha.length == 0) {
		// 	ErrorLabel("cptcha_error", "Invalid Captcha.");
		}else{
			ErrorLabel("cptcha_error", "");
		}
	}
	function showModal(data) {
		var span = document.getElementById('error_text');
		span.innerText = data;
		$("#error_modal").modal('show');
	}

	function GetFileSize() {
		var label = document.getElementById('filelable');
		var fi = document.getElementById('undertaking_doc'); // GET THE FILE INPUT.
		// VALIDATE OR CHECK IF ANY FILE IS SELECTED.
		if (fi.files.length > 0) {
			// RUN A LOOP TO CHECK EACH SELECTED FILE.
			for (var i = 0; i <= fi.files.length - 1; i++) {
				var fsize = fi.files.item(i).size; // THE SIZE OF THE FILE.
				var name = fi.files.item(i).name;
				var type = fi.files.item(i).type;
				label.innerHTML = name;
				const size = Math.round((fsize / 1024));
				console.log("file size--->" + size);
				console.log("File name--->" + name);
				console.log("File type--->" + type);
				if (size >= 200) {
					showModal("File is larger than 200 Kb.");
					return true;
				} else if(type != "application/pdf"){
					showModal("Undertaking document is not in required format.");
					return true;
				}else{
					return false;
				}
			}
		}
	}

	function validateRegistrationForm() {
		 
		var form = document.forms["dept_reg_form"];
		event.preventDefault();
		if (validateFormDeptReg()) {
			console.log("form submitted");
			form.submit();
		} else {
			console.log("validation error");
		}

	}
	
	
	function validateFormDeptReg() {
		var form = document.forms["dept_reg_form"];
		var registered = form.elements["registeredFor"];
		var dept_name = form.elements["dept_name"].value;
		var dept_head_name = form.elements["dept_head_name"].value;
		var dept_head_mail = form.elements["dept_head_mail"].value;
		var dept_head_number = form.elements["dept_head_number"].value;
		//var dept_tan_no = form.elements["tan_no"].value;
		var dept_email = form.elements["dept_email"].value;
		var nodal_person = form.elements["nodal_person"].value;
		var dept_contact_number = form.elements["dept_mobile"].value;
		var dept_state = form.elements["dept_state"].value;
		var dept_city = form.elements["dept_city"].value;
		var dept_password = form.elements["dept_password"].value;
		var dept_cnf_password = form.elements["dept_cnf_password"].value;
		// var captcha = form.elements["captcha"].value;
		//var dept_undertacking = form.elements["dept_undertacking"];
		var ex1 = document.getElementById('registeredFor');
        var ex2 = document.getElementById('registeredFor1');
		//console.log(registered.value+"=====================================")
		if(ex1.checked!=true && ex2.checked!=true){
			showerror("Registering_For", "Please select Registration type");
			showerror("Registering_For1", "Please select Registration type");
			return false;
		}
		
		if(registered.value == 1){
		
			if (dept_name.length == 0 || !checkInputText(dept_name)) {
				showerror("dept_dev_name", "Enter valid Department Name.");
				return false;
			} 
			
			//if (!checkInputText(dept_head_name)) {
				//showerror("dept_head_name_err", "Enter valid dept head name");
				//return false;
			//}
			
			
			/*if(dept_undertacking.files.length == 0){
				showerror("dept_undertacking_error","Select Undertaking document");
				return false;
			}
			
			if (GetFileSize()){
			showerror("dept_undertacking_error2","Undertaking document is not in required format.");
			return false;
			}*/		
		} 
		
		if (!validateEmail(dept_email)) {
			showerror("dept_email", "Enter Valid Email ID");
			return false;
		} else if (!validateMobileNumber(dept_contact_number)
				|| dept_contact_number.length < 10) {
			showerror("dept_mobile", "Invalid Mobile Number");
			return false;
		} else if (nodal_person.length == 0 || !checkInputText(nodal_person)) {
			showerror("nodal_person", "Enter valid Contact Person Name.")
			return false;
		}

		else if (dept_state == "Select State" || dept_state.length == 0
				|| !checkInputText(dept_state)) {
				console.log("in state if condition======");
			showerror("dept_state", "Please select state.");
			return false;
		} else if (dept_city == "" || dept_city.length == 0
				|| !checkInputText(dept_city)) {
				console.log("in state if condition======");
			showerror("dept_city", "Please enter city name.");
			return false;
		}

		
		else if (dept_password.length == 0) {
			showerror("password_format_error", "Enter Password");
			return false;
		} else if (!checkPassword()) {
			showerror(
					"password_format_error",
					"Password is weak. must be greater than 6 character and must contain alphabets,numbers and special characters ");
			return false;
		} else if (dept_password != dept_cnf_password) {
			showerror("cnf_password_error", "Password and Confirm password not same.")
			return false;
		// }else if (captcha.length == 0) {
		// 	showerror("cptcha_error", "Invalid Captcha.")
			return false;
		} else {
			
			return true;
		}
	}
	function checkPassword() {
		var password = document.getElementById("dept_password").value;
		var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
		console.log("password format -->"+re.test(password));
		if(password.length == 0 ){
			return false;
		}else{
			return re.test(password);			
		}
	}
	function validatePasswordStrength() {
		var password = document.getElementById("dept_password").value;
		var meter = document.getElementById("dept_meter");
		var type = document.getElementById("password_type");
		var password_type = 0;

		if (password.length > 0 && password.length <= 6) {
			password_type = 1;
		} // If the password length is greater than 4 and contain any lowercase alphabet or any number or any special character
		if (password.length > 6
				&& (password.match(/[a-z]/) || password.match(/\d+/) || password
						.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) {
			password_type = 2;
		} // If the password length is greater than 6 and contain alphabet,number,special character respectively 
		if (password.length > 6
				&& ((password.match(/[a-z]/) && password.match(/\d+/))
						|| (password.match(/\d+/) && password
								.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (password
						.match(/[a-z]/) && password
						.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) {
			password_type = 3;
		} //If the password length is greater than 6 and must contain alphabets,numbers and special characters
		if (password.length > 6 && password.match(/[a-z]/)
				&& password.match(/\d+/)
				&& password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) {
			password_type = 4;
		}

		if (password_type == 1) {
			$("#dept_meter").animate({
				width : '90px'
			}, 300);
			meter.style.backgroundColor = "red";
			type.innerHTML = "Very Weak";
		}
		if (password_type == 2) {
			$("#dept_meter").animate({
				width : '180px'
			}, 300);
			meter.style.backgroundColor = "#F5BCA9";
			type.innerHTML = "Weak";
		}
		if (password_type == 3) {
			$("#dept_meter").animate({
				width : '270px'
			}, 300);
			meter.style.backgroundColor = "#FF8000";
			type.innerHTML = "Good";
		}
		if (password_type == 4) {
			$("#dept_meter").animate({
				width : '360px'
			}, 300);
			meter.style.backgroundColor = "#00FF40";
			type.innerHTML = "Strong";
		}
		if (password.length == 0) {
			$("#dept_meter").animate({
				width : '0px'
			}, 300);
			type.innerHTML = " ";
		}
	}