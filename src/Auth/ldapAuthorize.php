<?php
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;

class LdapAuthorize extends BaseAuthorize
{
    public function authorize($user, ServerRequest $request)
    {
       	$action = $request->getParam('action');
        $this->log($request->getParam());
        $controller = $request->getParam('controller');
        if (in_array($action,['login', 'logout'])){
            return true;
        }
        if(in_array($controller,['Usuarios','Aportes','Documentacion','Proyectos'])){
            if(in_array($action,['index','display'])){
                return true;
            }
        }
    }
}