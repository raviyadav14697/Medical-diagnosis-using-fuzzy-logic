<!DOCTYPE html>
<html>
 <head>
  <title>Testing Fuzzy System!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
 </head>
 <body style="background-color: skyblue;">

	<div class= "inside2">
  <div class="container alert-info">
   
    <h1 style ="align:center">Testing Fuzzy System!</h1>
   
  </div>


  <div class="">
      <br /> <br />
      <div id="LoadingImage" class="container" style="display: none">
        <img src="../img/loader.gif" />
      </div>
      <div id="add_here" class="container alert-info" style="display: none">
      </div>
  </div>
</div>
 </body>
</html>

<script>
var zero = [];
var one = [];
var two = [];
var three = [];
var arr_2d = [];
var json = '';
var TP = TN = FP = FN = 0;
var predicted_no = predicted_yes = actual_no = actual_yes = 0;


var csv_columns = ['AGE', 'GENDER', 'CHEST PAIN', 'BP', 'CHOLESTEROL', 'FASTING BLOOD SUGAR', 'RESTING ELECTROCARDIOGRAPHY', 'HEART RATE', 'EXERCISE INDUCED ANGINA', 'OLD PEAK', 'SLOPE OF PEAK EXERCISE', 'CA' , 'THAL' , 'NUM'];

var is_range = [1, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0];

var sname = [];
var fv = [];
var c = c1 =  0;

function getAllSym()
{
    $.ajax({
       url:"../php/user_form.php",
       dataType:"text",
       async:true,
       success:function(data)
       {
            make_array(data);
       }

   });

}

function make_array(str)
{
    var ar = str.split('|');
    for (var i = 0; i < ar.length; i++) {
        var ind = ar[i].indexOf(',');
        sname[i] = ar[i].substring(0,ind);
        fv[i] = ar[i].substring(ind+1,ar[i].length).split(',');
    }
    handle_csv();
}


function handle_csv()
{
         $("#LoadingImage").show();
         $.ajax({
           url:"../csv/heart_disease_all14.csv",
           dataType:"text",
           async:true,
           success:function(data)
           {
              
              var lines = data.split(/\r?\n|\r/);
              for(var count = 0; count<lines.length; count++)
              {
                var cell_data = lines[count].split(",");
                arr_2d.push(cell_data);
              }
    
              for(var i=0; i<arr_2d.length-1; i++)
              {
                  var cur_row = '';
                  for(var j=0; j<arr_2d[0].length-1; j++)
                  {
                      if(j == 3 || j == 9 || j == 10)
                        continue;

                      var cur = parseFloat(arr_2d[i][j]);
                      if(is_range[j] === 1)
                      {
                          sym:
                          for(var k=0; k<sname.length; k++)
                          {

                             if(sname[k] === csv_columns[j])
                             {
                                  var cur_fv = fv[k];

                                  for(var f=0; f<cur_fv.length; f++)
                                  {
                                      var minmax = cur_fv[f].split('-');
                                      var min = parseFloat(minmax[0]);
                                      var max = parseFloat(minmax[1]);
                                
                                      if(cur >= min && cur <= max)
                                      {
                                          cur_row += csv_columns[j]+','+cur_fv[f];
                                          break sym;
                                      }
                                  }                       
                              }
                          }
                          

                          
                      }
                      else
                      {
                          cur_row += csv_columns[j]+','+cur;
                      }


                      if(j != arr_2d[0].length-2)
                        cur_row += '|';
                  }
                  console.log(cur_row);
                  ajax_call(cur_row, i);
              }    
                  
              
              var e = '#add_here';

              var tb1 = '<h2 class="heading"> Confusion Matrix </h2><div class="vertical-gap"><table class="table table-responsive table-bordered "><thead><tr><th>N=299 </th><th>predicted_no</th><th>predicted_yes</th></tr></thead><tbody>';
              var tb2 = '</tbody></table></div>';
              var r1 = '<tr><th>actual_no</th><td>TN = '+TN+'</td><td>FP = '+ FP+'</td><td>'+parseFloat(TN+FP)+'</td></tr>';
              var r2 = '<tr><th>actual_yes</th><td>FN = '+FN+'</td><td>TP = '+ TP+'</td><td>'+parseFloat(FN+TP)+'</td></tr>';
              var r3 = '<tr><th></th><td>'+parseFloat(TN+FN)+'</td><td>'+ parseFloat(FP+TP)+'</td><td>'+parseFloat(TP+TN+FP+FN)+'</td></tr>';


              $(e).append(tb1+r1+r2+r3+tb2);
              $(e).append('<br><br><b>Accuracy : </b>'+(((TP+TN)/(arr_2d.length-1)*100).toFixed(2) + '%'));
              $(e).append('<br><br><b>True Positive Rate(Sensitivity) : </b>'+(((TP)/actual_yes)*100).toFixed(2) + '%');
              $(e).append('<br><br><b>False Positive Rate : </b>'+(((FP)/actual_no)*100).toFixed(2) + '%');
              $(e).append('<br><br><b>Specificity : </b>'+(((TN/actual_no))*100).toFixed(2) + '%');
              $(e).append('<br><br><b>Precision : </b>'+(((TP/predicted_yes))*100).toFixed(2) + '%');
              $(e).append('<br><br><b>Error Rate : </b>'+(((FP+FN)/(arr_2d.length-1)*100).toFixed(2) + '%'));
              $(e).append('<br><br><b>Prevalence : </b>'+(((actual_yes/(arr_2d.length-1)))*100).toFixed(2) + '%');

              $(e).show();
              console.log("total match = "+(c/(arr_2d.length-1)));
              $("#LoadingImage").hide();
            }
        });

}


function ajax_call(str, i)
{
    console.log(str);
    $.ajax({
          url   : "../php/evaluate_testing.php",
          dataType:'json',
          type  : "POST",
          data: {
            'str' : str,
          },
          async : false,
          success: function(data)
          {
              json = (data);
              var severity = parseFloat(json.Heart_Disease).toFixed(2);
              console.log(severity);
              var out = 1;
              if(severity < 63){
                  out = 0;
                  predicted_no++;
              }
              else
                predicted_yes++;


              if(arr_2d[i][13] == 0){
                  actual_no++;
                  if(out == 0)
                    c++;
              }
              else{
                actual_yes++;
                if(out == 1)
                  c++;
              }

              
              
              console.log(i+"       "+severity+"   "+arr_2d[i][13]);


              if(arr_2d[i][13] == 0 && out == 0)
                  TN += 1;  
              else if(out == 1 && arr_2d[i][13] >= 1)
                  TP += 1;
              else if(out == 1 && arr_2d[i][13] == 0)
                  FP += 1;
              else
                  FN += 1;
          },
          error : function(){
            console.log('Error in ajax');
          },

    });

} 

function mean(numbers) {
    var total = 0, i=0;
    for (i = 0; i < numbers.length; i += 1) {
        total += parseFloat(numbers[i]);
    }
    
    return parseFloat(total / numbers.length);
}

function median(numbers) {
    var median = 0, numsLen = parseFloat(numbers.length);
    numbers.sort();
 
    if (numsLen % 2 === 0 ) {
        median = parseFloat((parseFloat(numbers[numsLen / 2 - 1]) + parseFloat(numbers[numsLen / 2])) / 2);
    } else { 
        median = parseFloat(numbers[(numsLen - 1) / 2]);
    }
 
    return median;
}

$(document).ready(function(){
  getAllSym();
});

</script>
