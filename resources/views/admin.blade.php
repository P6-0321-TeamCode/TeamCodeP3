@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel Administración</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-user fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        @if(Session::get('Listo'))
            <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                <h5>Mensaje: </h5>
                <span>{{  $value = session('Listo') }}</span>
                @php session(['Listo'=>null]) @endphp
            </div>
        @endif
        <table class="table col-12 table-responsive">
            <thead>
                <tr>
                    <td>Estudiante</td>
                    <td>Curso</td>
                    <td>Nota Final</td>
                    <td>Ver detalles</td>
                </tr>
            </thead>
            <tbody>
            <?php // dd($notas) ?>
            @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{$asignatura->name}} {{$asignatura->surname}}</td>
                    <td>{{$asignatura->description}}</td>
                    <?php // dd($notas) ?>
                    @foreach($notas as $nota)
                        @if ($asignatura->id_course == $nota->id_course)
                        @php
                            $notacalculada = (float)(($nota->notaworks * $nota->ec / 100 ) + ($nota->notaexamen * $nota->percentexamen / 100)); 
                            $notacalculada = $notacalculada>=0 ? $notacalculada : $notacalculada = '-';
                        @endphp
                        <td>{{$notacalculada}}</td>  
                        @break;      
                        @endif
                        
                    @endforeach
                    <td> 
                        <form action="/admin" method="POST">
                        @csrf
                            <button class="btn btn-round" type="submit" name="listarclass" value={{$asignatura->id}}> <i class="fa fa-eye"></i>Ver detalles</button>
                            <!-- ¿Dato calculado? <button class="btn btn-round" type="submit" name="modificarEC" value={{$asignatura->id}}><i class="fas fa-poll-h"></i>Modificar EC</button> -->
                            <button class="btn btn-round" type="submit" name="modificarporcentaje" value={{$asignatura->id}}><i class="fas fa-percent"></i> de EC</button>
                            
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

