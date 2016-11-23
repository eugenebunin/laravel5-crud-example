@extends('layouts.app')

@section('content')
	<div class="container" ng-app="Crud" ng-controller="PageController">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Page
				</div>

				<div class="panel-body">
					
					<!-- New Page Form -->
					<form method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Page Name -->
						<div class="form-group">
							<label for="page-name" class="col-sm-3 control-label">Name</label>

							<div class="col-sm-6">
								<input type="text" ng-model="form.page.name" class="form-control">
							</div>
						</div>

						<!-- Add Page Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button ng-click="create()" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Page
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Pages -->

				<div class="panel panel-default" ng-init="index()">
					<div class="panel-heading">
						Current Pages
					</div>

					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<th>&nbsp;</th>
								<th>Name</th>
								<th>Slug</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>

									<tr ng-repeat="page in pages">
										<td>
												<a href="/pages/edit/@{{page.id}}" class="btn btn-default">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
										</td>
										<td class="table-text">@{{page.name}}</td>
										<td class="table-text"><div>@{{page.slug}}</div></td>
										<!-- Page Delete Button -->
										<td>
											<form method="POST">
												<button ng-click="delete(page.id)" class="btn btn-danger">
													<i class="glyphicon glyphicon-trash"></i>
												</button>
											</form>
										</td>
									</tr>

							</tbody>
						</table>
					</div>
				</div>

		</div>
	</div>
@endsection
