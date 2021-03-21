
window.onload = function () {

    let file="https://api.rootnet.in/covid19-in/stats/latest";

        fetch("https://api.rootnet.in/covid19-in/stats/history").then(function(response){
            return response.json();
        }).then(function(obj){
            console.log(obj);


    // fetch (file)
    // .then(x => x.text())

    dataPointarr=[];
    let l=obj.data.length;
    for(i=l-1;i>=0;--i)
    {
        dataPointarr[i]={y:obj.data[i].summary.total};
    }
                
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Rise in Cases"
        },
        data: [{        
            type: "line",
              indexLabelFontSize: 16,
              dataPoints:dataPointarr,
        }]
    });
    chart.render();

    });

    fetch("https://api.rootnet.in/covid19-in/stats/latest").then(function(response){
            return response.json();
        }).then(function(obj){
            console.log(obj);
        
    dataPointarrgold=[];
    dataPointarrsil=[];
    dataPointarrdis=[];
    let l=obj.data.regional.length;
    objdata=obj.data.regional;
    for(i=l-1;i>=0;--i)
    {
        dataPointarrgold[i]={y:objdata[i].totalConfirmed,label:objdata[i].loc};
        dataPointarrsil[i]={y:objdata[i].deaths,label:objdata[i].loc};
        dataPointarrdis[i]={y:objdata[i].discharged,label:objdata[i].loc};
    }

    var chart = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        // title:{
        //     text: "COVID-19 Statewise Data",
        // },
        axisY: {
            title: "Statewise COVID-19 Cases",
            includeZero: true,
        },
        legend: {
            cursor:"pointer",
            itemclick : toggleDataSeries
        },
        toolTip: {
            shared: true,
            content: toolTipFormatter
        },
        data: [{
            type: "bar",
            showInLegend: true,
            name: "Total Confirmed",
            color: "gold",
            dataPoints: dataPointarrgold,
        },
        {
            type: "bar",
            showInLegend: true,
            name: "Deaths",
            color: "red",
            dataPoints: dataPointarrsil,
        },
        {
            type: "bar",
            showInLegend: true,
            name: "Discharged",
            // color: "#A57164",
            color:"brown",
            dataPoints:dataPointarrdis,
        }]
    });
    chart.render();
    
    function toolTipFormatter(e) {
        var str = "";
        var total = 0 ;
        var str3;
        var str2 ;
        for (var i = 0; i < e.entries.length; i++){
            var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
            // total = e.entries[i].dataPoint.y + total;
            str = str.concat(str1);
        }
        str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
        // str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
        return (str2.concat(str));
    }
    
    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
});

    
    }