<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BaseControlador extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $controlView =  DB::table('base_select')->where('id_user', Auth::user()->id)->orderBy('date_instert', 'DESC')->first();

        if ($controlView->id_base == 55) {
            return redirect('/ine');
        }else if($controlView->id_base == 99999999){
            return redirect('/acortador_url');
        }

        if ($controlView->id_base == 81 || $controlView->id_base == 86) {
       
        return view("home_evento");
        } else {
            return view("home");    
        }
    }



    public function indexevento()
    {
        $controlView =  DB::table('base_select')->where('id_user', Auth::user()->id)->orderBy('date_instert', 'DESC')->first();

        if ($controlView->id_base == 55) {
            return redirect('/ine');
        }else if($controlView->id_base == 99999999){
            return redirect('/acortador_url');
        }
        return view("home_Evento");
    }


    
    //////////////////////////////ver info genral
    public function infoge()
    {
        return view("infogeneral");
    }

    public function infologeo()
    ///////////////////ver info usuarios logeados
    {
        return view("infologeo");
    }
    ////////////////alertas en elesistema
    public function infoalerta()
    {
        return view("infoalerta");
    }
    //////////////////////////////perfilusuario

    public function perfilusuario()
    {
        return view("infousuario");
    }
    ////////////////////////FORMULARIO EDICION ALERTAS

    public function formeditalert()
    {
        return view("formularios.form_edit_alert");
    }
    //////////////////////////////////////////////////////////// 
    public function tablatabla()
    {
        return view("tabla.tabla");
    }
    public function info_general()
    {
        return view("extras.accesos.info_accesos");
    }
}
