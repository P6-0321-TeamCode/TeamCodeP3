@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Consulta los detalles de tus proyectos</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-user fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        @if($message = Session::get('Listo'))
            <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                <h5>Mensaje: </h5>
                <span>{{ $message }}</span>
            </div>
        @endif
        <table class="table col-12 table-responsive">
            <thead>
                <tr>
                    <td><strong>Clase (Asignatura)</strong></td>
                    <td><strong>Trabajo</strong></td>
                    <td><strong>Calificación</strong></td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
            <?php // dd($works) ?>
            @foreach($works as $work)
            <tr>
                <td>{{$work->nameClass}}</td>
                <td>{{$work->workname}}</td>
                <td><div style="text-align: center;"><strong>{{$work->mark}}</strong></div></td>
                <td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
