<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
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
    public function showSuppliers($slug='Hola'){

        $list = ['Yves', 'Rocher', 'Crema'];
        return $this->render('supplier/show.html.twig', [
            'supplier'=> ucwords(str_replace('-',' ', $slug)),
            'list' => $list,
        ]);
        /*
        return new Response(sprintf(
            'Future list of suppliers',
            ucwords(str_replace('-',' ', $slug))
            ));*/
    }
}