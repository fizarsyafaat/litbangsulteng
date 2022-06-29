<?php

namespace WebRoot\Master\Filters\Auth;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services as SVC;
use BusinessProcessRoot\Master\Models\User as UserModel;

class AuthFilter implements FilterInterface
{
	public $redirect = array(
		'user_redirect' => "user.login.view",
	);

    public function before(RequestInterface $request, $arguments = null)
    {
    	$session = SVC::session();
    	$userdata = $session->get('data');

    	$redirect_route = $this->redirect[$arguments[0] . '_redirect'];

    	if(isset($userdata->fix_role)){
	    	if($userdata->fix_role != $arguments[0]){
				return redirect()->route($redirect_route);
	    	}
    	}else{
			return redirect()->route($redirect_route);
    	}
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}