@extends('layouts.main')
@section('contenido')
<form action="/admin" method="POST">
    @csrf
    <div class="form-group">
        <label for="work_clase">Clase</label>
        <select class="form-control" name="x">
            @foreach($class as $clase)
                <option name="clase" value={{$clase->id_class}}>{{$clase->name}}</option>
            @endforeach
        </select>
        <p class="lead">
        
        </p>
        <label for="work_student">Estudiante</label>
        <select class="form-control" name="student">
            @foreach($students as $student)
                <option name="estudiante" value={{$student->id}}>{{$student->name}} {{$student->surname}}</option>
            @endforeach
        </select>
        <label for="work_name">Trabajo</label>
        <select class="form-control" name="work">
            @foreach($exams as $exam)
                <option name="examen" value={{$exam->id_exam}}>{{$exam->name}}</option>
            @endforeach
        </select>
        <label for="work_mark">Calificación</label>
        <input class="form-control" id="exam_mark" type="number" placeholder="Calificación" name="nota" value={{$exam->mark}}>
        <hr>
        <input type="submit" class="btn btn-primary" name="modificacion" value="modificacionExam">
    </div>
</form>
@endsection