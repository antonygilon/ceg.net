function validate()
{
	if(document.signup.password.value!=document.signup.confirmpassword.value)
		
		{
			alert("Passwords don't match");
			document.signup.password.focus;
			return false;
		}
	
	if(document.signup.phonenum.value.length<10)
	{
		alert("Please Enter a valid phone number");
		document.signup.phonenum.focus;
		return false;
	}
	
	return(true);
}


