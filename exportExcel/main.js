$("#sform").submit(function(e){
    e.preventDefault();
    if($('#sform input:checked').length == 0){
         alert("Seleziona almeno una tipologoa di dati da esportare");
       return false;
    }
    var listBox=[];
    $("#sform input:checked").each(function(){
         listBox.push($(this).attr("name"));
    });
 var finalUrl="xls.php?datatypes="+listBox.join(",")+"&start="+$("[name=start]").val()+"&end="+$("[name=end]").val()+"&definition="+$("[name=definition]").val()+"&export="+$("[name=export]").val();
 location.href=finalUrl;
});
