$(document).ready(function(){
    ajax_call();
});
var symptom_description = [];

function ajax_call(str)
{
  $.ajax({
      url   : "../php/symptom_description.php",
      type  : "POST",
      async : false,
      data  : {

              },
      success: function(data)
      {
          //alert(data);
          //console.log(data);
          symptom_description = data.split('|');
          //console.log(symptom_description);
          // for(var i=0; i<11; i++){
          //     console.log(tmp[i]);
          //     symptom_description.push(tmp[i]);
          // }
      }
  });

    $.ajax({
        url   : "../php/user_form.php",
        type  : "POST",
        async : false,
        data  : {

                },
        success: function(data)
        {
            //alert(data);
            make_array(data);
        }
    });


}

var sname = [];
var fv = [];

function make_array(str)
{
    var ar = str.split('|');
    for (var i = 0; i < ar.length; i++) {
        var ind = ar[i].indexOf(',');
        sname[i] = ar[i].substring(0,ind);
        fv[i] = ar[i].substring(ind+1,ar[i].length).split(',');
        //alert(sname[i]+" "+fv[i]);
    }
    show();
}

function show()
{
    //console.log(fv.length);
    var tb1 = '<div class=""><table class="table table-responsive table-bordered "><thead><tr><th>Symptom </th><th>Value</th><th>Symptom Description</th></tr></thead><tbody>';
  	var tb2 = '</tbody></table></div>';
    for (var i = 0; i < sname.length; i++) {
        var box = '<tr><td class = "sname">'+sname[i]+' :- </td>';
        box = box +'<td><select class=" form-control" id="s'+i+'">'+(i+1)+' '+sname[i];

        for (var j = 0; j < fv[i].length; j++) {
            var t = '<option value="'+fv[i][j]+'">'+fv[i][j]+'</option>';
            box += t;
        }

        box+='</select></td>';
        
        box += '<td>'+ symptom_description[i] +'</td></tr>';
        tb1 = tb1+box;
    }
    $("#add_here").append(tb1+tb2);
}

var json;
function make_string()
{

    var str = '';
    for (var i = 0; i < sname.length; i++) {
        str = str +sname[i]+','+$("#s"+i).val();
        if(sname.length-1!=i)
            str += '|';
    }
    console.log(str);
    //send this data to evaluate
    //alert(str);
    $.ajax({
        url   : "../php/evaluate.php",
        type  : "POST",
        async : false,
        dataType : "json",
        data  : {
                  "str" : str ,
                },
        success: function(data)
        {
            //alert(data);
            // var queryString = "?" + JSON.stringify(data);
            // window.location.href = "result.html" + queryString;
            //alert(data);
            json = (data);
            //alert(JSON.parse(json));
            w = window.open("../html/result.php", "Result");
        }
    });
}


function accuracy()
{

}

function getJSON(){
        return json;
}
