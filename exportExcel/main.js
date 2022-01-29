function parseDate(s) {
  var b = s.split(/\D/);
  return new Date(b[0], --b[1], b[2]);
}
$("#sform").submit(function(e){
    e.preventDefault();
    $("#textUrl").hide();
    if($('#sform input:checked').length == 0){
         alert("Seleziona almeno una tipologoa di dati da esportare");
       return false;
    }
    var listBox=[];
    $("#sform input:checked").each(function(){
         listBox.push($(this).attr("name"));
    });
 if(parseDate($("[name=end]").val()).getTime()<parseDate($("[name=start]").val()).getTime()){ // swap
    var start = $("[name=start]").val();
    $("[name=start]").val($("[name=end]").val())
    $("[name=end]").val(start);
 }
 var finalUrl="xls.php?datatypes="+listBox.join(",")+"&start="+$("[name=start]").val()+"&end="+$("[name=end]").val()+"&definition="+$("[name=definition]").val()+"&export="+$("[name=export]").val();
 location.href=finalUrl;
});

$("#genLink").click(function(e){
    if($('#sform input:checked').length == 0){
         alert("Seleziona almeno una tipologoa di dati da esportare");
       return false;
    }
    var listBox=[];
    $("#sform input:checked").each(function(){
         listBox.push($(this).attr("name"));
    });
    if($("[name=start]").val().length==0 || $("[name=end]").val().length==0){
        alert("Compila tutti i campi");
        return false;
    }
 if(parseDate($("[name=end]").val()).getTime()<parseDate($("[name=start]").val()).getTime()){ // swap
    var start = $("[name=start]").val();
    $("[name=start]").val($("[name=end]").val())
    $("[name=end]").val(start);
 }
    var finalUrl="xls.php?datatypes="+listBox.join(",")+"&start="+$("[name=start]").val()+"&end="+$("[name=end]").val()+"&definition="+$("[name=definition]").val()+"&export="+$("[name=export]").val();
    $("#textUrl").val("https://www.liceococito.edu.it/meteo/exportExcel/"+finalUrl);
    $("#textUrl").show();
});