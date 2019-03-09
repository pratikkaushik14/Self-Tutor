<!DOCTYPE html>
<html>
<head>
<style>
.header{
	padding-left: 380px;
}
a:link, a:visited {
    background-color: orange;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a:hover, a:active {
    background-color: red;
}
	.container{
		font-family:verdana;
		margin:3px;
		padding-left: 500px;
		padding-top: 80px;
		background-image: url("C:\xampp\htdocs\Elearning\images\1.jpg");

	}
	
	.form-wrapper{
		margin:1px;
	}
	
	.form-wrapper label{
		display:block;
		font-size:17px;
	}
	
	.form-wrapper input[type=text], .form-wrapper input[type=email]{
		margin-bottom:5px;
		width:350px;
		height:30px;
		border:4px solid orange;
	}
	.form-wrapper span{
		color:blue;
	}
	
	.form-wrapper input[type=submit]{
		display:block;
		margin-top:5px;
		border:0px;
		background:orange;
		color:white;
		width:359px;
		height:50px;
		border-radius:15px;
	}
	
	.form-wrapper input[type=submit]:hover{
		background:#ee0022;
	}
	
	.form-wrapper textarea{
		border:4px solid orange;
		width:353px;
		height:150px;
	}
	
	#loading-img{
		display:none;
	}
	
	.response_msg{
		margin-top:10px;
		font-size:13px;
		background:#E5D669;
		color:#ffffff;
		width:250px;
		padding:3px;
		display:none;
	}
	
</style>
</head>
<body> 
<div class="header">
<a href="index.html" >Home</a>
<a href="courses.html">Courses</a>
<a href="about.html" >LME-Developers</a>
<a href="videos.html" >Video-Gallery</a>
<a href="contact-form.php">Contact</a>
</div>
<div class="container">
	<div class="form-wrapper">
	<form name="contact-form" action="" method="post" id="contact-form">
		<label>Name <span>*</span></label>
		<input type="text" name="your_name" placeholder="for e.g Prateek Kaushik" required>
		
		<label>Email <span>*</span></label>
		<input type="email" name="your_email" placeholder="for e.g abc@mail.com"required>
		
		<label>Phone </label>
		<input type="text" name="your_phone" placeholder="for e.g 9810020030">
		
		<label>Comment</label>
		<textarea name="comments" cols="28" rows="5" placeholder="Your comments or Feedback"required></textarea>
		<input type="submit" name="" value="Submit My Comments " id="submit_form">
		<img src="img/loading.gif" id="loading-img">
	</form>
	<div class="response_msg"></div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#contact-form").on("submit",function(e){
	e.preventDefault();
	if($("#contact-form [name='your_name']").val() === '')
	{
		$("#contact-form [name='your_name']").css("border","1px solid red");
	}
	else if ($("#contact-form [name='your_email']").val() === '')
	{
		$("#contact-form [name='your_email']").css("border","1px solid red");
	}
	else
	{
		$("#loading-img").css("display","block");
		var sendData = $( this ).serialize();
		$.ajax({
			type: "POST",
			url: "get_response.php",
			data: sendData,
			success: function(data){
				$("#loading-img").css("display","none");
				$(".response_msg").text(data);
				$(".response_msg").slideDown().fadeOut(3000);
				$("#contact-form").find("input[type=text], input[type=email], textarea").val("");
			}
			
		});
	}
});
	
$("#contact-form input").blur(function(){
	var checkValue = $(this).val();
	if(checkValue != '')
	{
		$(this).css("border","1px solid #eeeeee");
	}
});
});
</script>
</body>
</html>