@extends('layouts.app')

@section('content')
<div class="container" ng-app="Crud" ng-init="show(<?= $page->id ?>)" ng-controller="PageController">
  <div class="col-sm-offset-1 col-sm-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        Edit Page
      </div>

      <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Page Form -->
        <form method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <!-- Page Name -->
          <div class="form-group">
            <label for="page-name" class="col-sm-3 control-label">Name</label>

            <div class="col-sm-6">
              <input type="text" value="@{{page.name}}" ng-model="page.name" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="page-slug" class="col-sm-3 control-label">Slug</label>

            <div class="col-sm-6">
              <input type="text" value="@{{page.slug}}" readonly class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button class="btn btn-default" ng-click="update()">Save</button>
            </div>
          </div>
          <input type="hidden" value="@{{page.id}}" ng-model="page.id">
        </form>

      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-sm-2">
          <button class="btn btn-default" data-toggle="modal" data-target="#linkCreateModal">Add link</button>
        </div>
        <div class="col-sm-2">
          <button class="btn btn-default" data-toggle="modal" data-target="#pictureCreateModal">Add picture</button>
        </div>
      </div>
    </div>

    <div class="panel panel-default" ng-repeat="link in links">
      <div class="panel-heading">
        Link
      </div>

      <div class="panel-body">
        <form class="form-horizontal">
        <div class="form-group">
          <label for="page-name" class="col-sm-3 control-label">Link name</label>

          <div class="col-sm-6">
            <input type="text" value="@{{link.name}}" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="page-name" class="col-sm-3 control-label">Link</label>

          <div class="col-sm-6">
            <input type="text" value="@{{link.link}}" class="form-control">
          </div>
        </div>
        </form>
      </div>
    </div>

    <div class="panel panel-default" ng-repeat="picture in pictures">
      <div class="panel-heading">
        Picture
      </div>

      <div class="panel-body">
        <form class="form-horizontal">
        <div class="form-group">
          <label for="page-name" class="col-sm-3 control-label">Source</label>

          <div class="col-sm-6">
            <input type="text" value="@{{picture.source}}" class="form-control">
          </div>
        </div>
        </form>
      </div>
    </div>


  </div>

  <!-- Modal for creating picture-->
  <div class="modal fade" id="pictureCreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Create Picture</h4>
        </div>
        <div class="modal-body">

        <form class="form-horizontal">
          <div class="form-group">
            <label for="link-name" class="col-sm-3 control-label">Source</label>

            <div class="col-sm-6">
              <input type="text" ng-model="form.picture.source" class="form-control">
            </div>
          </div>

        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" ng-click="createPicture()">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for creating link-->
  <div class="modal fade" id="linkCreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Create Link</h4>
        </div>
        <div class="modal-body">

        <form class="form-horizontal">
          <div class="form-group">
            <label for="link-name" class="col-sm-3 control-label">Name</label>

            <div class="col-sm-6">
              <input type="text" ng-model="form.link.name" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="link-link" class="col-sm-3 control-label">Link</label>

            <div class="col-sm-6">
              <input type="text" ng-model="form.link.link" class="form-control">
            </div>
          </div>

        </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" ng-click="createLink()">Save</button>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection
