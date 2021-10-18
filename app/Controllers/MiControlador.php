<?php

namespace App\Controllers;
use App\Models\UserModel;

class MiControlador extends BaseController
{
    

    public function __construct(){
        helper('form');
        $this->session = \Config\Services::session();
    }

    public function ponerDatos(){
        

        $newdata =[
            'name' => 'novato',
            'email' => 'info@gmail.com',
            'login' => TRUE,
        ];

        $this->session->set($newdata);
        echo $this->session->get('email');
    }
    public function leerDatos(){

        if($this->session->has('name')){

            echo "name=".$this->session->get('name')."<br>";
            echo "email=".$this->session->get('email')."<br>";
            echo "login=".$this->session->get('login')."<br>";
        }else{
            echo "no hay datos";
        }
    }

    public function quitarDatos(){
        $this->session->remove('email');
    }

    public function destruirDatos(){
        $this->session->destroy();
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
        #actualizar------

            if($request->getPostGet('id')) {
                $data['id'] = $request->getPostGet('id');
            }

        #-------------------
        if($usermodel->save($data)===false){
            var_dump($usermodel->errors());
        }

        #una vez actualizado mandar a esta vista

        if ($request->getPostGet('id')) {
            $users = $usermodel->find([$request->getPostGet('id')]);
            $users = array('users' => $users);
            return view('estructura/header').view('estructura/formulario', $users);
        }else{
            $users = $usermodel->findAll();
            $users = array('users' => $users);
            return view('estructura/header').view('estructura/body', $users);
        }
        #------------------------
        
    }

    public function editar(){
        $usermodel = new UserModel($db);
        $request = \Config\Services::request();

        $id = $request->getPostGet('id');


        $users = $usermodel->find([$id]);
        $users = array('users' => $users);
        return view('estructura/header').view('estructura/formulario', $users);
    }


    public function borrar(){
        $usermodel = new UserModel($db);
        $request = \Config\Services::request();

        $id = $request->getPostGet('id');

        
        $usermodel->delete($id);
        $users = $usermodel->findAll();
        $users = array('users' => $users);
        return view('estructura/header').view('estructura/body', $users);
    }

    public function index()
    {
        //sleep(1);
        $usermodel = new UserModel($db);
        $datos = $usermodel->paginate(5);
        $paginador = $usermodel->pager;
        #paginador->setPath('codeigniter/');
        #$datos = $usermodel->findAll();
        //anidar vistas
        #$datos = array('users' => $datos, 'cabecera' => view('estructura/header'));
        $datos = array('users' => $datos, 'paginador' => $paginador);
        $estructura = view('estructura/header').view('estructura/body', $datos);
        return $estructura;


    }

    public function imagenManipuladora(){
        #resize a la mitad
        $info=\Config\Services::image()
        ->withFile('fondoRosa.jpg')
        ->getFile() #tomo captura de la imagen
        ->getProperties(true);

        $ancho = $info['width'];
        $alto = $info['height'];
         #---------------

        $imagen=\Config\Services::image()
        ->withFile('fondoRosa.jpg')
        ->reorient()
        //->rotate(90)
        //->fit(250,250,'bottom-left')  #recorta la imagen
        //->resize($ancho/2, $alto/2)
        ->crop(300,300,50,50) #Recortar la imagen 50 = x, 50 = y
        ->save('fondoRosa_p.jpg');

        return view('estructura/imagen');    
    }
    
}
