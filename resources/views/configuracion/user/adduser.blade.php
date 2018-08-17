@extends('layouts.backend.index')

@push('js')
<script src="{{ URL::asset('/angularController/configController.js') }}"></script>
@endpush

@section('content')

<div class="content" ng-controller="configController">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Agregar Administrador</h4>
                    <p class="category">Registre un Nuevo Usuario</p>
                </div>
                <div class="card-content">

                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection