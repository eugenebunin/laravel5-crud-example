@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Page
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Page Form -->
					<form action="/pages" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Page Name -->
						<div class="form-group">
							<label for="page-name" class="col-sm-3 control-label">Name</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="page-name" class="form-control" value="{{ old('page') }}">
							</div>
						</div>

						<!-- Add Page Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Page
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Pages -->
			@if (count($pages) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Pages
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Name</th>
								<th>Slug</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($pages as $page)
									<tr>
										<td class="table-text"><div>{{ $page->name }}</div></td>
										<td class="table-text"><div>{{ $page->slug }}</div></td>
										<!-- Page Delete Button -->
										<td>
											<form action="/pages/{{ $page->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-page-{{ $page->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
