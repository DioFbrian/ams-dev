// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function() {
  $('#dataTableLaptop').DataTable({
    "order": [[ 0, "asc" ]],
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    "pageLength": 10
  } );
} );

$(document).ready(function() {
  $('#dataTableCard').DataTable({
    "order": [[ 0, "asc" ]],
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    "pageLength": 10
  } );
} );

$(document).ready(function() {
  $('#dataTableEmail').DataTable({
    "order": [[ 0, "asc" ]],
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    "pageLength": 10
  } );
} );