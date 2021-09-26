<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    public function index(){
      $getusercourses=DB::table('student_selections')->
      join('courses','courses.id','=','student_selections.course_id')->
      where('student_selections.user_id',Auth::id())->get();
      $usercourses=json_decode(json_encode($getusercourses), true);
      return view("auth.dashboard",['usercourses'=>$usercourses]);
    }
    public function admin_index(){
      return view("admin.index");
}
  public function dash(){
    if(Auth::User()->is_admin =='0'){
        return redirect()->route('Dashboard');
    }
    else{
        return redirect()->route('AdminDashboard');
    }
  }
}
