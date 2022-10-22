<?php

namespace App\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

class Helper
{
    static public function paginate($dataSet, $total, $perPage)
    {
        $page = Paginator::resolveCurrentPage('page');

        $dataSet = new LengthAwarePaginator($dataSet->forPage($page, $perPage), $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return $dataSet;
    }

    static public function isAuthorized($role, $orgId)
    {
        if(!Auth::user()->checkOrgRole($role, $orgId)){
            abort(403);
        } 
    }

    static public function checkRoute($route)
    {
        $currentRoute = Route::currentRouteName();

        $active = str_contains($currentRoute, $route);

        return $active;
    }

    static public function isFormCreated()
    {
        if(session()->has('add-apf') || session()->has('add-rf') || session()->has('add-nr') || session()->has('add-lf')){
            return true;
        }
        return false;
    }

    static public function getFormCreationMessage(){
        if(session()->has('add-apf')){
            return session('add-apf');
        }else if (session()->has('add-rf')){
            return session('add-rf');
        }else if (session('add-nr')){
            return session('add-nr');
        }else if(session()->has('add-lf')){
            return session('add-lf');
        }else{
            return null;
        }
    }

}
