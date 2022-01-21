$(".progress-line").hide();
$("#custom").hide();
var intent = "",
    datatype = "",
    when = "";
$(".mainB").click(function () {
    if ($(this).attr("id") != "graphics") $("#plottingArea").hide();
    if ($(this).attr("id") != "activity") $("#actTab").hide();
    else {
        tabDraw();
        $("#actTab").show();
        $("#plottingArea").hide();
    }
    $(".mainB:not([id=" + ($(this).attr("id")) + "])").removeClass("w3-grey");
    intent = $(this).attr("id");
    if (!$(this).hasClass("w3-grey") && $(this).attr("data-dropdown") == "yes") {
        $(".mainB[id=" + ($(this).attr("id")) + "]").addClass("w3-grey");
        $("#datatype").show();

    } else {
        $(".mainB[id=" + ($(this).attr("id")) + "]").removeClass("w3-grey");
        $("#datatype").hide();
        $("#when").hide();
    }
    sView();
});


$(".dt").click(function () {
    $("#when").removeClass("w3-black");
    $("#when").removeClass("w3-red");
    $("#when").removeClass("w3-blue");
    $("#when").removeClass("w3-green");
    $("#when").removeClass("w3-cyan");
    $("#when").removeClass("w3-magenta");
    $("#when").removeClass("w3-orange");
    if ($(this).hasClass("w3-red")) $("#when").addClass("w3-red");
    else if ($(this).hasClass("w3-blue")) $("#when").addClass("w3-blue");
    else if ($(this).hasClass("w3-green")) $("#when").addClass("w3-green");
    else if ($(this).hasClass("w3-cyan")) $("#when").addClass("w3-cyan");
    else if ($(this).hasClass("w3-magenta")) $("#when").addClass("w3-magenta");
    else if ($(this).hasClass("w3-orange")) $("#when").addClass("w3-orange");
    $(".dt:not([data-type=" + ($(this).attr("data-type")) + "])").removeClass("w3-grey");
    datatype = $(this).attr("data-type");
    if (!$(this).hasClass("w3-grey")) {
        $(".dt[id=" + ($(this).attr("id")) + "]").addClass("w3-grey");
        $("#when").show();

    } else {
        $(".mainB[id=" + ($(this).attr("id")) + "]").removeClass("w3-grey");

        $("#when").hide();
    }
   sView();
});
var busyCustom = true;
function sView() {
    if (typeof when == 'undefined' || !when || typeof intent == 'undefined' || !intent || typeof datatype == 'undefined' || !datatype || busyCustom) return false;
    if (intent == "activity") return false;
    $(".progress-line").show();
    $.get("data.php", {
        "when": when,
        "dataType": datatype
    })

        .done(function (data) {

            if (!data["data"].length) {
                $("#noContent").show();
                $("#plot").hide();
            } else {
                $("#noContent").hide();
                $("#plot").show();
            }
            $(".progress-line").hide();

            if (when == "weekly" || when == "weeklyprev" || when == "thismonth" || when == "prevmonth" || when.startsWith("custom|week")  || when.startsWith("custom|month")) {
                if (intent == "datas") tableDisplay(data);
                else weekDisplay(data);
            } else {
                if (intent == "datas") tableDisplay(data);
                else dayDisplay(data);
            }

        });
}
$(".td").click(function () {
     if($(this).attr("data-when")=="custom"){
        $("#custom").show();
        $("#plottingArea").hide();
        busyCustom = true;
    }
    else{
        $("#plottingArea").show();
        $("#custom").hide();
        when = $(this).attr("data-when");
        busyCustom = false;
        sView();
    }

});
setInterval(function () {
    sView();
}, 30 * 1000);


for(var i=2010;i<2100;i++){
	$("#cYearInput").append('<option '+((new Date()).getFullYear()==i?"selected":"")+' value="'+i+'">'+i+'</option>');
}

$('select[name=customSel]').on('change', function() {
  selectiveChoiceinputs();
});

function weekCount(year, month_number) {

    var firstOfMonth = new Date(year, month_number-1, 1);
    var lastOfMonth = new Date(year, month_number, 0);

    var used = firstOfMonth.getDay() + lastOfMonth.getDate();

    return Math.ceil( used / 7);
}

function selectiveChoiceinputs(){
$("#cDateInpuy").val("");
$("#cWeekInput").val("1");
$("#cMonthInput").val("1");
$("#cYearInput").val((new Date()).getFullYear());
switch($('select[name=customSel]').val()){
    case "day":
        $("#cDateInpuy").show();
        $("#cWeekInput").hide();
        $("#cMonthInput").hide();
        $("#cYearInput").hide();
        break;
    case "week":
        $("#cDateInpuy").hide();
        $("#cWeekInput").show();
        $("#cMonthInput").show();
        $("#cYearInput").show();
        break;
    case "month":
        $("#cDateInpuy").hide();
        $("#cWeekInput").hide();
        $("#cMonthInput").show();
        $("#cYearInput").show();
        break;
  }
}
selectiveChoiceinputs();

function updateWCountInput(){
    let nWeeks = weekCount($("#cYearInput").val(), $("#cMonthInput").val());
    $("#cWeekInput").html("");
    for(let i=0;i<nWeeks;i++){
         $("#cWeekInput").append('<option '+(i==0?"selected":"")+' value="'+(i+1)+'">Settimana '+(i+1)+'</option>');
        }
}
updateWCountInput();

$('#cMonthInput,#cYearInput').on('change', function() {
    updateWCountInput();
});


$("#sendCustom").click(function(){
    let frame = $('select[name=customSel]').val();
    let final = "custom|"+frame+"|";
    switch(frame){
        case "day":
            final+=$("#cDateInpuy").val();
        break;
        case "week":
            final+=$("#cWeekInput").val()+"|"+$("#cMonthInput").val()+"|"+$("#cYearInput").val();
        break;
        case "month":
            final+=$("#cMonthInput").val()+"|"+$("#cYearInput").val();
        break;
    }
    $("#custom").hide();
    $("#plottingArea").show();
    busyCustom = false;
    when=final;
    sView();
});
