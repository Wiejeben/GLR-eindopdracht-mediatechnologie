<div class="container_12">
	<table border="1" class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Aanmaakdatum</th>
			</tr>
		</thead>
		<tbody>
			<a href="{{ url('admin/blog/create') }}">Toevoegen</a>
			<?php foreach($blogs as $blog):?>
				<?php if(Session::has('alert')):?>
					<div class="alert alert-danger">
						{{ Session::flash('alert') }}
					</div>
				<?php endif;?>

				<?php if(Session::has('success')):?>
					<div class="alert alert-success">
						{{ Session::flash('success') }}
					</div>
				<?php endif;?>
				<tr>
					<td>{{ $blog->id }}</td>
					<td>{{ $blog->title }}</td>
					<td>{{ date('H:i d-m-Y', strtotime($blog->created_at)) }}</td>
					<td><a href="{{ url('admin/blog/' . $blog->id . '/edit') }}">Wijzigen</a> | <a href="{{ url('admin/blog/' . $blog->id . '/destroy') }}" class="confirm">Verwijderen</a></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>