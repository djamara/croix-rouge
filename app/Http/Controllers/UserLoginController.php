<?php

namespace App\Http\Controllers;

use App\modeles\Personne;
use App\modeles\PersonnePrivilege;
use App\modeles\Privilege;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request){

        extract($request->all());
        //$credentials = $request->only('login','password');
        $credentials = $request->only(['login'=>$login ,'password'=>$password]);


        $user = User::where('login',$login)
            ->where('passdecode',$password)
            ->where('status',0)
            ->where('active',1)
            ->first();

        if($user){

            $user = User::where('login',$login)->first();
            $user->status = 1;

            $user->where('login',$login)->update($user->toArray());
            Auth::login($user);

            $_SESSION['user'] = $user;
            session_start();


            echo "succes";
        }
        else if (Auth::attempt(['login'=>$login, 'password'=>$password,'active'=>1,'status'=>1])) {

            echo 'connecté';
        }
        else{
            echo 'pasdedonnees';
        }

    }

    public function createCompte(Request $request){

        $personne = Personne::where('personne_top_valide','=',1)->get();

        $privilegeRH = Privilege::where('idmodule','=',1)->get();

        $privilegeAdmin = Privilege::where('idmodule','=',4)->get();

        return view('admin/create_compte',["personne"=>$personne,"privilege"=>$privilegeRH,"privileges"=>$privilegeAdmin]);

    }

    public function insererCompte(Request $request){

        extract($request->all());

        //var_dump($request->all());

        $user = new User();
        $user->login = $login;
        $user->persImmat = $matricule;
        $data['password'] = $motdepasse;
        $user->password = Hash::make($data['password']);
        $user->passdecode = $motdepasse;
        $user->active = 0;
        $user->status = 0; //0 qui signifie deconnecté

        if($user->save()){
            $retour = 'succes';
        }else{
            $retour = 'false';
        }
        $privilege = $request->privilege;
        //var_dump($privilege);

        if(isset($privilege)&& $privilege != null){
            foreach ($privilege as $privilege){
                $personne_privilege = new PersonnePrivilege();
                $personne_privilege->PersImmat = $matricule;
                $personne_privilege->idPrivilege = $privilege;

                $personne_privilege->save();
            }
        }

        echo $retour;
    }

    public function modifierCompte(Request $request){

        extract($request->all());

        //var_dump($request->all());


        $user = new User();
        $user = $user->all()->where("idUsers", $idUser)->first();

        $user = new User();
        $user->login = $login;
        $user->persImmat = $matricule;
        $data['password'] = $motdepasse;
        $user->password = Hash::make($data['password']);
        $user->passdecode = $motdepasse;
        $user->active = 1;
        $user->status = 0;

        $retour = $user->where('idUsers', $idUser)->update($user->toArray());

        if($retour){
            $retour = 'succes';
        }else{
            $retour = 'false';
        }

        /*foreach ($privilege as $privilege){
            $personne_privilege = new PersonnePrivilege();
            $personne_privilege->PersImmat = $matricule;
            $personne_privilege->idPrivilege = $privilege;

            $personne_privilege->save();
        }*/

        echo $retour;
    }

    public function listeComptes(Request $request){

        $comptes = User::all();

        return view('admin.tableCompte',['comptes'=>$comptes]);
    }

    public function afficherCompte($idcompte){

        $personne = Personne::where('personne_top_valide','=',1)->get();

        $privilegeRH = Privilege::where('idmodule','=',1)->get();

        $privilegeAdmin = Privilege::where('idmodule','=',4)->get();

        $compte = User::where('idUsers','=',$idcompte)->first();

        return view('admin/modifier_compte',["compte"=>$compte,"personne"=>$personne,"privilege"=>$privilegeRH,"privileges"=>$privilegeAdmin]);

    }

}
