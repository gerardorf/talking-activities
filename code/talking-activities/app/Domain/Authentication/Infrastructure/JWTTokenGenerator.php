<?php
namespace App\Domain\Authentication\Infrastructure;


use App\Domain\Authentication\TokenGenerator;
use App\Domain\Authentication\User;
use Lcobucci\JWT\Builder;

class JWTTokenGenerator implements TokenGenerator
{

    public function do(User $user)
    {
        $builder = $this->obtainDefaultBuilder();
        $builder->set('username',$user->username());
        return (string) $builder->getToken(); 
    }

    private function obtainDefaultBuilder()
    {
        $builder = new Builder;
        $builder->setIssuer('http://example.com');
        $builder->setAudience('http://example.org');
        $builder->setId('4f1g23a12aa', true);
        $builder->setIssuedAt(time());
        $builder->setNotBefore(time() + 60);
        $builder->setExpiration(time() + 3600);
        return $builder;
    }
}
