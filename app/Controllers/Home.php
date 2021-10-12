<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $usermodel = new UserModel($db);
        //buscar un usuario particular
        // $users = $usermodel->find([1,2]);
        //$users = $usermodel->findAll();
        //$users = $usermodel->where('name','maria')->findAll();
        //$users = $usermodel->findAll(1,2);
        //$users = $usermodel->withDeleted()->findAll(); //todos los usuarios y los borrador
        //$users = $usermodel->onlyDeleted()->findAll();  // solo los borrados
#-----------------------------------------------------------------------------------------

       /* $data=[
            'name' => "programador 1",
            'email' => "programadador1@gmail.com"
        ];

        $usermodel->insert($data);
        
#-------------------------------------------------------------------------------------------     

          $data=[
            'name' => "programador 3",
            'email' => "programadador3@gmail.com"
        ];

        $usermodel->update(4,$data);
        
#------------------------------------------------------------------------------------------
        ACTUALIZAR DATOS  
        $data=[
            'name' => "yo"
        ];

        $usermodel->update([2,3],$data);
        
#------------------------------------------------------------------------------------------
        ACTUALIZAR DATOS con where

        $usermodel->whereIn('id',[5,4,6])
        ->set(['name' => 'prueba'])
        ->update();
    
#------------------------------------------------------------------------------------------
        $data=[
            'name' => "programador 6",
            'email' => "programadador6@gmail.com"
        ];

        $usermodel->save($data);

         
#-------------------------------------------------------------------------------------------
        pasar un ID en save

        $data=[
            'id' => "8",
            'name' => "programador 8",
            'email' => "programadador8@gmail.com"
        ];

        $usermodel->save($data);
        */
#-------------------------------------------------------------------------------------------

        $users = $usermodel->findAll();
        $users = array('users' => $users);
        return view('estructura/header').view('estructura/body', $users);
    }
}
