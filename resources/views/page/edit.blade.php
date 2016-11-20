@extends('layouts.app')

@section('content')

<div class="container" ng-app="Crud" ng-controller="PageController">
  <div class="col-sm-offset-2 col-sm-8">
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
              <input type="text" value="<?= $page->name ?>" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="page-slug" class="col-sm-3 control-label">Slug</label>

            <div class="col-sm-6">
              <input type="text" value="<?= $page->slug ?>" readonly class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button class="btn btn-default">Save</button>
            </div>
          </div>
        </form>

          <div class="form-group"
            <div class="col-sm-6">
              <button class="btn btn-default">Add Link</button>
            </div>
          </div>

          <div class="form-group" ng-repeat="link in links">
            <div class="panel-heading">
              Link
            </div>

            <label for="link-name" class="col-sm-3 control-label">Link name</label>

            <div class="col-sm-6">
              <input type="text" class="form-control">
            </div>
          </div>

          <div class="form-group" ng-repeat="picture in pictures">
            <div class="panel-heading">
              Picture
            </div>

            <label for="picture-source" class="col-sm-3 control-label">Picture source</label>

            <div class="col-sm-6">
              <input type="text" class="form-control">
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

@endsection
