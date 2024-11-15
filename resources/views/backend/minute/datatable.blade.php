$(document).ready(function () {

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
                dtParams.date_from = $('input[name="date_from"]').val();
                dtParams.date_to = $('input[name="date_to"]').val();
                return dtParams;
            }
        },
		language: {
            {{-- Uncomment this line to use Indonesian language --}}
            {{--url: "{{ asset(config('master.app.web.assets').'/assets/vendor_components/datatable/indonesian.json') }}"--}}
        },
		columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false, orderable: false, className: 'text-center' },
            { data: 'title', 'defaultContent':'', searchable: false},
			{ data: 'content', 'defaultContent': '', searchable: true, visible: true},
			{ data: 'active' , 'defaultContent':'', searchable: false, visible: false},
			{ data: 'article_created_at' , 'defaultContent':'', searchable: true},
			{ data: 'action', orderable: false, searchable: false , className: 'text-center'}
		],
        dom: 'lBfrtip',
        buttons: [
        ]
	});

    // Custom filter by date range on field 'article_created_at'
    $('#date_from').on("change", function() {
        table.column(4).search($('#date_from').val()).draw();
    });

    $('#date_to').on("change", function() {
        table.column(4).search($('#date_from').val()).draw();
    });

    table.on('draw', function () {
        var body = $(table.table().body());
        const textSearch = table.search().trim();

        if (textSearch.length) {
            body.unhighlight();
            const terms = textSearch.split(" ");

            terms.forEach(function (word) {
                body.highlight(word);
            });
        }
    });
})
