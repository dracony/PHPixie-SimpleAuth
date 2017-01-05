<?php

namespace Project\App\HTTPProcessors;

use PHPixie\HTTP\Request;
use PHPixie\Template;

class Test extends \PHPixie\DefaultBundle\Processor\HTTP\Actions
{
    protected $builder;

    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    public function defaultAction($request)
    {
        $authDomain = $this->authDomain();
        $user = $authDomain->user();
        
        if($user !== null) {
            return "You are logged in";
        }
        
        $username = $request->query()->get('username');
        if($username === null) {
            return "Please login";
        }
        
        $user = $this->authDomain()->provider('password')->login(
            $username,
            $request->query()->get('password')
        );
            
        if($user !== null) {
            return "You are logged in";
        }
        
        return "Wrong password";
    }
    
    public function logoutAction($request)
    {
        $this->authDomain()->forgetUser();
        return $this->redirect('app.processor', ['processor' => 'test']);
    }
    
    protected function authDomain()
    {
        return $this->builder->components()->auth()->domain();
    }
    
    protected function redirect($route, $params = [])
    {
        return $this->builder->frameworkBuilder()->http()->redirectResponse($route, $params);
    }
}