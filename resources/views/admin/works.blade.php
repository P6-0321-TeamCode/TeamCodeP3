@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Trabajos</h1>
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
                    <td>Alumno</td>
                    <td>Nombre de Clase (Asignatura)</td>
                    <td>Nombre de trabado</td>
                    <td>Calificación</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
            <?php // dd($works) ?>
            @foreach($works as $work)
            <tr>
                <td>{{$work->name}} {{$work->surname}}</td>
                <td>{{$work->nameClass}}</td>
                <td>{{$work->workname}}</td>
                <td>{{$work->mark}}</td>
                <td>
                        <form action="#" method="POST">
                        @csrf
                            <input type="hidden" name="mark_work" value={{$work->mark}}>
                            <input type="hidden" name="idstudent" value={{$work->id_student}}>
                            <button class="btn btn-round btn-primary" type="submit" name="editartrabajos" value={{$work->id_work}}> <i class="fas fa-edit"></i>Editar</button>
                            <button class="btn btn-round btn-danger" type="submit" name="borrartrabajos" value={{$work->id_work}}> <i class="fas fa-trash"></i>Eliminar</button>
                        </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editartrabajos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/admin" method="POST">
            @csrf
            <div class="form-group">
                <label for="work_clase">Clase</label>
                <!-- <select class="form-control" name="x">
                    @foreach($class as $clase)
                        <option value={{$clase->id_class}}>{{$clase->name}}</option>
                    @endforeach
                </select> -->
                <p class="lead">
                {{$work->nameClass}}
                </p>
                <label for="work_student">Estudiante</label>
                <select class="form-control" name="student">
                    @foreach($students as $student)
                        <option value={{$student->id}}>{{$student->name}} {{$student->surname}}</option>
                    @endforeach
                </select>
                <label for="work_name">Trabajo</label>
                <select class="form-control" name="work">
                    @foreach($allworks as $allw)
                        <option value={{$allw->id_work}}>{{$allw->name}}</option>
                    @endforeach
                </select>
                <label for="work_mark">Calificación</label>
                <input class="form-control" id="work_mark" type="number" placeholder="Calificación" name="work_mark" value={{$work->mark}}>
                <hr>
                <input type="submit" class="btn btn-primary" name="modificacion" value="modificacionWork">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
    </div>
    </div>
@endsection