<?php

namespace App\Controller;

use App\Entity\Supplier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function home(): Response{

        $supplier_repo = $this->getDoctrine()->getRepository(Supplier::class);
        $suppliers = $supplier_repo->findAll();
        foreach ($suppliers as $supplier){
            echo "<h1>{$supplier->getName()} {$supplier->getType()}</h1>";
        }

        return $this->render('supplier/homepage.html.twig');
    }

    #[Route('/supplier', name: 'supplier')]
    public function index(): Response
    {
        //Test entities
        /*
        $em = $this->getDoctrine()->getManager();
        $supplier_repo = $this->getDoctrine()->getRepository(Supplier::class);
        $suppliers = $supplier_repo->findAll();

        foreach ($suppliers as $supplier){
            echo $supplier->getName()."</br>";
        }*/

        $supplier_repo = $this->getDoctrine()->getRepository(Supplier::class);
        $suppliers = $supplier_repo->findAll();
        foreach ($suppliers as $supplier){
            echo "<h1>{$supplier->getName()} {$supplier->getType()}</h1>";
        }

        return $this->render('supplier/index.html.twig', [
            'controller_name' => 'SupplierController',
        ]);
    }

    /**
     * @Route("/create", name="supplier_create")
     */
    public function create(): Response{
        return $this->render('supplier/create.html.twig');
    }
}
