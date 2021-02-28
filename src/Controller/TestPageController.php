<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestPageController
{
    /**
     * @Route("/")
     * @return Response
     * @throws \Exception
     */
    public function renderDisplay(){
        $number = random_int(0,100);

        return new Response(
            '<html><body>Hello / '.$number.'</body></html>'
        );
    }
}