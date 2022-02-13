<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController
{
    /**
     * @Route("/")
     */
    public function main(){
        //Returns symfony response object

        //TODO: Add database queries

        return new  Response('Prueba');
    }

    /**
     * @Route("/suppliers/list-all-suppliers")
     */
    public function showSuppliers(){
        return new Response('Future list of suppliers');
    }
}