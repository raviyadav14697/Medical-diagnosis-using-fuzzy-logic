var no=0;
var srow = []
var snames=[]
var sw=[]
var sstrings=[]
var fv_ar=[];
var in_db;
var max = 0;
var dis = $('#dis').val();
var precaution, specialist;
var check_ar = [];
var dis_ar = [];
//alert(precaution+"  "+specialist);
//appends a symptom form just before .add_sym

$().ready(function(){
	$("#modal_button").hide();
});
function checkBoxClick()
{
			rows = $('#no').val();
			sname = $('#sname').val();
			w = $('#weight').val();


			if(!$('#dname').val().replace(/ /g,''))
			{
				alert("Please fill disease name first");
				return 1;
			}

			if(!$('#specialist').val().replace(/ /g,''))
			{
				alert("Please fill specialist first");
				return 1;
			}


			if(!$('#precaution').val().replace(/ /g,''))
			{
				alert("Please fill precaution first");
				return 1;
			}


			if(!rows || !w || !sname)
			{
				alert("Please fill all the symptom fields first!");
				return 1;
			}

			precaution = $('#precaution').val();
			specialist = $('#specialist').val();

			check_sym(sname);
			if(in_db)
				rows = fv_ar.length;

			max = rows;

			f3_checkbox(sname , rows);
			snames.push(sname);
			sw.push(w);
			srow.push(rows);

			if(in_db==true)
					make_disabled_checkbox();

}

function update_start_of_next_range(e)
{
		var cur_id = e.id, next_id = '';
		var third = 1+parseInt(cur_id.charAt(3));

		if(third-1 == max)
				return;

		next_id = setCharAt(cur_id , 3 , third.toString());
		cur_id = '#'+cur_id+'';
		next_id = '#'+next_id+'';
		if(isInt(parseFloat($(cur_id).val())))
			$(next_id).val((parseInt($(cur_id).val())+1));
		else
			$(next_id).val((parseFloat($(cur_id).val())+0.01));
		$(next_id).prop("disabled",true);

}

function setCharAt(str,index,chr) {
    if(index > str.length-1) return str;
    return str.substr(0,index) + chr + "_1";
}

function isInt(n){
    return Number(n) === n && n % 1 === 0;
}

function isFloat(n){
    return Number(n) === n && n % 1 !== 0;
}



function f3_checkbox(sname , rows)
{
			var name = '<div class=" vertical-gap sym_header"><h2>'+(no+1)+'. '+sname+'</h2><input class="form-control" placeholder="Description" id="des'+no+'"></div>';
			var tuple1 = '<td><input type="text" class="form-control" id="'
			var tuple22 = '"></td><td><input type="text" onchange="update_start_of_next_range(this)" class="form-control" id="'
			var tuple2 = '"></td><td><select class="form-control" name="cars" id="'
			var tuple3 = '"><option value="1">Yes</option><option value="2">May Be</option><option value="3">No</option></select></td>'
			var tb1 = '<div class=" vertical-gap"><table class="table table-responsive table-bordered table-hover"><thead><tr><th>Sr No.</th><th>MIN_VALUE OF Range</th><th>MAX_VALUE OF Range</th><th>Effect</th></tr></thead><tbody>';
			var tb2 = '</tbody></table></div>';
			var s = "";
			for (var i=1;i<=rows;i++)
			{
				s += '<tr><td>'+i+'</td>'+tuple1+'s'+no+'_'+i+'_1'+tuple22+'s'+no+'_'+i+'_2'+tuple2+'s'+no+'-'+i+tuple3+'</tr>';
			}

			$('#add_here').append(name+tb1+s+tb2);
			no++;
}

function make_disabled_checkbox()
{
	var ind = no-1;
	for(var i=1;i<=srow[ind];i++)
	{
		var id1 = '#s'+ind+'_'+i+"_"+1;
		var id2 = '#s'+ind+'_'+i+"_"+2;
		$(id1).prop("disabled", true );
		$(id2).prop("disabled", true );
		//alert(fv_ar[i-1]);
		var range = fv_ar[i-1];
		//console.log(range);
		var split = range.split('-');
		$(id1).val(split[0]);
		$(id2).val(split[1]);

	}
}

function f2()
{

		if ( !$('#mycheck').is(":checked") )
		{
				check_ar[no] = 0;
				rows = $('#no').val();
				sname = $('#sname').val();
				w = $('#weight').val();

				if(!$('#dname').val().replace(/ /g,''))
				{
					alert("Please fill disease name first");
					return 1;
				}

				if(!$('#specialist').val().replace(/ /g,''))
				{
					alert("Please fill specialist first");
					return 1;
				}


				if(!$('#precaution').val().replace(/ /g,''))
				{
					alert("Please fill precaution first");
					return 1;
				}

				precaution = $('#precaution').val();
				specialist = $('#specialist').val();

				if(!rows || !w || !sname)
			  	{
				  	alert("Please fill all the symptom fields first!");
				  	return 1;
			  	}

			    //check if sname already exist or not, if so then
			    //then bring the values of it!
			    check_sym(sname);

			    //If symptom already in db, count of fuzzy values same as before!
			    if(in_db==true)
			    	rows = fv_ar.length;

			    //store name,weight and count of fuzzy values in array to be sent later!
			    snames.push(sname);
			    sw.push(w);
			    srow.push(rows);

			    //Make input table
			    f3(sname,rows);

			    if(in_db==true)
			    		make_disabled();


		}
		else {
				check_ar[no] = 1;
				checkBoxClick();
		}

		$('#no').val('');
		$('#sname').val('');
		$('#weight').val('');


		$('html, body').animate({
				 scrollTop: $("#save").offset().top
	    }, 2000);

}

//builds the table
function f3(sname,rows)
{
	var name = '<div class=" vertical-gap sym_header"><h2>'+(no+1)+'. '+sname+'</h2> <input class="form-control" placeholder="Description" id="des'+no+'"></div>';

	var tuple1 = '<td><input type="text" class="form-control" id="'
	var tuple2 = '"></td><td><select class="form-control" name="cars" id="'
	var tuple3 = '"><option value="1">Yes</option><option value="2">May Be</option><option value="3">No</option></select></td>'
    var tb1 = '<div class=" vertical-gap"><table class="table table-responsive table-bordered table-hover"><thead><tr><th>Sr No.</th><th>Fuzzy Values</th><th>Effect</th></tr></thead><tbody>';
    var tb2 = '</tbody></table></div>';
    var s = "";
    for (var i=1;i<=rows;i++)
    {
    	s += '<tr><td>'+i+'</td>'+tuple1+'s'+no+'_'+i+tuple2+'s'+no+'-'+i+tuple3+'</tr>';
    }

	$('#add_here').append(name+tb1+s+tb2);
    no++;
}

//when save button is clicked, it validates the fields and  sends data to database
function send_data()
{
	//validate();
	for(var i=0; i<no; i++)
	{
		rows = srow[i];
		sname = snames[i];
		w = sw[i];

		if(!rows || !w || !sname)
		{
			alert("Please fill all the symptom fields first!");
			return 1;
		}

	}

	if(!$('#dname').val().replace(/ /g,''))
	{
		alert("Please fill disease name first");
		return 1;
	}

	if(!$('#specialist').val().replace(/ /g,''))
	{
		alert("Please fill specialist first");
		return 1;
	}

	if(!$('#precaution').val().replace(/ /g,''))
	{
		alert("Please fill precaution first");
		return 1;
	}

	



	
	data_in_string();
}

//converts data to be stored in below format
//old
// TB ? COUGH/4/L,1|M,1|H,1 ? BP/5/L,1|M,1|H,1
//changed to this format now
// TB ? COUGH/4/des/L,M,H|1,2,3 ? BP/5/des/L,M,H|1,2,3
function data_in_string()
{
	//for all symptoms
	var str = $('#dname').val()+'?';
	for(var i=0;i<no;i++)
    {
		var ret = '';
		if (check_ar[i] === 0 )
			ret = make_fuzzy_string(i);
		else {
				ret = make_fuzzy_string_checkbox(i);
		}
    	if(ret==1 || $('#des'+i).val() === '')
    	{
    		alert("Please fill all the fields first!");
    		return 1;
    	}
    	str = str+snames[i]+'/'+sw[i]+'/'+ret+'/'+$('#des'+i).val()+'/'+check_ar[i];

      if(i != no-1)
        str = str + '?';
    }
    console.log(str);
    console.log(precaution+"  "+specialist);
    ajax_call(str);
    
}


function make_fuzzy_string_checkbox(sym)
{
	 var str1 = "";
	 var str2 = "";
	 for(var i=1; i<=srow[sym] ; i++)
	 {

 		var fv1 = $('#s'+sym+'_'+i+'_1').val();
		var fv2 = $('#s'+sym+'_'+i+'_2').val();
	    var ev = $('#s'+sym+'-'+i).val();

	    if(!fv1 || !fv2)
	    {
	    	return 1;
	    }
	    str1 = str1+fv1+'-'+fv2;
	    str2 = str2+ev;

	    if(i!=srow[sym])
	    {
	    	str1 +=',';
	    	str2 +=',';
	    }
	 }
	 return str1+'|'+str2;
}


//converts fuzzy values to given format
function make_fuzzy_string(sym)
{
	 var str1 = "";
	 var str2 = "";
	 for(var i=1; i<=srow[sym] ; i++)
	 {

 		var fv = $('#s'+sym+'_'+i).val();
	    var ev = $('#s'+sym+'-'+i).val();

	    if(!fv)
	    {
	    	return 1;
	    }
	    str1 = str1+fv;
	    str2 = str2+ev;

	    if(i!=srow[sym])
	    {
	    	str1 +=',';
	    	str2 +=',';
	    }
	 }
	 return str1+'|'+str2;
}

//finally data is sent to php
function ajax_call(str)
{

	$.ajax({
    	url   : "../php/add_to_db.php",
    	type  : "POST",
    	async : false,
    	data  : {
				  "str" : str ,
				  "precaution" : precaution, 
				  "specialist" : specialist
    		    },
    	success: function(data)
    	{
    		console.log(data);
    		$("#modal_button").click();
    		//redirect to new page
    	}
	});
}


//Checks if the symptom name already added to database before (may be a different disease)
//If so, then don't let doctor to add new fuzzy values
//Instead load the same fuzzy values as added before!
function check_sym(str)
{
	$.ajax({
    	url   : "../php/check_sym.php",
    	type  : "POST",
    	async : false,
    	data  : {
				  "str" : str ,
    		    },
    	success: function(data)
    	{
    		if(data==-1)
    			in_db = false;
    		else
    	    {
    	    	alert("Symptom "+str+" is already added to database.Fuzzy values will remain same.("+data+")");
    	    	fv_ar = data.split(",");
    	    	in_db = true;
    	    }
    	}
	});
}


//Makes input disabled for symptoms which already exist in database!
function make_disabled()
{
	var ind = no-1;
	for(var i=1;i<=srow[ind];i++)
	{
		var id = '#s'+ind+'_'+i;
		$(id).prop("disabled", true );
		//alert(fv_ar[i-1]);
		$(id).val(fv_ar[i-1]);
	}
}




/*ID GENERATION FOR INPUT TABLE OF SYMPTOM
Note :- Use ID for sending data to php and for filling color in css!

for first symptom, id=0
	its first fuzzy value has id s0_1 and effect of first fuzzy value has id s0-1
	its second fuzzy value has id s0_2 and effect of first fuzzy value has id s0-2
	and so on...

for second symptom, id=1
	its first fuzzy value has id s1_1 and effect of first fuzzy value has id s1-1
	its second fuzzy value has id s1_2 and effect of first fuzzy value has id s1-2
	and so on...

*/
