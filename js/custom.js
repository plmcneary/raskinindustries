$(document).ready(function() { 
	$("#registration").validate({ 
		rules: {
			
			first_name: {
				required: true, 
				
			},
			last_name: {
				required: true, 
				
			},
		
			email_number: {
				required: true, 
				number : true
			},
			
			
			user_email: {// compound rule 
				required: true, 
				email: true 
			},  
			
			
			user_pass: { 
				required: true,
				minlength:5
			},
			
			
			user_confirm_email: { 
				required: true,
				equalTo: "#user_email",
				
			},
			
			user_confirm_pass: { 
				required: true,
				equalTo: "#user_pass",
				minlength:5
			}
			
			
			
		}, 
		messages: {
			
			first_name:{ 
				required:"Please enter your First Name ",
			},
			
			last_name:{ 
				required:"Please enter your Last Name ",
			},
			
			
			
			email_number:{ required:"Please enter email number",
			number :"Please enter integer only"},	
			
			
			user_email:{ required:"Please enter your email",
			user_email :"Please enter valid email"},	
			
			
			
			user_pass: {
				required: "Enter your  password",
			minlength: "Password must be at least 5 characters long"}, 
			
			user_confirm_pass: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			
			user_confirm_email: {
				required: "Please provide a email",
				equalTo: "Please enter the email password as above"
			}
			
		} 
	}); 
	
	$("#loginform").validate({ 
		rules: {
			
			log: {
				required: true, 
				
			},
			pwd: {
				required: true, 
				
			}
		}, 
		messages: {
			
			log:{ 
				required:"Please enter email",
			},
			
			pwd:{ 
				required:"Please enter password",
			}
			
		} 
	}); 
	
	setInterval(function(){ 
		get_email_number();
		
	}, 1000);
	
	
	
	$("#user_confirm_email,#user_email").blur(function(){
		var value =$(this).val();
		var get_box = $(this);
		$.ajax({
			url : '',
			data : { email : value,
				checkurl: 1,
			},
			success : function(response){
				if(response >= 1){
					get_box.val("");
					alert(value+ " already exist !!");
				};
			}
		});
	});
	
	
	$("#email_no,#email_number").blur(function(){
		var value =$(this).val();
		var get_box = $(this);
		$.ajax({
			url : '',
			data : { emailno : value },
			success : function(response){
				if(response !=""){
                                        var value = $("#email_number").val();
                                        if(typeof value != "undefined"){ $("#email_number").val("");alert("Email number already in use, Try another no."); return false; }
                                        alert(response);
				};
			}
		});
	})
	
	
}); 




function get_email_number()
{
	var value = $("#email_number").val();

       if(typeof value == "undefined")
          {
             return false;
          }

	var get_numbers = $("#email_number").val().length;

	var get_number =get_numbers;
	
	
	if(get_number==1){ var cost = 10000; }
	if(get_number==2){ var cost = 3000; }
	if(get_number==3){ var cost = 1000; }
	if(get_number==4){ var cost = 300; }
	if(get_number==5){ var cost = 100; }
	if(get_number==6){ var cost = 30; }
	if(get_number==7){ var cost = 10; }
	
	//alert(get_number);
	if(get_number>=4){
	$(".pin_input").attr("name","empty_pin");
		$(".pin_input").attr("id","empty_pin");
		$(".pin_code").hide();
	} else {
	
			$(".pin_input").attr("name","pin_code");
		$(".pin_input").attr("name","pin_code");
		$(".pin_code").show();
	}
	
	
	if(get_number>=8){ 
		var cost = 0;
		
		
		$(".registration_frm").attr("action","http://myemailnumber.com/register/");
	} 
	else{

		$(".registration_frm").attr("action","https://www.sandbox.paypal.com/cgi-bin/webscr");
	}
	
	if(get_number==0){ $(".pin_code").hide(); }
	$(".amount_number").val(cost);
}

function paypal_submit(){
	var first_name   =  $("#first_name").val();
	var user_email   =  $("#user_email").val();
	var user_pass    =  $(".user_passwords").val();
	var last_name    =  $("#last_name").val();
	var pin_code     = $("#pin_code").val();
	var email_number     = $("#email_number").val();
	var all_data =  first_name+"<>"+last_name+"<>"+user_email+"<>"+user_pass+"<>"+email_number+"<>"+pin_code;
	
	$("#custom_value").val(all_data);
}
