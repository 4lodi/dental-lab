@extends('layout.main')

@section('content')

@guest
  <p><b>para ver el contenido <a href="/login">inicia sesion</a></b></p>
@endguest

@auth
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>

@endsection
         <h1>Hola Mundo autentiuficado</h1>
	

	<div class="card">
	<div class="card-header card-header-info">
		<h4 class="card-title" align="center"><i class="material-icons">find_in_page</i>&nbsp;Buscar Cliente</h4>
	</div>
	<div class="card-body">
		<div class="container col-md-12">
			<div class="row">
				<div class="col-sm-12 table-responsive-sm" style="text-align:center;">

					<table id="clients-table" class="table table-bordered table-hover" style="width: 100%;">
						<thead>
							<tr class="card-header-info">
								<th>N° de Trabajo</th>
								<th>Cliente</th>
								<th>Detalle</th>
								<th>Centro medico</th>
								<th>Dr</th>
								<th>Trabajo a arealizar</th>
								<th>Estado del trabajo</th>
								<th>Fecha de Inicio</th>
								<th>Fecha de Termino</th>
								<th>Hora de entrega</th>
								<th>Arancel</th>
								<th>Editar o Eliminar</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
         

@section('scripts')
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js"></script>

<script>


const table = $('#clients-table').DataTable({
		processing: true,
		serverSide:true,
		responsive:true,
		autoWidth: false,
		language: {
					url: '{{asset("js/datatablesEs/es_es.json")}}'
				},
				ajax: {
                url: "{{route('dataClients')}}",
            },
		dataType:'json',
		type:'POST',
		columns:[{
			data:'id',
			name:'id'
		},
		{
			data:'clients',
			name:'clients'
		},
		{
			data:'details',
			name:'details'
		},
		{
			data:'medicalcenter.name',
			name:'medicalcenter.name'
		},
		{
			data:'doctor.name',
			name:'doctor.name'
		},
		{
			data:'typeworks.name',
			name:'typeworks.name'
		},
		{
			data:'status.name',
			name:'status.name'
		},
		{
			data:'start_work',
			name:'start_work'
		},
		{
			data:'finish_work',
			name:'finish_work'
		},
		{
			data:'time_work',
			name:'time_work'
		},
		{
			data:'price',
			name:'price'
		},
		{
			data:'actions',
			name:'actions'
		},
		
		],

		columnDefs: [
					{
						searchable: false,
						targets: [2, 9, 10]
					}
		],
		order: [
				[0, "desc"]
		],
		pageLength: 10,
		lengthMenu: [
			[10, 25, 50, -1],
			[10, 25, 50, "Todos"]
		],
		dom: 'lBfrtip',
		buttons: {
					dom: {
						button: {
							className: 'btn'
						}
					},
				},
				buttons: [{
						extend: 'excel',
						text: "Exportar a Excel",
						className: "btn btn-success",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10],
						
						}

					},				
					{
						extend: 'print',
						text: "Imprimir",
						className: "btn btn-warning",
						exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10],
							orientation: "landscape",
						}
					},
					{
						extend: 'pdf',
						className: 'btn-danger',
						text: 'PDF',
						exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10],
							orientation: "landscape",
						}
					},
				],				
	});
</script>
@endsection
@endauth
@endsection