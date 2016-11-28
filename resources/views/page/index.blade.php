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
					{!! BootForm::customOpen() !!}

						<!-- Page Name -->
						<div class="form-group">
							<label for="page-name" class="col-sm-2 control-label">Name</label>

							<div class="col-sm-6">
								{!! BootForm::customText('Page name', 'name')->attribute('ng-model', 'form.page.name')->attribute('placeholder', 'Enter page name') !!}
								<!--<input type="text" ng-model="form.page.name" class="form-control">-->
							</div>
						</div>

						<!-- Add Page Button -->
						<div class="form-group">
							<div class="col-sm-offset- col-sm-6">
								{!! BootForm::submit('Create new page')->attribute('ng-click', 'create($event)') !!}
							</div>
						</div>
					{!! BootForm::close() !!}

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
