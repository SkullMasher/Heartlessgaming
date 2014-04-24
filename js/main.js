/*
*	Embrace The glory vengeance brings !
*/
function tabFocus(tabId) {
	/*
	*	Edit this var to match the css className
	*/
	var elmt = document.getElementById(tabId);
	return elmt.className = "tabfocus";
}

function tabBlur(tabId) {
	var elmt = document.getElementById(tabId);
	return elmt.className = "tabblur";
}

(function() {

	// Dat regex seriously ! Found at http://stackoverflow.com/questions/46155/validate-email-address-in-javascript Thx a bunch
	function validateEmail(email) { 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}

	function errorDiv() {
		// if error div not there go ahead and create it.
		var formErrorDiv = document.getElementById('form-error');
		if (countError > 0) {
			// Div creation
			var formErrorDiv 			= document.createElement('div');
				formErrorDiv.id 		= 'form-error',
				formErrorDiv.className 	= 'alert alert-danger';
			// #Text
			var textNodes = [
				document.createTextNode('Hey Listen !'),
				document.createTextNode(' Hello There.')
			];
			// <strong>
			var w3cStrong1 = document.createElement('strong');
			w3cStrong1.appendChild(textNodes[0]);

			// Inserting everything in formErrorDiv
			// formErrorDiv.appendChild(w3cStrong1);
			// formErrorDiv.appendChild(textNodes[1]);

			// Inserting formErrorDiv after the forms
			var formRegister = document.getElementById('form-register'),
				beforeElmnt = document.getElementById('boforeelmnt'); // Nasty
			formRegister.insertBefore(formErrorDiv, beforeElmnt);
		} else {
			// if no child remove errorDivCheck
			if (!formErrorDiv.hasChildNodes()) {
				formErrorDiv.parentNode.removeChild(formErrorDiv);
			};
		}
	}
	function successDiv() {
		var formSuccessDiv = document.getElementById('form-success');
		if (!formSuccessDiv) {
			// Div creation
			var formSuccessDiv				= document.createElement('div');
				formSuccessDiv.id 			= 'form-success';
				formSuccessDiv.className 	= 'alert alert-success';
			// #Text
			var textNodes = [
				document.createTextNode('Hey Listen !'),
				document.createTextNode('Le formulaire est corectement rempli, Yoda va maintenant faire appel à la force pour vous créer un compte.')
			];
				// <strong>
			var w3cStrong1 = document.createElement('strong');
			w3cStrong1.appendChild(textNodes[0]);
				// p
			var paragraph1 = document.createElement('p');
			paragraph1.appendChild(textNodes[1]);

			// Inserting everything in formSuccessDiv
			formSuccessDiv.appendChild(w3cStrong1);
			formSuccessDiv.appendChild(paragraph1);

			// Inserting formSuccessDiv after the forms
			var formRegister 	= document.getElementById('form-register');
				beforeElmnt 	= document.getElementById('boforeelmnt'); // Nasty
			formRegister.insertBefore(formSuccessDiv, beforeElmnt);
		}
		var submitButton = document.getElementsByTagName('button');
			// Unlocking Button
		for (var i = 0; i < submitButton.length; i++) {
			if (submitButton[i].type == 'submit') {
				submitButton[i].className = 'btn btn-default';
			};
			
		};

	}
	function removeDiv() {
		/* 	
		*	Sometimes we need to remove those box
		*/
		var formErrorDiv 	= document.getElementById('form-error');
		var formSuccessDiv 	= document.getElementById('form-success');

		if (formSuccessDiv || formErrorDiv) {
			formSuccessDiv.parentNode.removeChild(formSuccessDiv);
		};
	}

	function hasError(id) {
		/* 	
		*	When input is an error, add "has-error" in to the bootstrap div form-group...
		*/
		var inputId 				= document.getElementById(id),
			bootstrapClass 			= 'form-group input-group input-group-lg',
			bootstrapErrorClass 	= ' has-error',
			bootstrapSuccessClass 	= ' has-success';

		if (inputId.parentNode.className == bootstrapClass || inputId.parentNode.className == bootstrapClass + bootstrapSuccessClass) {
			inputId.parentNode.className = bootstrapClass + bootstrapErrorClass;
		}
	}
	function hasSuccess(id) {
		/* 	
		*	When input is all good, add "has-success" in to the bootstrap div form-group...
		*/
		var inputId 				= document.getElementById(id),
			bootstrapClass 			= 'form-group input-group input-group-lg',
			bootstrapErrorClass 	= ' has-error',
			bootstrapSuccessClass 	= ' has-success';

		if (inputId.parentNode.className == bootstrapClass || inputId.parentNode.className == bootstrapClass + bootstrapErrorClass) {
			inputId.parentNode.className = bootstrapClass + bootstrapSuccessClass;
		}
	}
	function hasNothing() {
		/*
		*	Sometimes that happens the input needs to be back to his normal style !
		*/
		var inputId 				= document.getElementById(id);
			getParentClassname		= inputId.parentNode.className,
			bootstrapClass 			= 'form-group input-group input-group-lg',
			bootstrapErrorClass 	= ' has-error',
			bootstrapSuccessClass 	= ' has-success';

		if (getParentClassname == bootstrapClass + bootstrapErrorClass || getParentClassname == bootstrapClass + bootstrapSuccessClass) {
			getParentClassname = bootstrapClass;
		};
	}

	var check = {}; // put all those thing in a literal object
	
	check['username'] = function(id) {
	
		var inputUsername 	= document.getElementById(id),
			minLength 		= 2,
			maxLength 		= 20;
			
			if (inputUsername.value.length > minLength) {
				hasSuccess(id);
				formValidation();
				return true;
			} else {
				hasError(id); 
				return false;
			}
	};

	check['password'] = function(id) {
	
		var inputPassword 	= document.getElementById(id),
			minLength 		= 5,
			maxLength 		= 20;
			
			if (inputPassword.value.length > minLength) {
				hasSuccess(id);
				formValidation();
				return true;
			} else {
				hasError(id); 
				return false;
			}
	};

	check['password_again'] = function(id) {

		var inputPassword 		= document.getElementById('password'),
			inputPasswordAgain 	= document.getElementById(id);

			if (inputPasswordAgain.value == inputPassword.value && inputPasswordAgain.value != '') {
				hasSuccess(id);
				formValidation();
				return true;
			} else {
				hasError(id); 
				return false;
			}
	};

	check['mail'] = function(id) {
	
		var inputMail = document.getElementById(id),
			minLength = 2,
			maxLength = 20;
			
			if (validateEmail(inputMail.value)) {
				hasSuccess(id);
				formValidation();
				return true;
			} else {
				hasError(id);
				return false;
			}
	};


	function formValidation() {
		/*
		*	Checking if the input got class 'has-success' in it.
		*/
		var count 		= 0,
			inputs 		= document.getElementsByTagName('input'),
			inputsLength= 0;

			// Get input length
		// for (var i = 0; i < inputs.length-2; i++) {
		// 	if (inputs[i].type == 'text' || inputs[i].type == 'password') {
		// 		inputsLength++;
		// 	};
		// };
		for (var i = 0; i < 4; i++) {
			if (inputs[i].parentNode.className == 'form-group input-group input-group-lg has-success') {
				count++;
				if (count == 4) {
					successDiv();
				} else {
					// not working
					removeDiv();
				}
			};
		};
	}

	// User action detection
	(function() {
		var inputs = document.getElementsByTagName('input');

		for (var i = 0; i < inputs.length ; i++) {
			if (inputs[i].type == 'text' || inputs[i].type == 'password') {
					// for evrerykey pressed
				inputs[i].onkeyup = function() {
					check[this.id](this.id);
				};
			}
		};
	})();
})();

	// Oh lord Jquery Magic
$(document).ready(function(){
	$("div#flash").fadeOut(5000);
});