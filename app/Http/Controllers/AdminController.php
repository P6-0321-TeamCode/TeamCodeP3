<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Work;

class AdminController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $students = DB::table('students')
            ->select('students.*')
            ->orderby('id','DESC')
            ->get();
        $asignaturas = DB::table('users')
            ->select('id','users.name','users.surname','courses.description','courses.id_course')
            ->join('enrollment', 'users.id', '=', 'id_student')
            ->join('courses', 'enrollment.id_course', '=', 'courses.id_course')
            ->where('users.rol_id','3')
            ->get();
        session(['asignaturas'=>$asignaturas]);
        return view('admin', ['asignaturas'=>$asignaturas]);
    }

    public function store(Request $request){
        // saber qué estudiante ha pulsado
        if($request->only('listarclass')){
            $idStudent = $request->only('listarclass');
            $clases = DB::table('class')
                ->select('class.name AS nameClass','class.id_class','enrollment.id_student','users.name','users.surname','courses.description','users.id AS iduser')
                ->join('enrollment', 'enrollment.id_course', '=', 'class.id_course')
                ->join('courses', 'enrollment.id_course', '=', 'courses.id_course')
                ->join('users', 'users.id', '=', 'enrollment.id_student')
                ->where('enrollment.id_student',$idStudent)
                ->get();
        
            return view('admin.clases', ['clases'=>$clases]);
        }else if($request->only('listartrabajos')){
            $temp = $request->only('listartrabajos');
            $arraytemp = explode("+", $temp['listartrabajos']);
            $idStudent=$arraytemp[0];
            $idClass=$arraytemp[1]; 
            $works = DB::table('works')
                ->select('works.*','class.name AS nameClass','class.id_class','users.name','users.surname','users.id AS iduser','works.name AS workname')
                ->join('class','class.id_class','=','works.id_class')
                ->join('users','users.id','=','works.id_student')
                ->join('courses','class.id_course','=','courses.id_course')
                ->where('works.id_student',$idStudent)
                ->where('works.id_class', $idClass)
                ->get();

                $clase = DB::table('class')
                            ->select('class.*')
                            ->get();
                $courses = DB::table('courses')
                            ->select('courses.*')
                            ->get();
                $students = DB::table('users')
                            ->select('users.*')
                            ->where('rol_id','3')
                            ->get();
                $allworks = DB::table('works')
                            ->select('works.*')
                            ->get();
            
            return view('admin.works', ['works'=>$works, 'class'=>$clase, 'courses'=>$courses, 'students'=>$students,'allworks'=>$allworks]);
        }else if($request->only('listarexamenes')){
        }else if($request->only('borrartrabajos')){
            $idWork = $request->only('borrartrabajos');
            DB::table('works')
                ->where('id_work',$idWork)
                ->delete();
        }else if($request->only('editartrabajos')){
            //dd($request->only('editartrabajos'));
            $idThisWork=$request->only('editartrabajos');
            $idstudent = $request->only('idstudent');
            $markwork = $request->only('mark_work');
            //dd($idThisWork['editartrabajos']); //devuelve bien
            $students = DB::table('users')
                            ->select('users.*')
                            ->where('rol_id','3')
                            ->get();
            $allworks = DB::table('works')
                            ->select('works.*')
                            ->get();
            return view('admin.editwork',['allworks'=>$allworks,'students'=>$students,'idthiswork'=>$idThisWork['editartrabajos'],'idstudent'=>$idstudent['idstudent'],'markwork'=>$markwork['mark_work']]);
        
        }else if($request->only('modificacion')){
            //dd($request->only('modificacion')); 
            
            if($request->only('modificacion')['modificacion']=='modificacionWork'){
                //consulta de update
               //dd($request->all());
                DB::table('works')
                        ->where('id_work', $request->work )
                        ->update(['id_student' => $request->student, 'mark' => $request->work_mark ]);
                session(['Listo'=>'Datos actualizados Correctamente']);
                return back();
            }
            
        
        }
    }
       
}
