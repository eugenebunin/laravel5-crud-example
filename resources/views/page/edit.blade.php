@extends('layouts.app')

@section('content')
<div class="container" ng-app="Crud" ng-init="show(<?= $page->id ?>)" ng-controller="PageController">
  <div class="col-sm-offset-1 col-sm-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        Edit Page
      </div>

      <div class="panel-body">

        <!-- Edit Page Form -->
        {!! BootForm::openHorizontal(['sm' => [3, 6]]) !!}

          <!-- Page Name -->
          {!! BootForm::text('Page name', 'name')->attribute('ng-model', 'page.name')->attribute('value', '@{{page.name}}') !!}

          <!-- Page Slug -->
          {!! BootForm::text('Page slug', 'slug')->attribute('value', '@{{page.slug}}') !!}

          {!! BootForm::submit('Save page')->attribute('ng-click', 'update($event)') !!}

          <input type="hidden" value="@{{page.id}}" ng-model="page.id">

          {!! BootForm::close() !!}

      </div>
    </div>

    <!-- Panel with create Link&Picture buttons-->
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

    <!-- List links -->
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

    <!-- List pictures -->
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

        {!! BootForm::openHorizontal(['sm' => [3, 6]]) !!}

        {!! BootForm::text('Picture Source', 'source')->attribute('ng-model', 'form.picture.source') !!}

        {!! BootForm::close() !!}

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

        {!! BootForm::openHorizontal(['sm' => [3, 6]]) !!}

        {!! BootForm::text('Link name', 'name')->attribute('ng-model', 'form.link.name') !!}

        {!! BootForm::text('Link url', 'link')->attribute('ng-model', 'form.link.link') !!}

        {!! BootForm::close() !!}

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
