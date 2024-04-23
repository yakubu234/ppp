// (function () {
//   "use strict";

//   // order chart
//   var options2 = {
//     series: [
//       {
//         name: "Daily",
//         data: [
//           2.15, 3, 1.5, 2, 2.4, 3, 2.4, 2.8, 1.5, 1.7, 3, 2.5, 3, 2, 2.15, 3,
//           1.1,
//         ],
//       },
//       {
//         name: "Weekly",
//         data: [
//           -2.15, -3, -1.5, -2, -2.4, -3, -2.4, -2.8, -1.5, -1.7, -3, -2.5, -3,
//           -2, -2.15, -3, -1.1,
//         ],
//       },
//       {
//         name: "Monthly",
//         data: [
//           -2.25, -2.35, -2.45, -2.55, -2.65, -2.75, -2.85, -2.95, -3.0, -3.1,
//           -3.2, -3.25, -3.1, -3.0, -2.95, -2.85, -2.75,
//         ],
//       },
//       {
//         name: "Yearly",
//         data: [
//           2.25, 2.35, 2.45, 2.55, 2.65, 2.75, 2.85, 2.95, 3.0, 3.1, 3.2, 3.25,
//           3.1, 3.0, 2.95, 2.85, 2.75,
//         ],
//       },
//     ],
//     chart: {
//       type: "bar",
//       width: 180,
//       height: 120,
//       stacked: true,
//       toolbar: {
//         show: false,
//       },
//     },
//     plotOptions: {
//       bar: {
//         vertical: true,
//         columnWidth: "40%",
//         barHeight: "80%",
//         startingShape: "rounded",
//         endingShape: "rounded",
//       },
//     },
//     colors: [
//       dunzoAdminConfig.primary,
//       dunzoAdminConfig.primary,
//       "#F2F3F7",
//       "#F2F3F7",
//     ],
//     dataLabels: {
//       enabled: false,
//     },
//     stroke: {
//       width: 0,
//     },
//     legend: {
//       show: false,
//     },
//     grid: {
//       xaxis: {
//         offsetX: -2,
//         lines: {
//           show: false,
//         },
//       },
//       yaxis: {
//         lines: {
//           show: false,
//         },
//       },
//     },
//     yaxis: {
//       min: -5,
//       max: 5,
//       show: false,
//       axisBorder: {
//         show: false,
//       },
//       axisTicks: {
//         show: false,
//       },
//     },
//     tooltip: {
//       shared: false,
//       x: {
//         show: false,
//       },
//       y: {
//         show: false,
//       },
//       z: {
//         show: false,
//       },
//     },
//     xaxis: {
//       categories: [
//         "Jan",
//         "Feb",
//         "Mar",
//         "Apr",
//         "May",
//         "Jun",
//         "July",
//         "Aug",
//         "Sep",
//         "Oct",
//         "Nov",
//         "Dec",
//       ],
//       offsetX: 0,
//       offsetY: 0,
//       labels: {
//         offsetX: 0,
//         offsetY: 0,
//         show: false,
//       },
//       axisBorder: {
//         offsetX: 0,
//         offsetY: 0,
//         show: false,
//       },
//       axisTicks: {
//         offsetX: 0,
//         offsetY: 0,
//         show: false,
//       },
//     },
//     responsive: [
//       {
//         breakpoint: 1760,
//         options: {
//           chart: {
//             width: 160,
//           },
//         },
//       },
//       {
//         breakpoint: 1601,
//         options: {
//           chart: {
//             height: 110,
//           },
//         },
//       },
//       {
//         breakpoint: 1560,
//         options: {
//           chart: {
//             width: 140,
//           },
//         },
//       },
//       {
//         breakpoint: 1460,
//         options: {
//           chart: {
//             width: 120,
//           },
//         },
//       },
//       {
//         breakpoint: 1400,
//         options: {
//           chart: {
//             width: 150,
//           },
//         },
//       },
//       {
//         breakpoint: 1110,
//         options: {
//           chart: {
//             width: 200,
//           },
//         },
//       },
//       {
//         breakpoint: 700,
//         options: {
//           chart: {
//             width: 150,
//           },
//         },
//       },
//       {
//         breakpoint: 576,
//         options: {
//           chart: {
//             width: 220,
//           },
//         },
//       },
//       {
//         breakpoint: 420,
//         options: {
//           chart: {
//             width: 150,
//           },
//         },
//       },
//     ],
//   };

//   var chart2 = new ApexCharts(document.querySelector("#orderchart"), options2);

//   chart2.render();

//   // profit chart
//   var options3 = {
//     series: [
//       {
//         name: "Desktops",
//         data: [210, 180, 650, 200, 600, 100, 800, 300, 500],
//       },
//     ],
//     chart: {
//       width: 200,
//       height: 150,
//       type: "line",
//       toolbar: {
//         show: false,
//       },
//       dropShadow: {
//         enabled: true,
//         enabledOnSeries: undefined,
//         top: 5,
//         left: 0,
//         blur: 3,
//         color: "#01A1B9",
//         opacity: 0.3,
//       },
//       zoom: {
//         enabled: false,
//       },
//     },
//     colors: ["#01A1B9"],
//     dataLabels: {
//       enabled: false,
//     },
//     stroke: {
//       width: 2,
//       curve: "smooth",
//     },
//     grid: {
//       show: false,
//     },
//     tooltip: {
//       x: {
//         show: false,
//       },
//       y: {
//         show: false,
//       },
//       z: {
//         show: false,
//       },
//       marker: {
//         show: false,
//       },
//     },
//     xaxis: {
//       categories: [
//         "Jan",
//         "Feb",
//         "Mar",
//         "Apr",
//         "May",
//         "Jun",
//         "Jul",
//         "Aug",
//         "Sep",
//       ],
//       labels: {
//         show: false,
//       },
//       axisBorder: {
//         show: false,
//       },
//       axisTicks: {
//         show: false,
//       },
//       tooltip: {
//         enabled: false,
//       },
//     },
//     yaxis: {
//       labels: {
//         show: false,
//       },
//       axisBorder: {
//         show: false,
//       },
//       axisTicks: {
//         show: false,
//       },
//     },
//     responsive: [
//       {
//         breakpoint: 1780,
//         options: {
//           chart: {
//             width: 180,
//           },
//         },
//       },
//       {
//         breakpoint: 1680,
//         options: {
//           chart: {
//             width: 160,
//           },
//         },
//       },
//       {
//         breakpoint: 1601,
//         options: {
//           chart: {
//             height: 110,
//           },
//         },
//       },
//       {
//         breakpoint: 1560,
//         options: {
//           chart: {
//             width: 140,
//           },
//         },
//       },
//       {
//         breakpoint: 1460,
//         options: {
//           chart: {
//             width: 120,
//           },
//         },
//       },
//       {
//         breakpoint: 1400,
//         options: {
//           chart: {
//             width: 150,
//           },
//         },
//       },
//       {
//         breakpoint: 1110,
//         options: {
//           chart: {
//             width: 200,
//           },
//         },
//       },
//       {
//         breakpoint: 700,
//         options: {
//           chart: {
//             width: 150,
//           },
//         },
//       },
//       {
//         breakpoint: 576,
//         options: {
//           chart: {
//             width: 220,
//           },
//         },
//       },
//       {
//         breakpoint: 420,
//         options: {
//           chart: {
//             width: 150,
//           },
//         },
//       },
//     ],
//   };

//   var chart3 = new ApexCharts(document.querySelector("#profitchart"), options3);
//   chart3.render();

//   // growth chart
//   var growthoptions = {
//     series: [
//       {
//         name: "Growth",
//         data: [10, 5, 15, 0, 15, 12, 29, 29, 29, 12, 15, 5],
//       },
//     ],
//     chart: {
//       height: 135,
//       type: "line",
//       toolbar: {
//         show: false,
//       },
//       dropShadow: {
//         enabled: true,
//         enabledOnSeries: undefined,
//         top: 5,
//         left: 0,
//         blur: 4,
//         color: "#307EF3",
//         opacity: 0.22,
//       },
//     },
//     grid: {
//       yaxis: {
//         lines: {
//           show: false,
//         },
//       },
//     },
//     colors: ["#5527FF"],
//     stroke: {
//       width: 3,
//       curve: "smooth",
//     },
//     xaxis: {
//       type: "category",
//       categories: [
//         "Jan",
//         "Feb",
//         "Mar",
//         "Apr",
//         "May",
//         "Jun",
//         "Jul",
//         "Aug",
//         "Sep",
//         "Oct",
//         "Nov",
//         "Dec",
//         "Jan",
//       ],
//       tickAmount: 10,
//       labels: {
//         style: {
//           fontFamily: "Outfit, sans-serif",
//         },
//       },
//       axisTicks: {
//         show: false,
//       },
//       axisBorder: {
//         show: false,
//       },
//       tooltip: {
//         enabled: false,
//       },
//     },
//     fill: {
//       type: "gradient",
//       gradient: {
//         shade: "dark",
//         gradientToColors: ["#5527FF"],
//         shadeIntensity: 1,
//         type: "horizontal",
//         opacityFrom: 1,
//         opacityTo: 1,
//         colorStops: [
//           {
//             offset: 0,
//             color: "#5527FF",
//             opacity: 1,
//           },
//           {
//             offset: 100,
//             color: "#E069AE",
//             opacity: 1,
//           },
//         ],
//         // stops: [0, 100, 100, 100]
//       },
//     },
//     yaxis: {
//       min: -10,
//       max: 40,
//       labels: {
//         show: false,
//       },
//     },
//     responsive: [
//       {
//         breakpoint: 992,
//         options: {
//           chart: {
//             height: 150,
//           },
//         },
//       },
//       {
//         breakpoint: 768,
//         options: {
//           chart: {
//             height: 180,
//           },
//         },
//       },
//     ],
//   };

//   var growthchart = new ApexCharts(
//     document.querySelector("#growthchart"),
//     growthoptions
//   );
//   growthchart.render();

//   // visitor chart
//   var optionsvisitor = {
//     series: [
//       {
//         name: "Active",
//         data: [18, 10, 65, 18, 28, 10],
//       },
//       {
//         name: "Bounce",
//         data: [25, 50, 30, 30, 25, 45],
//       },
//     ],
//     chart: {
//       type: "bar",
//       height: 270,
//       toolbar: {
//         show: false,
//       },
//     },
//     plotOptions: {
//       bar: {
//         horizontal: false,
//         columnWidth: "50%",
//       },
//     },
//     dataLabels: {
//       enabled: false,
//     },
//     stroke: {
//       show: true,
//       width: 6,
//       colors: ["transparent"],
//     },
//     grid: {
//       show: true,
//       borderColor: "var(--chart-border)",
//       xaxis: {
//         lines: {
//           show: true,
//         },
//       },
//     },
//     colors: ["#FFA941", "var(--theme-default)"],
//     xaxis: {
//       categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
//       tickAmount: 4,
//       tickPlacement: "between",
//       labels: {
//         style: {
//           fontFamily: "Outfit, sans-serif",
//         },
//       },
//       axisBorder: {
//         show: false,
//       },
//       axisTicks: {
//         show: false,
//       },
//     },
//     yaxis: {
//       min: 0,
//       max: 100,
//       tickAmount: 5,
//       tickPlacement: "between",
//       labels: {
//         style: {
//           fontFamily: "Outfit, sans-serif",
//         },
//       },
//     },
//     fill: {
//       opacity: 1,
//     },
//     legend: {
//       position: "top",
//       horizontalAlign: "left",
//       fontFamily: "Outfit, sans-serif",
//       fontSize: "14px",
//       fontWeight: 500,
//       labels: {
//         colors: "var(--chart-text-color)",
//       },
//       markers: {
//         width: 6,
//         height: 6,
//         radius: 12,
//       },
//       itemMargin: {
//         horizontal: 10,
//       },
//     },
//     responsive: [
//       {
//         breakpoint: 1366,
//         options: {
//           plotOptions: {
//             bar: {
//               columnWidth: "80%",
//             },
//           },
//           grid: {
//             padding: {
//               right: 0,
//             },
//           },
//         },
//       },
//       {
//         breakpoint: 1200,
//         options: {
//           plotOptions: {
//             bar: {
//               columnWidth: "50%",
//             },
//           },
//           grid: {
//             padding: {
//               right: 0,
//             },
//           },
//         },
//       },
//       {
//         breakpoint: 576,
//         options: {
//           plotOptions: {
//             bar: {
//               columnWidth: "60%",
//             },
//           },
//           grid: {
//             padding: {
//               right: 5,
//             },
//           },
//         },
//       },
//     ],
//   };

//   var chartvisitor = new ApexCharts(
//     document.querySelector("#visitor-chart"),
//     optionsvisitor
//   );
//   chartvisitor.render();

//   // radial chart js
//   function radialCommonOption(data) {
//     return {
//       series: data.radialYseries,
//       chart: {
//         height: 130,
//         type: "radialBar",
//         dropShadow: {
//           enabled: true,
//           top: 3,
//           left: 0,
//           blur: 10,
//           color: data.dropshadowColor,
//           opacity: 0.35,
//         },
//       },
//       plotOptions: {
//         radialBar: {
//           hollow: {
//             size: "60%",
//           },
//           track: {
//             strokeWidth: "60%",
//             opacity: 1,
//             margin: 5,
//           },
//           dataLabels: {
//             showOn: "always",
//             value: {
//               color: "var(--body-font-color)",
//               fontSize: "14px",
//               show: true,
//               offsetY: -10,
//             },
//           },
//         },
//       },
//       colors: data.color,
//       stroke: {
//         lineCap: "round",
//       },
//       responsive: [
//         {
//           breakpoint: 1500,
//           options: {
//             chart: {
//               height: 130,
//             },
//           },
//         },
//       ],
//     };
//   }

//   const radial1 = {
//     color: ["var(--theme-default)"],
//     dropshadowColor: "var(--theme-default)",
//     radialYseries: [78],
//   };

//   const radialchart1 = document.querySelector("#radial-facebook");
//   if (radialchart1) {
//     var radialprogessChart1 = new ApexCharts(
//       radialchart1,
//       radialCommonOption(radial1)
//     );
//     radialprogessChart1.render();
//   }

//   // radial 2
//   const radial2 = {
//     color: ["#FFA941"],
//     dropshadowColor: "#FFA941",
//     radialYseries: [70],
//   };

//   const radialchart2 = document.querySelector("#radial-instagram");
//   if (radialchart2) {
//     var radialprogessChart2 = new ApexCharts(
//       radialchart2,
//       radialCommonOption(radial2)
//     );
//     radialprogessChart2.render();
//   }

//   // radial 3
//   const radial3 = {
//     color: ["#57B9F6"],
//     dropshadowColor: "#57B9F6",
//     radialYseries: [50],
//   };

//   const radialchart3 = document.querySelector("#radial-twitter");
//   if (radialchart3) {
//     var radialprogessChart3 = new ApexCharts(
//       radialchart3,
//       radialCommonOption(radial3)
//     );
//     radialprogessChart3.render();
//   }

//   // radial 4
//   const radial4 = {
//     color: ["#EBA31D"],
//     dropshadowColor: "#EBA31D",
//     radialYseries: [80],
//   };

//   const radialchart4 = document.querySelector("#radial-youtube");
//   if (radialchart4) {
//     var radialprogessChart4 = new ApexCharts(
//       radialchart4,
//       radialCommonOption(radial4)
//     );
//     radialprogessChart4.render();
//   }

//   // radial 5
//   const radial5 = {
//     color: ["var(--theme-default)"],
//     dropshadowColor: "var(--theme-default)",
//     radialYseries: [70],
//   };

//   const radialchart5 = document.querySelector("#radial-chart");
//   if (radialchart5) {
//     var radialprogessChart5 = new ApexCharts(
//       radialchart5,
//       radialCommonOption(radial5)
//     );
//     radialprogessChart5.render();
//   }

//   // radial 6
//   const radial6 = {
//     color: ["var(--theme-secondary)"],
//     dropshadowColor: "var(--theme-secondary)",
//     radialYseries: [60],
//   };

//   const radialchart6 = document.querySelector("#radial-chart1");
//   if (radialchart6) {
//     var radialprogessChart6 = new ApexCharts(
//       radialchart6,
//       radialCommonOption(radial6)
//     );
//     radialprogessChart6.render();
//   }

//   // bitcoin widget charts
//   function widgetCommonOption(data) {
//     return {
//       series: [
//         {
//           data: data.widgetYseries,
//         },
//       ],
//       chart: {
//         width: 120,
//         height: 120,
//         type: "line",
//         toolbar: {
//           show: false,
//         },
//         offsetY: 10,
//         dropShadow: {
//           enabled: true,
//           enabledOnSeries: undefined,
//           top: 6,
//           left: 0,
//           blur: 6,
//           color: data.dropshadowColor,
//           opacity: 0.3,
//         },
//       },
//       grid: {
//         show: false,
//       },
//       colors: data.color,
//       stroke: {
//         width: 2,
//         curve: "smooth",
//       },
//       labels: data.label,
//       markers: {
//         size: 0,
//       },
//       xaxis: {
//         // type: 'datetime',
//         axisBorder: {
//           show: false,
//         },
//         axisTicks: {
//           show: false,
//         },
//         labels: {
//           show: false,
//         },
//         tooltip: {
//           enabled: false,
//         },
//       },
//       yaxis: {
//         axisBorder: {
//           show: false,
//         },
//         axisTicks: {
//           show: false,
//         },
//         labels: {
//           show: false,
//         },
//       },
//       legend: {
//         show: false,
//       },
//       tooltip: {
//         marker: {
//           show: false,
//         },
//         x: {
//           show: false,
//         },
//         y: {
//           show: false,
//           labels: {
//             show: false,
//           },
//         },
//       },
//       responsive: [
//         {
//           breakpoint: 1790,
//           options: {
//             chart: {
//               width: 100,
//               height: 100,
//             },
//           },
//         },
//         {
//           breakpoint: 1661,
//           options: {
//             chart: {
//               width: "100%",
//               height: 100,
//             },
//           },
//         },
//       ],
//     };
//   }

//   const widget1 = {
//     color: ["#FFA941"],
//     dropshadowColor: "#FFA941",
//     label: [
//       "jan",
//       "feb",
//       "mar",
//       "apr",
//       "may",
//       "jun",
//       "jul",
//       "aug",
//       "sep",
//       "oct",
//       "nov",
//     ],
//     widgetYseries: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39],
//   };

//   const widgetchart1 = document.querySelector("#currency-chart");
//   if (widgetchart1) {
//     var bitcoinChart1 = new ApexCharts(
//       widgetchart1,
//       widgetCommonOption(widget1)
//     );
//     bitcoinChart1.render();
//   }

//   // widget 2
//   const widget2 = {
//     color: ["var(--theme-default)"],
//     dropshadowColor: "var(--theme-default)",
//     label: ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep"],
//     widgetYseries: [30, 25, 30, 25, 64, 40, 59, 52, 64],
//   };

//   const widgetchart2 = document.querySelector("#currency-chart2");
//   if (widgetchart2) {
//     var bitcoinChart2 = new ApexCharts(
//       widgetchart2,
//       widgetCommonOption(widget2)
//     );
//     bitcoinChart2.render();
//   }

//   // widget 3
//   const widget3 = {
//     color: ["#53A653"],
//     dropshadowColor: "#53A653",
//     label: [
//       "jan",
//       "feb",
//       "mar",
//       "apr",
//       "may",
//       "jun",
//       "jul",
//       "aug",
//       "sep",
//       "oct",
//     ],
//     widgetYseries: [30, 25, 36, 30, 64, 50, 45, 62, 60, 64],
//   };

//   const widgetchart3 = document.querySelector("#currency-chart3");
//   if (widgetchart3) {
//     var bitcoinChart3 = new ApexCharts(
//       widgetchart3,
//       widgetCommonOption(widget3)
//     );
//     bitcoinChart3.render();
//   }
// })();


//  Sales Summary chart start
var options1 = {
  series: [52, 35, 15, 45],
  chart: {
    type: 'donut',
    height: 200,
  },
  dataLabels:{
    enabled: false
  },
  legend:{
    show: false
  },
  responsive: [{
    breakpoint: 1700,
    options: {
        chart: {
            height: 150
        },
    },
  },{
    breakpoint: 1440,
    options: {
        chart: {
            height: 205
        },
    },
  },{
    breakpoint: 421,
    options: {
        chart: {
            height: 170
        },
    },
  }
],
  plotOptions: {
    pie: {
        expandOnClick: false,
        donut: {
            size: "70%",
            labels: {
                show: true,
                value: {
                  offsetY: 5,
                },
                total: {
                    show: true,
                    fontSize: "14px",
                    color: "#9B9B9B", 
                    fontFamily: "Outfit', sans-serif",
                    fontWeight: 400,
                    label: "Total",
                    formatter: () => "60%",
                },
            },
        },
    },
},
  yaxis: {
    labels: {
        formatter: function(val) {
            return val / 100 + "$";
        },
    },          
  },
  colors:[ dunzoAdminConfig.primary, '#DC3545' , '#53a653cf', dunzoAdminConfig.secondary],
};
var chart1 = new ApexCharts(document.querySelector("#Categories-chart-1"), options1);
chart1.render();

var options = {
  series: [{
    name: "Desktops",
    data: [ 50, 50, 50, 25, 25, 25, 2, 2, 2, 25, 25, 25, 62, 62],
}],
  chart: {
  type: 'area',
  height: 200,
  // offsetY: -20,
  zoom: {
    enabled: false
  },
  toolbar: {
    show: false,
  }, 
  dropShadow: {
    enabled: true,
    top: 5,
    left: 0,
    bottom: 3,
    blur: 2,
    color: dunzoAdminConfig.primary,
    opacity: 0.2,
  },
},
colors: [dunzoAdminConfig.primary],
fill: {
  type: "gradient",
  gradient: {
    shadeIntensity: 1,
    opacityFrom: 0.6,
    opacityTo: 0.2,
    stops: [0, 100, 100]
  }
},
dataLabels: {
  enabled: false
},
grid: {
  show: false,
},
  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
};
var chart = new ApexCharts(document.querySelector("#Earned-chart-1"), options);
chart.render();

var options = {
  series: [{
  name: 'TEAM A',
  type: 'column',
  data: [220,, 250, , 210, , 210, , 270, , 220, , 250, , 260, , 210, , 230]
},{
  name: 'TEAM B',
  type: 'area',
  data: [210,170, 240, 160, 200, 170, 200, 150, 260, 170, 210,170,240, 160, 250, 140, 200, 140,220,220]
}],
  chart: {
  height: 335,
  type: 'area',
  stacked: false,
  toolbar: {
    show: false,
  }
},
stroke: {
  width: [0, 2, 5],
  curve: 'stepline'
},
plotOptions: {
  bar: {
    columnWidth: '100px'
  }
},
colors: [ '#bebebe' , dunzoAdminConfig.primary],
dropShadow: {
  enabled: true,
  top: 5,
  left: 6,
  bottom: 5,
  blur: 2,
  color: dunzoAdminConfig.primary,
  opacity: 0.5,
},
fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.5,
      opacityTo: 0.1,
      stops: [0, 90, 100]
    }
  },    
grid :{
  show: true,
  strokeDashArray: 3,
  xaxis: {
    lines: {
      show: true,
    }
  },
  yaxis: {
    lines: {
      show: true,
    }
  },
},
xaxis: {
  categories: ["Jan", "", "feb", "", "Mar", "", "Apr", "", "May", "", "Jun" ,"" , "July" , "" , "Aug" , "" , "Sep" , "" , "Oct" , ""],
  labels: {
    style: {
        fontFamily: 'Outfit, sans-serif',
        fontWeight: 500,
        colors: '#8D8D8D',
    },
  },
},
dataLabels: {
  enabled: false,
},
  yaxis: {
    labels: {
      style: {
          fontFamily: 'Outfit, sans-serif',
          fontWeight: 500,
          colors: '#8D8D8D',
      },
    },
  },
legend:{
  show: false,
},
tooltip: {
  custom: function ({ series, seriesIndex, dataPointIndex,}) {
    return '<div class="apex-tooltip p-2">' + '<span>' + '<span class="bg-primary">' + '</span>' + 'Project Created' + '<h3>' + '$'+ series[seriesIndex][dataPointIndex] + '<h3/>'  + '</span>' + '</div>';
  },
},
};
var chart = new ApexCharts(document.querySelector("#revenuegrowth-1"), options);
chart.render();

var options = {
  series: [{
    name: "Desktops",
    data: [15, 14, 11, 20, 10, 15 , 11],
}],
  chart: {
  type: 'area',
  height: 120,
  offsetY: 10,
  zoom: {
    enabled: false
  },
  toolbar: {
    show: false,
  }, 
  dropShadow: {
    enabled: true,
    top: 5,
    left: 0,
    bottom: 3,
    blur: 2,
    color: dunzoAdminConfig.primary,
    opacity: 0.2,
  },
},
colors: [dunzoAdminConfig.primary],
fill: {
  type: "gradient",
  gradient: {
    shadeIntensity: 1,
    opacityFrom: 0.6,
    opacityTo: 0.2,
    stops: [0, 100, 100]
  }
},
dataLabels: {
  enabled: false
},
grid: {
  show: false,
},
  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
  markers: {
      discrete: [{
          seriesIndex: 0,
          dataPointIndex: 3,
          fillColor: dunzoAdminConfig.primary,
          strokeColor: "#fff",
          size: 6,
          shape: "circle"
      },
      ],
    },
};
var chart = new ApexCharts(document.querySelector("#budget-chart-1"), options);
chart.render();

var growthoptions = {
  series: [{
      name: 'Growth',
      data: [0, 14, 5, 20, 14, 30]
  }],
  chart: {
      height: 120,
      type: 'line',
      stacked: true,
      offsetY: 40,
      toolbar: {
          show: false
      },
  },
  grid: {
      show: false,
      borderColor: '#000000',
      strokeDashArray: 0,
      position: 'back',
      xaxis: {
          lines: {
              show: false,
          },
      },
      yaxis: {
          lines: {
              show: true,
          },
      },
  },

  colors: [dunzoAdminConfig.primary],
  stroke: {
      width: 3,
      curve: 'smooth'
  },
  xaxis: {
    labels: {
        show: false
    },
  },
  yaxis: {
      min: -10,
      max: 40,
      labels: {
          show: false
      }
  },
  markers: {
    discrete: [{
      seriesIndex: 0,
      dataPointIndex: 0,
      fillColor: dunzoAdminConfig.primary,
      strokeColor: dunzoAdminConfig.primary,
      size: 4,
      shape: "circle"
    },
    {
      seriesIndex: 0,
      dataPointIndex: 1,
      fillColor: dunzoAdminConfig.primary,
      strokeColor: dunzoAdminConfig.primary,
      size: 4,
      shape: "circle"
    },
    {
      seriesIndex: 0,
      dataPointIndex: 2,
      fillColor: dunzoAdminConfig.primary,
      strokeColor: dunzoAdminConfig.primary,
      size: 4,
      shape: "circle"
    },
    {
      seriesIndex: 0,
      dataPointIndex: 3,
      fillColor: dunzoAdminConfig.primary,
      strokeColor: dunzoAdminConfig.primary,
      size: 4,
      shape: "circle"
    },
    {
      seriesIndex: 0,
      dataPointIndex: 4,
      fillColor: dunzoAdminConfig.primary,
      strokeColor: dunzoAdminConfig.primary,
      size: 4,
      shape: "circle"
    },
    {
      seriesIndex: 0,
      dataPointIndex: 5,
      fillColor: "#fff",
      strokeColor: dunzoAdminConfig.primary,
      size: 5,
      shape: "circle"
    },
    ],
  },
};

var growthchart = new ApexCharts(document.querySelector("#monthlychart-1"), growthoptions);
growthchart.render();

var expensesOption = {
  series: [
    {
      name: 'series2',
      data: [15, 25, 20, 35, 60, 30, 20, 30, 20, 35, 25, 20],
    },
  ],
  colors: [ "var(--theme-default)" , "#FFA941"],
  chart: {
    height: 95,
    type: 'bar',
    sparkline: {
      enabled: true,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth',
  },
  plotOptions: {
    bar: {
      borderRadius: 3,
      distributed: true,
      columnWidth: "50%",
      barHeight: '38%',
      dataLabels: {
        position: 'top',
      },
    }
  },
  responsive: [
    {
      breakpoint: 1700,
      options: {
        chart: {
          height: 86,
        },
      },
    },
    {
      breakpoint: 1699,
      options: {
        chart: {
          height: 95,
        },
      },
    },
    {
      breakpoint: 1460,
      options: {
        grid: {
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 5,
          },
        },
      },
    },
    {
      breakpoint: 376,
      options: {
        chart: {
          height: 50,
        },
      },
    },
  ],
};
var expensesEl = new ApexCharts(document.querySelector('#income-chart-1'), expensesOption);
expensesEl.render();

var options = {
  series: [{
    name: "Desktops",
    data: [ 50, 50, 50, 25, 25, 25, 2, 2, 2, 25, 25, 25, 62, 62, 62, 35, 35, 35, 66, 66],
}],
  chart: {
  height: 100,
  type: 'area',
  zoom: {
    enabled: false
  },
  toolbar: {
    show: false,
  }, 
  dropShadow: {
    enabled: true,
    top: 5,
    left: 0,
    bottom: 3,
    blur: 2,
    color: dunzoAdminConfig.primary,
    opacity: 0.2,
  },
},
fill: {
  type: "gradient",
  gradient: {
    shadeIntensity: 1,
    opacityFrom: 0.5,
    opacityTo: 0.1,
    stops: [0, 90, 100]
  }
},
tooltip: {
  enabled: false
},
dataLabels: {
  enabled: false
},
grid: {
  show: false,
},
  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  stroke: {
    curve: 'straight',
    width: 2,
  },
  markers: {
    discrete: [{
      seriesIndex: 0,
      dataPointIndex: 12,
      fillColor: dunzoAdminConfig.primary,
      strokeColor:'#fff',
      size: 5,
      shape: "circle"
    }],
  }
};
var chart = new ApexCharts(document.querySelector("#expense-chart-1"), options);
chart.render();

var optionssalessummary = {
  series: [
    {
      name: "Activity",
      data: [42, 44, 55, 66, 55, 86, 52, 44, 44, 66, 55, 86, 52, 44, 44],
    },
  ],
  chart: {
    height: 130,
    type: "bar",
    toolbar: {
      show: false,
    },
    sparkline: {
      enabled: true,
    },
  },
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 3,
      columnWidth: "40%",
    },
  },
  dataLabels: {
    enabled: false,
  },
  grid: {
    show: false,
  },
  xaxis: {
    labels: {
        show: false
    },
  },
  legend: {
    show: false,
  },
  yaxis: {
    labels: {
        show: false
    },
  },
  colors: ['#d6e5fd', '#d6e5fd', '#d6e5fd', '#d6e5fd', '#d6e5fd', dunzoAdminConfig.primary, '#d6e5fd', '#d6e5fd', '#d6e5fd', '#d6e5fd', '#d6e5fd' , '#d6e5fd' , '#d6e5fd' , '#d6e5fd' , '#d6e5fd'],
};
var chartasalessummary = new ApexCharts(
  document.querySelector("#online-chart-1"),
  optionssalessummary
);
chartasalessummary.render();

var options = {
  series: [{
    name: "Desktops",
    data: [ 50, 50, 50, 25, 25, 25, 2, 2, 2, 25, 25, 25, 62, 62, 62, 35, 35, 35, 66, 66],
}],
  chart: {
  type: 'area',
  offsetY: 30,
  height: 172,
  zoom: {
    enabled: false
  },
  toolbar: {
    show: false,
  }, 
  dropShadow: {
    enabled: true,
    top: 5,
    left: 0,
    bottom: 3,
    blur: 2,
    color: dunzoAdminConfig.secondary,
    opacity: 0.2,
  },
},
colors: [dunzoAdminConfig.secondary],
fill: {
  type: "gradient",
  gradient: {
    shadeIntensity: 1,
    opacityFrom: 0.5,
    opacityTo: 0.1,
    stops: [0, 90, 100]
  }
},
dataLabels: {
  enabled: false
},
grid: {
  show: false,
},
  xaxis: {
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  stroke: {
    curve: 'straight',
    width: 2,
  },
  markers: {
    discrete: [{
      seriesIndex: 0,
      dataPointIndex: 12,
      fillColor: dunzoAdminConfig.secondary,
      strokeColor:'#fff',
      size: 5,
      shape: "circle"
    }],
  },
  responsive: [{
    breakpoint: 1661,
    options: {
        chart: {
            height: 140
        },
    },
  }
],
};
var chart = new ApexCharts(document.querySelector("#offline-chart-1"), options);
chart.render();