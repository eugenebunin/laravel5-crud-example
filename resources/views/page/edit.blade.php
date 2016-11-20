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

      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-sm-2">
          <button class="btn btn-default">Add link</button>
        </div>
        <div class="col-sm-2">
          <button class="btn btn-default">Add picture</button>
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
</div>

@endsection
