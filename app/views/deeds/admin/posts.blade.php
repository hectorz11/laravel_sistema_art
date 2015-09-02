
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Notario</th>
						<th>Nro. de E. Pública</th>
						<th>Protocolo</th>
						<th>Folio</th>
						<th>Otorgado por</th>
						<th>A favor</th>
						<th>Operaciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($deeds as $deed)
					<tr>
						<td>{{ $deed->name }}</td>
						<td>{{ $deed->number_deeds }}</td>
						<td>{{ $deed->protocol }}</td>
						<td>{{ $deed->folio }}</td>
						<td>{{ $deed->given_by }}</td>
						<td>{{ $deed->pro }}</td>
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div>{{ $deeds->links() }}</div>