@extends('layouts.main')
@section('contenido')
<?php //dd($idthiswork); ?>
<form action="/admin" method="POST">
            @csrf
            <div class="form-group">
            
                <label for="work_student">Estudiante</label>
                <select class="form-control" name="student">
                    @foreach($students as $student)
                        @if($student->id==(int)$idstudent)
                            <option selected="selected" value={{$student->id}}>{{$student->name}} {{$student->surname}}</option>
                        @endif
                        <option value={{$student->id}}>{{$student->name}} {{$student->surname}}</option>
                    @endforeach
                    
                </select>
                <?php //dd($allworks);?>
                <label for="work_name">Trabajo</label>
                
                <select class="form-control" name="work">
                
                    @foreach($allworks as $allw)
                        @if($allw->id_work==(int)$idthiswork)
                            <option selected="selected" value={{$allw->id_work}}>{{$allw->name}}</option>
                        @endif
                            <option value={{$allw->id_work}}>{{$allw->name}}</option>
                    @endforeach
                </select>
                
                <label for="work_mark">Calificación</label>
                <input required class="form-control" id="work_mark" type="number" placeholder="Calificación" name="work_mark" value={{$markwork}}>
                <hr>
                <input type="submit" class="btn btn-primary" name="modificacion" value="modificacionWork">
            </div>
            </form
@endsection