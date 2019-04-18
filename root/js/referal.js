window.onload = function(){
	var formhandle = document.forms.ak_refer_form;
	formhandle.onsubmit = processReferalForm;
	
	var displaymessage = document.getElementById("ak_refer_message");
	
	displaymessage.style.display = "none";
    
    
    function processReferalForm (){
   
    var referName = document.getElementById("friend_name");
    var referEmail =  document.getElementById("friend_email");
	var referComment =  document.getElementById("comment");
	
        if (referName.value === "" || referName.value === null){
            referName.style.backgroundColor = "red";
            return false;
        }
        else if (referEmail.value === "" || referEmail.value === null)
        {
            referEmail.style.backgroundColor = "red";
            return false;
        }
		else if (referComment.value === "" || referComment.value === null)
        {
            referComment.style.backgroundColor = "red";
            return false;
        }
        else
        {
			displaymessage.style.display="block";  
            var displayname = referName.value;
            var displaylemail = referEmail.value;
			var displaycomment= referComment.value ;
			 
			   
			   
			
            document.getElementById("refermessage").innerHTML = displayname;
           
            return false;
			
        }
    }
}