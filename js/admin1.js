$(document).ready(function(){
   $("#logoutbtn").css('display','block');



   $(window).load(function()
   {
       $(".se-pre-con").fadeOut("slow");
    });

});

var prev_c = -1;
var prev_id = -1;
var first_time = true;

function slidetoggle(id,c,b){
    console.log(id+" "+c+" "+prev_c+" p "+prev_id);
	if(first_time)
    {
        first_time = false;
        glyphi(c,id);     //only open
    }
    else if(prev_c == c)
	{
        glyphi(c,id);     //only close
        first_time = true;
    }
    else
    {
        glyphi(prev_c,prev_id);    //close previous
        glyphi(c,id);              //open new
    }
    prev_c = c;
    prev_id = id;

    if(id == "button2")
    {
        $("#change_student_form").slideUp("slow");    //close inner tab
    }

};

function glyphi(c,id)
{
    //Slide the div
    $(c).slideToggle("slow");
	//Change glyphicon on the button
	var gly = $("#"+id+" span").attr("class");
	if(gly.indexOf("down")>=0)
	   gly = gly.replace("down","up");
	else
		gly = gly.replace("up","down");
	$("#"+id+" span").attr("class",gly);
}


function change_student(){
	var roll = $(".rollno_change_student").val();
	var clss = $(".class_change_student").val();
	if(roll=="")
	{
		$('.alert-danger').text("Please enter a roll number").slideDown("slow");
		setTimeout(function(){$('.alert-danger').slideUp("slow");}, 3000);
	}
	else if(isNaN(roll))
	{
		$('.alert-danger').text("Please enter a valid roll number").slideDown("slow");
		setTimeout(function(){$('.alert-danger').slideUp("slow");}, 3000);
	}
	else
	{
		$.ajax({
    	url   : "../php/change_student.php",
    	type  : "POST",
    	async : false,
    	data  : {
				  "class" : clss ,
    		      "roll"  : roll ,
    		      "done"  : 1
    		    },
    	success: function(data)
    	{
    		if(data == '0')
    		{
				$('.alert-danger').text("Roll no "+roll+" does not exist in "+clss).slideDown("slow");
				setTimeout(function(){$('.alert-danger').slideUp("slow");}, 3000);
			}
			else
			{
                alert(data);
				var obj = jQuery.parseJSON(data);
				var ar = obj.toString().split(",");
				$(".csname").val(ar[1]);
				$(".csemail").val(ar[0]);
				$(".cshidden").val(ar[0]);
				$(".csclass").val(clss);
				$(".csroll").val(roll);
				$(".csmentor").val(ar[4]);
				$("#change_student_form").slideDown("slow");
			}
    	}
	});
	}
}


function change_student_form()
{

	var roll = $(".csroll").val();
	var clss = $(".csclass").val();
	var email = $(".csemail").val();
	var hidden = $(".cshidden").val();
	var mentor = $(".csmentor").val();
	var name = $(".csname").val();

	$.ajax({
    	url   : "../php/change_student_form.php",
    	type  : "POST",
    	async : false,
    	data  : {
				  "class" : clss ,
    		      "roll"  : roll ,
    		      "email" : email,
    		      "name"  : name,
    		      "mentor": mentor,
    		      "hidden": hidden,
    		      "done"  : 1
    		    },
    	success: function(data)
    	{
    		$("#modal_text").text(data);
    		$('#myModal').modal('show');
    		setTimeout(
    			function()
    			{
    				$('#myModal').modal('hide');
    				$("#change_student_form").slideUp("slow");
    			},3000);
    	}
    });
}

function add_mentor()
{
	var name = $(".mentor_name").val();
	var email = $(".mentor_email").val();
	var pwd = $(".mentor_pwd").val();

	$.ajax({
    	url   : "../php/add_mentor.php",
    	type  : "POST",
    	async : false,
    	data  : {
    		      "email" : email,
    		      "name"  : name,
    		      "pwd": pwd,
    		      "done"  : 1
    		    },
    	success: function(data)
    	{
    		$("#modal_text").text(data);
    		$('#myModal').modal('show');
    		setTimeout(
    			function()
    			{
    				$('#myModal').modal('hide');
                    first_time = true;
    				glyphi("#add_mentor","button3");
    			},3000);
    	}
    });
}

function assign(d)
{
    window.location = "../html/list.php?class="+d;
}
