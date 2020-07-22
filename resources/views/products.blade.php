@extends('layouts.app')

@section('custom_header')
	  <!-- DataTables -->
	  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="app-content content">
    <div class="content-header bg-white">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 h-100 my-auto">
                    <h3 class="content-header-title mb-0">Inventario</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Inventario
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-right">
                        <a class="btn btn-float btn-outline-success" href="{{ route('addProduct') }}">
                            <i class="fa fa-plus-circle fa-2x"></i>
                            <span>Nuevo producto</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="content-wrapper">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Inventario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table" id="items">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Codigo</th>
                                <th>Nombre del producto</th>
                                <th>Precios</th>
                                <th>Cantidad</th>
                                <th>Categoria</th>
                                <th>Fabricante</th>
                                <th>Estado</th>
                                <th style="width:15%;" class="text-right">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<!-------------------------------------Remove Product ------------------------------------------->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Eliminar producto</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('deleteProduct')}}" method="POST">
					@method('delete')
					@csrf
					<p id="message">¿Realmente deseas eliminar el producto? Se movera a la palera</p>
					<input type="hidden" id="id_product">
				<div class="modal-footer removeProductFooter">
					<button type="button" class="btn btn-default" data-dismiss="modal"> <i
							class="glyphicon glyphicon-remove-sign"></i> Cancelar</button>
					<button type="submit" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i
							class="glyphicon glyphicon-ok-sign"></i> Eliminar</button>
				</div>
				</form>
			</div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection


@section('custom_footer')
    <!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
	$(document).ready(function () {
	    $('#items').DataTable({
	        "serverSide": true,
	        "ajax": "{{ url('api/products') }}",
	        "columns": [
				{
	                data: 'photo'
	            },
			    {
	                data: 'code'
	            },
	            {
	                data: 'name'
	            },
	            {
	                data: 'prices'
	            },
	            {
	                data: 'stock'
	            },
	            {
	                data: 'name_category'
				},
				{
	                data: 'name_supplier'
				},
				{
	                data: 'is_available'
	            },
	            {
					"searchable" : false,
	               data: 'actions'
	            },
	        ]
	    })
	});
</script>

<script>
$(document).on('click','#removeProductModalBtn',function(){
    var id=$(this).attr('data-id');
    $('#id_product').val(id); 
    $('#removeProductModal').modal('show'); 
});
</script>

@endsection