<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
    			//echo "teste para login sucesso"; die;
                /*Session::put('adminSession',$data['email']);*/
                return redirect('/admin/dashboard');
            }else{
    			//echo "teste para login errado"; die;
                return redirect('/admin')->with('flash_message_error','Senha ou Usuario incorreto');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
       /* if(Session::has('adminSession')){
            //Executar todas as tarefas do painel
        }else{
            return redirect('/admin')->with('flash_message_error','Por favor, faça o login para acessar');
       }*/
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','logout com sucesso');
    }
}
