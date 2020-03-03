
<script src="{{asset('asset/back/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('asset/back/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('asset/back/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/back/js/modernizr.min.js')}}"></script>
<script src="{{asset('asset/back/js/pace.min.js')}}"></script>
<script src="{{asset('asset/back/js/retina.min.js')}}"></script>
<script src="{{asset('asset/back/js/jquery.cookies.js')}}"></script>
<script src="{{asset('asset/back/js/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('asset/back/js/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('asset/back/js/flot/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('asset/back/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('asset/back/js/morris.min.js')}}"></script>
<script src="{{asset('asset/back/js/raphael-2.1.0.min.js')}}"></script>
<script src="{{asset('asset/back/js/bootstrap-wizard.min.js')}}"></script>
<script src="{{asset('asset/back/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/back/js/select2.min.js')}}"></script>
<script src="{{asset('asset/back/js/custom.js')}}"></script>
<script src="{{asset('asset/back/js/holder.js')}}"></script>
<script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="//cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
<script>
	jQuery(document).ready(function(){
		jQuery('#basicTable').DataTable({
			responsive: true
		});
		var shTable = jQuery('#shTable').DataTable({
			"fnDrawCallback": function(oSettings) {
				jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
			},
			responsive: true
		});
		// Show/Hide Columns Dropdown
		jQuery('#shCol').click(function(event){
			event.stopPropagation();
		});
		jQuery('#shCol input').on('click', function() {
			// Get the column API object
			var column = shTable.column($(this).val());
			// Toggle the visibility
			if ($(this).is(':checked'))
			column.visible(true);
			else
			column.visible(false);
		});
		var exRowTable = jQuery('#exRowTable').DataTable({
			responsive: true,
			"fnDrawCallback": function(oSettings) {
				jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
			},
			"ajax": "ajax/objects.txt",
			"columns": [
			{
				"class":          'details-control',
				"orderable":      false,
				"data":           null,
				"defaultContent": ''
			},
			{ "data": "name" },
			{ "data": "position" },
			{ "data": "office" },
			{ "data": "salary" }
			],
			"order": [[1, 'asc']] 
		});
		// Add event listener for opening and closing details
		jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = exRowTable.row( tr );
			if ( row.child.isShown() ) {
				// This row is already open - close it
				row.child.hide();
				tr.removeClass('shown');
			}
			else {
				// Open this row
				row.child( format(row.data()) ).show();
				tr.addClass('shown');
			}
		});
		// DataTables Length to Select2
		jQuery('div.dataTables_length select').removeClass('form-control input-sm');
		jQuery('div.dataTables_length select').css({width: '60px'});
		jQuery('div.dataTables_length select').select2({
			minimumResultsForSearch: -1
		});
	});
	function format (d) {
		// `d` is the original data object for the row
		return '<table class="table table-bordered nomargin">'+
		'<tr>'+
		'<td>Full name:</td>'+
		'<td>'+d.name+'</td>'+
		'</tr>'+
		'<tr>'+
		'<td>Extension number:</td>'+
		'<td>'+d.extn+'</td>'+
		'</tr>'+
		'<tr>'+
		'<td>Extra info:</td>'+
		'<td>And any further details here (images etc)...</td>'+
		'</tr>'+
		'</table>';
	}
</script>
<script>
    $(document).ready(function(){
        setTimeout(function () {
            $('#message').slideUp(500);
        },5000);
    });
</script>

</body>
</html>
<script>
		