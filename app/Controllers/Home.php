<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function __construct(){
        helper('form');
    }

    public function formulario(){
        return view('estructura/header').view('estructura/formulario');
    }

    public function guarda(){
        $usermodel = new UserModel($db);
        $request = \Config\Services::request();

        $data=array(
            'name' => $request->getPostGet('name'),
            'email' => $request->getPostGet('email')
        );

        if($usermodel->insert($data)===false){
            var_dump($usermodel->errors());
        }
        $users = $usermodel->findAll();
        $users = array('users' => $users);
        return view('estructura/header').view('estructura/body', $users);
    }

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
        
#-------------------------------------------------------------------------------------------
//borrar registros
        //$usermodel->delete(3);
        
        //$usermodel->delete([4,5,6]);

        //$usermodel->where('id',2)->delete();   
        $usermodel->purgeDeleted(); borrar registros deleted_at 

#-------------------------------------------------------------------------------------------
        $data=[
            'name' => "Nombrevalido",
            'email' => "Correovalido@gmail.com"
        ];

        if ($usermodel->save($data) === false){
            var_dump($usermodel->errors());
        }
        
 #------------------------------------------------------------------------------------------- 
        //builder
        $users = $usermodel->where('name','programador 2')
                        ->orderBy('id','asc')
                        ->findAll();
                       
#------------------------------------------------------------------------------------------- 
//mandar a objetos asObject -- asArray

            $users = $usermodel->asArray()->where('name','programador 2')
                    ->orderBy('id','asc')
                    ->findAll();
                    var_dump($users);

                    */ 
#-------------------------------------------------------------------------------------------
//mandar algo relacionado con el modelo
        $data=[
            'name' => "Nombrevalido 2",
            'email' => "Correovalido2@gmail.com"
        ];

        if ($usermodel->save($data) === false){
            var_dump($usermodel->errors());
        }

        $users = $usermodel->findAll();
        $users = array('users' => $users);
        return view('estructura/header').view('estructura/body', $users);
    }


    
}
