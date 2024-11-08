$(document).ready(function() {

  //Local Datatable JS
  $('#basicdata-tbl').DataTable({
    "scrollX": true,
  });

  $('#basicdata-tbl1').DataTable({
    "scrollX": true,
  });

  $('#basicdata-tbl2').DataTable({
    "scrollX": true,
    "order": [[4, "asc"]],
    "columnDefs": [
      {"orderable" : true, "targets": 4}
    ]
  });


  //Advance Datatable
  $('#datatbl-advance').DataTable({    
    "scrollX": true,    
    stateSave: false,
    dom: 'Bfrtip',    
    buttons: [
      'print','excel','pdf', 'csv', 'copy',
    ] 
  });

  //Ajax Datatable JS
  $('#datatbl-ajax').DataTable( {
    "scrollX": true,  
    "ajax": '../assets/js/vendors/datatable/ajax-data/datatable-ajax.txt',
    scrollCollapse: true,
  });
  
});