$(function() {

    // line chart
    var spline = [10,8,5,7,4,4,1];
    $('.splinechart').sparkline(spline, 
      {
        type: 'line', 
        width: '100%', 
        height: '300', 
        lineWidth: 3, 
        lineColor: [CodexRohi.themeprimary], 
        fillColor: 'rgba(242,163,20,0)', 
        highlightSpotColor: '', 
        highlightLineColor: '', 
        spotRadius: 1,                 
      } ,           
    );


    // area chart
    var sparea = [10,8,5,7,4,4,1];
    $('.spareachart').sparkline(sparea, 
      {
        type: 'line', 
        width: '100%', 
        height: '300', 
        lineWidth: 0, 
        lineColor: [CodexRohi.themeprimary],
        fillColor: [CodexRohi.themeprimary], 
        highlightSpotColor: '', 
        highlightLineColor: '', 
        spotRadius: 1,                 
      }       
    );


    // line area chart
    var splinearea = [10,8,5,7,4,4,1];
    $('.splineareachart').sparkline(splinearea, 
      {
        type: 'line', 
        width: '100%', 
        height: '300', 
        lineWidth: 3, 
        lineColor: [CodexRohi.themeprimary], 
        fillColor: 'rgba(8, 155, 171, 0.5)', 
        highlightSpotColor: '', 
        highlightLineColor: '', 
        spotRadius: 1,                 
      }       
    );


    // line area chart
    var sprange = [10,8,5,7,4,4,1];
    $('.sprangechart').sparkline(sprange, 
      {
        type: 'line', 
        width: '100%', 
        height: '300', 
        lineWidth: 3, 
        lineColor: [CodexRohi.themeprimary],
        fillColor: 'rgba(8, 155, 171, 0.5)', 
        spotColor: [CodexRohi.themeprimary],
        spotRadius:5,
        valueSpots:300,
        highlightSpotColor:'#ff5e5d',
        highlightLineColor:'',     
        normalRangeMin:1,
        normalRangeMax:5,       
        chartRangeClip:50,
      }       
    );


    // bar chart
    var spbarchart = [30,28,25,20,18,15,17,14,14,11,20,25,30,11,20];
    $('.spbarchart').sparkline(spbarchart,{
      type: 'bar' ,
      width: '100%',
      height: '300',
      barWidth: '35%', 
      barSpacing: 10,
      barColor: [CodexRohi.themeprimary],     
   });


  // bar chart
  var spstackedchart = [ [4, 6, 8], [8, 6, 4], [3, 4, 5], [10,8, 9], [10, 11, 12], [8, 10, 12], [15, 18, 20], [15, 10, 05], [20, 25, 30], [15, 20, 30], [28, 22, 30], [10, 15, 20], [20, 25, 30], [18, 22, 26]];
  $('.spstackedchart').sparkline(spstackedchart,{
      type: 'bar' ,
      width: '100%',
      height: '300',
      barWidth: '35%', 
      barSpacing: 10,     
      stackedBarColor:[CodexRohi.themeprimary,CodexRohi.themesecondary,CodexRohi.themesuccess],
   });

  // negetiv chart
  var spnegbarchart = [4,10,8,-5,3,-15,10,20,25,-12,-15,-10,15];
  $('.spnegbarchart').sparkline(spnegbarchart,{
      type: 'bar' ,
      width: '100%',
      height: '300',
      barWidth: '35%', 
      barSpacing: 10,     
      barColor: [CodexRohi.themeprimary],
      negBarColor:[CodexRohi.themesecondary],
       
   });
   
  // Tristate
  var sptristaterchart = [30,-28,-25,20,-18,15,17,-14,14,11,-20,25,-30,11,-20];
  $('.sptristaterchart').sparkline(sptristaterchart,{
      type: 'tristate' ,
      width: '100%',
      height: '300',
      barWidth: '35%',
      barSpacing: 10,          
      posBarColor:[CodexRohi.themeprimary],
      negBarColor:[CodexRohi.themesuccess],
      zeroBarColor:[CodexRohi.themesecondary],
   });

  
  // Pie  chart
  var sppiechart = [8,5,7,10,5];
  $('.sppiechart').sparkline(sppiechart, 
    {
      type: 'pie', 
      width: '100%', 
      height: '300', 
      lineColor: [CodexRohi.themeprimary],     
      sliceColors:[CodexRohi.themeprimary,CodexRohi.themesecondary,CodexRohi.themesuccess,CodexRohi.themewarning,CodexRohi.themeinfo],
      borderWidth: 5,
      borderColor:'red',
    } ,           
  );


  // Box Plots Chart
  var spboxplots = [10,8,5,7,4,4,1];
  $('.spboxplotschart').sparkline(spboxplots, 
    {
      type: 'box', 
      width: '100%', 
      height: '300', 
      lineWidth: 3, 
      lineColor: [CodexRohi.themeprimary], 
      fillColor: 'rgba(242,163,20,0)', 
      highlightSpotColor: '', 
      highlightLineColor: '', 
      spotRadius: 1,                 
    } ,           
  );


  // Box Plots Chart
  var spline = [10,8,5,7,4,4,1];
  $('.splinechart').sparkline(spline, 
    {
      type: 'line', 
      width: '100%', 
      height: '300', 
      // lineWidth: 3, 
      // lineColor: [CodexRohi.themeprimary], 
      // fillColor: 'rgba(242,163,20,0)', 
      // highlightSpotColor: '', 
      // highlightLineColor: '',
      // spotRadius: 1,
    } ,           
  );

});