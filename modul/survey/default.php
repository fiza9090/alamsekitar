<link rel="stylesheet" href="js/DataTables/datatables.min.css" >
<link rel="stylesheet" href="css/components.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/dataTables4.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>


<style>
	td.border-green {
		border-left: 7px solid #0c6;
	}
	ol.ol-none {
		list-style-type: none;
		margin: 0 0 0.5rem 0;
	}
	.form-group {
		margin-bottom: 0.2rem;
	}
	.btn-group.btn-group-toggle.is-invalid {
    	outline: 1px solid red;
	}
	.nav-link.my {
		padding: .3rem 1rem
	}
    .box {
        background: none repeat scroll 0 0 #F0FFFF;
        display: block;
        padding: 1.25em;
        width: 100%;
    }
    .sticky-top {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1020;
    }
    .bg-white {
        background-color: #fff!important;
    }
    .justify-content-between {
        -ms-flex-pack: justify!important;
        justify-content: space-between!important;
    }
    .btn-toolbar {
        display: flex;
        margin-left: -5px;
        flex-wrap: wrap;
    }

	@media (min-width: 992px) {
		.modal-lg {
			width: 1090px;
		}
	}
</style>
<div class="container">
<div class="row" style="padding-top: 60px;">
    <div class="col-md-12">
        <div id="tabs_panel" class="line" style="display: none">
            <ul class="nav nav-tabs" id="MyTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link my active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my" id="individu-tab" data-toggle="tab" href="#individu" role="tab" aria-controls="individu" aria-selected="false">Individu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my" id="action-tab" data-toggle="tab" href="#action" role="tab" aria-controls="action" aria-selected="false">Action</a>
                </li>
            </ul>
        </div>
        <div class="line">
            <div class="loader"></div>
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div id="mainframe" class="box">
                        <div class="btn-toolbar sticky-top bg-white hidden-print" role="toolbar" aria-label="Toolbar with button group">
                            <div class="btn-group btn-group-sm">
                                <!--<button type="button" id="toolbars-new" class="btn btn-danger"<?= ($jpNegeri=='hq')?' disabled':'' ?>>+ Tambah Kes</button>-->
                                <button type="button" id="toolbars-save" class="btn btn-default" style="display: none;">Simpan</button>
                                <button type="button" id="toolbars-edit" class="btn btn-default" style="display: none;">Sunting</button>
                                <button type="button" id="toolbars-delete" class="btn btn-default" style="display: none;">Padam</button>
                            </div>
                            <div class="input-group input-group-sm">
                                <input type="text" id="toolbars-carian" class="form-control" placeholder="Carian" aria-label="Carian" aria-describedby="btnGroupAddon2" style="height:auto;margin:0;outline:0">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm" type="button" id="button-carian">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12">
                            <table id="pengenalan" class="display compact" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>No Siri Pertubuhan</th>
                                        <th class="text-center">Nama Syarikat</th>
                                        <th class="text-center">Kod Negeri</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>No HID</th>
                                        <th class="text-center">Nama Syarikat</th>
                                        <th>Kod Negeri</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="individu" role="tabpanel" aria-labelledby="individu-tab">
                    <h1>Individu Panel</h1>
                </div>            
                <div class="tab-pane" id="action" role="tabpanel" aria-labelledby="action-tab">
                    <h1>Action Panel</h1>
                </div>
            </div>
        </div>
        <div id="modal-action" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h6 class="modal-title">Title</h6>
                    </div>				
                    <div class="modal-body text-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>				
                    </div>
                </div>
            </div>
        </div>
        <template id="loader">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h6 class="modal-title">Title</h6>
                    </div>				
                    <div class="modal-body text-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>				
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
</div>
<script>
	var $loader;
	var $form;
$.fn.dataTable.pipeline = function ( opts ) {
	var conf = $.extend( {
		pages: 5,     // number of pages to cache
		url: '',      // script url
		data: null,   // function or object with parameters to send to the server
		              // matching how `ajax.data` works in DataTables
		method: 'GET' // Ajax HTTP method
	}, opts );

	var cacheLower = -1;
	var cacheUpper = null;
	var cacheLastRequest = null;
	var cacheLastJson = null;

	return function ( request, drawCallback, settings ) {
		var ajax          = false;
		var requestStart  = request.start;
		var drawStart     = request.start;
		var requestLength = request.length;
		var requestEnd    = requestStart + requestLength;
		
		if ( settings.clearCache ) {
			ajax = true;
			settings.clearCache = false;
		}
		else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
			ajax = true;
		}
		else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
		          JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
		          JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
		) {
			ajax = true;
		}
		
		cacheLastRequest = $.extend( true, {}, request );

		if ( ajax ) {
			if ( requestStart < cacheLower ) {
				requestStart = requestStart - (requestLength*(conf.pages-1));

				if ( requestStart < 0 ) {
					requestStart = 0;
				}
			}
			
			cacheLower = requestStart;
			cacheUpper = requestStart + (requestLength * conf.pages);

			request.start = requestStart;
			request.length = requestLength*conf.pages;

			if ( typeof conf.data === 'function' ) {
				var d = conf.data( request );
				if ( d ) {
					$.extend( request, d );
				}
			}
			else if ( $.isPlainObject( conf.data ) ) {
				$.extend( request, conf.data );
			}

			settings.jqXHR = $.ajax( {
				"type":     conf.method,
				"url":      conf.url,
				"data":     request,
				"dataType": "json",
				"cache":    false,
				"success":  function ( json ) {
					cacheLastJson = $.extend(true, {}, json);

					if ( cacheLower != drawStart ) {
						json.data.splice( 0, drawStart-cacheLower );
					}
					if ( requestLength >= -1 ) {
						json.data.splice( requestLength, json.data.length );
					}
					
					drawCallback( json );
				}
			} );
		}
		else {
			json = $.extend( true, {}, cacheLastJson );
			json.draw = request.draw; // Update the echo for each response
			json.data.splice( 0, requestStart-cacheLower );
			json.data.splice( requestLength, json.data.length );

			drawCallback(json);
		}
	}
};

$.fn.dataTable.Api.register( 'clearPipeline()', function () {
	return this.iterator( 'table', function ( settings ) {
		settings.clearCache = true;
	} );
} );

//ini ada lah variable yg akan pegang Object DataTable
//saya boleh panggil variable table ni pada console di browser.
//#pengenalan tu id bagi table kat atas.
table = $('#pengenalan').DataTable( {
	"processing": true,
	"serverSide": true,
	"iDisplayLength": 20,
	"dom": '<"top">rt<"bottom"lip><"clear">',
	"ajax": $.fn.dataTable.pipeline( {
		url: 'modul/survey/default.data.php',
		pages: 5 // number of pages to cache
	}),
	columns: [
		{
			"data": null, "defaultContent": "", "orderable": false, "searchable": false,
			"render": function(data, type, row, meta){
				return meta.row+1;
			},
			"width": "20px"
		},
		{"data": 0, "defaultContent":"", "orderable":false},
		{"data": 1, "defaultContent":"", "orderable":false,},
		{"data": 2, "orderable": false},
		{"data": 3, "orderable": false, "className": "text-center"},
		{"data": 4, "orderable": false, "className": "text-center"},
		{
			"data": null, "orderable": false, "searchable":false, 
			"render": function(data, type, row, meta){
				var button = [];
				button.push(
					'<button id="detail-home" type="button" class="btn btn-sm btn-outline-success detail" '+
					'title="Kemaskini Maklumat Syarikat"><i class="icon-home text-warning"></i></button>'
				);
				
				button.push(
					'<button id="detail-individu" type="button" class="btn btn-sm btn-outline-primary detail" '+
					'title="Butiran Suku Tahun Syarikat"><i class="icon-users text-dark"></i></button>'
					
				);
				
				return button.join(" ");
			}
		}
	]
} );

$('#pengenalan tbody').on( 'click', 'button', function () {
	//console.log(this);
	$tr = $(this).parents('tr');
	if(!$($tr).hasClass('selected')){
		table.$('tr.selected').removeClass('selected');
		$($tr).addClass('selected');
	}

	$data = table.row( $tr ).data();

	switch (this.id) {
		case "detail-home":
			console.log($data);
			//var d = $indi.row(this).data();
			view = $("#modal-action")
				.modal({backdrop:"static"})
				.on("hidden.bs.modal", function(e){
					$("#modal-action").html($loader);
					table.clearPipeline().draw();
					$('#modal-action').off("hidden.bs.modal");				
				});
			
			view.find(".modal-content").load("moduls.php?load=survey/profile", {"id":$data[0]}, function(response, status, xhr){
				//console.log(response);
			});				
			break;
		case "detail-individu":
			//Open panel individu
			$('#individu').load("moduls.php?load=survey/setmonth", {"id":$data[0]}, function(response, status, xhr){
				//console.log(response);
			});
			$('#MyTab a[href="#individu"]').tab('show');
			break;
		case "detail-individu1":
			console.log($data);
			//var d = $indi.row(this).data();
			view = $("#modal-action")
				.modal({backdrop:"static"})
				.on("hidden.bs.modal", function(e){
					$("#modal-action").html($loader);
					table.clearPipeline().draw();
					$('#modal-action').off("hidden.bs.modal");				
				});
			
			view.find(".modal-content").load("moduls.php?load=survey/setmonth", {"id":$data[0]}, function(response, status, xhr){
				//console.log(response);
			});		
			break;

	}
});

$('#button-carian').on( 'click', function () {
	table.search( 
		$('#toolbars-carian').val(),
		false, true
	).draw();
});

$(document).ready(function() {
    $("#MyTab").tab()    
	$loader = $('#loader').html();
} );
</script>