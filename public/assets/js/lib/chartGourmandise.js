
//bar chart
var ctx = document.getElementById( "barChart" );
var tab01 = document.getElementById( "clientTab" ).innerHTML;
var tab02 = document.getElementById( "caTab" ).innerHTML;

//Formatage des chaines json vers tableau JS
client = tab01.substr(1,tab01.length-2);
var re01 = /\s*,\s*/;
var clientTab = client.split(re01);

//Idem pour CA. Numérique donc suppression des ""
var re02 = /"/gi;
var a = tab02.replace(re02, ' ');
ca = a.substr(1,a.length-2);
var re03 = /\s*,\s*/;
var caTab = ca.split(re03);


var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: clientTab,
        datasets: [
            {
                label: "Valeurs en €",
                data: caTab,
                borderColor: "rgba(168, 208, 2016, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(168, 208, 2016,  0.9)"
            }
        ]
    },
    options: {
        scales: {
            yAxes: [ {
                ticks: {
                    beginAtZero: true
                }
            } ]
        }
    }
} );



//doughut chart

var ctxDoughut = document.getElementById( "doughutChart" );
var cir01 = document.getElementById( "designationTab" ).innerHTML;
var cir02 = document.getElementById( "qteTab" ).innerHTML;

//Formatage des chaines json vers tableau JS
designation = cir01.substr(1,cir01.length-2);
var reCir01 = /\s*,\s*/;
var designationTab = designation.split(reCir01);

//Idem pour quantité. Numérique donc suppression des ""
var reCir02 = /"/gi;
var aCir = cir02.replace(reCir02, ' ');
caCir = aCir.substr(1,aCir.length-2);
var reCir03 = /\s*,\s*/;
var quantiteTab = caCir.split(reCir03);

ctxDoughut.height = 150;
var myChartDoughut = new Chart( ctxDoughut, {
    type: 'doughnut',
    data: {
        datasets: [ {
            data: quantiteTab,
            backgroundColor: [
                "rgba(124, 224, 241)",
                "rgba(53,207,234)",
                "rgba(23,191,221)",
                "rgba(21, 176, 204)",
                "rgba(18, 154, 177)",
                "rgba(15,121,140)",
                "rgba(12,100,116)",
                "rgba(9,70,81)"
            ],
            hoverBackgroundColor: [
                "rgba(124, 224, 241)",
                "rgba(53,207,234)",
                "rgba(23,191,221)",
                "rgba(21, 176, 204)",
                "rgba(18, 154, 177)",
                "rgba(15,121,140)",
                "rgba(12,100,116)",
                "rgba(9,70,81)"
            ]

        } ],
        labels: designationTab,
    },
    options: {
        responsive: true
    }
} );


