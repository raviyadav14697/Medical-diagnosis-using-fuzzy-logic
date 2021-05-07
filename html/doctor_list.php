<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
	<title>Add Disease</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/basic style.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

  <script type="text/javascript">

		var no=0;
        $(document).ready(function(){
            ajax_call();
        });


        function ajax_call(str)
        {
            $.ajax({
                url   : "../php/doctor_list.php",
                type  : "POST",
                async : false,
                data  : {

                        },
                success: function(data)
                {
                	console.log(data);
                    $('#add_here').append(data);
                }
            });
        }

		function disease_info(str)
        {
            $.ajax({
                url   : "../php/disease_info.php",
                type  : "POST",
                async : false,
                data  : {
							"disease":str,
                        },
                success: function(data)
                {
					format(data);
                }
            });
        }

		function disease_data(e)
		{
					disease_info(e.id);
		}

		function format(str)
		{
					var row = '';
					var fi = '';
					var a = str.split('/');
					for(var i=0;i<a.length-1;i++)
					{
							row = a[i].split('|');
							fi += f3(i ,row);

					}
					$('#disease_info').html(fi);
					$('html, body').animate({
							 scrollTop: $("#disease_info").offset().top
				    }, 2000);
		}

		function f3(ind , rows)
		{

			var eff = ["Yes" , "Maybe" , "No"];
			var name = '<div class=" vertical-gap sym_header"><h2>'+(ind+1)+'. '+rows[2]+'</h2><h5> Weight of the symptom '+rows[2] + ' = ' +(rows[3])+'</h5></div>';
	    	var tuple1 = '<td><input type="text" class="form-control" disabled value="'
			var tuple2 = '"></td><td><input class="form-control" disabled name="cars"  value="'

	   		var tb1 = '<div class="vertical-gap"><table class="table table-responsive table-bordered table-hover"><thead><tr><th>Sr No. </th><th>Fuzzy Values</th><th>Effect</th></tr></thead><tbody>';
	    	var tb2 = '</tbody></table></div>';

			var fuzzy = rows[4].split(',');

			var effect = rows[6].split(',');
			var s = '';
			for(var i=0; i<fuzzy.length;i++)
			{
					s += '<tr><td>'+(parseInt(i)+1)+'</td>'+tuple1 + fuzzy[i]  + tuple2 + eff[parseInt(effect[i])-1]+'"></td></tr>';
			}
			var tp = (name+tb1+s+tb2);
			return tp;
		}

  </script>

</head>

<body style="background-color: skyblue;">

	<div class= "inside2">
	<div class="container" id="add_here">
					<div class="alert alert-info">
							<?php session_start(); ?>
							<?php echo "Hello, ".$_SESSION['demail']. "!" ?>
							<?php if(!isset($_SESSION['demail'])) header('location:disease_prediction_system.php'); ?>
							<a class=" btn btn-danger col-md-offset-10" href="../php/logout.php" >Logout</a>
							<br>
					</div>
      </div>
	
      <div class="container"><a href="add_disease.php" class="btn btn-success">Add new disease!</a></div>

			<div class="container" id="disease_info">

      </div>
	</div>

</body>

</html>
