$(document).ready(function () {

    let minDate, maxDate;
 
    // Custom filtering function which will search data in column four between two values
    DataTable.ext.search.push(function (settings, data, dataIndex) {
        let min = minDate.val();
        let max = maxDate.val();
        let date = new Date(data[4]);
    
        if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
        ) {
            return true;
        }
        return false;
    });
    
    // Create date inputs
    minDate = new DateTime('#date_from', {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime('#date_to', {
        format: 'MMMM Do YYYY'
    });

    table = $('#datatable').DataTable({
        searchDelay: 1000,
		responsive: true,
		lengthChange: true,
        searching: true,
		processing: true,
		serverSide: true,
        lengthMenu: [[10, 25, 50, 100 ,200 , 500, -1], [10, 25, 50, 100 ,200 , 500, "All"]],
		ajax: {
            url: "{{ url(config('master.app.url.backend').'/'.$url.'/data') }}",
            data: function (dtParams) {
                dtParams.minDate = $('input[name="date_from"]').val();
                dtParams.maxDate = $('input[name="date_to"]').val();
                return dtParams;
            }
        },
		language: {
            {{-- Uncomment this line to use Indonesian language --}}
            {{--url: "{{ asset(config('master.app.web.assets').'/assets/vendor_components/datatable/indonesian.json') }}"--}}
        },
		columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false, orderable: false, className: 'text-center' },
            { data: 'title' , 'defaultContent':'', searchable: false},
			{ data: 'content' , 'defaultContent':'', searchable: true, visible: false},
			{ data: 'active' , 'defaultContent':'', searchable: false, visible: false},
			{ data: 'article_created_at' , 'defaultContent':'', searchable: false},
			{ data: 'action', orderable: false, searchable: false , className: 'text-center'}
		],
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'csv',
                text: 'CSV',
                className: 'btn btn-success btn-xs ms-10',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn btn-info btn-xs',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-warning btn-xs',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-danger btn-xs me-10',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
	});

    // Refilter the table
    document.querySelectorAll('#date_from, #date_to').forEach((el) => {
        el.addEventListener('change', () => table.draw());
    });
})
