<?php

namespace App\Controller;

use App\Entity\Supplier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SupplierType;

class SupplierController extends AbstractController
{
    /**
     * @Route("/home", name="app_homepage")
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

        //$em = $this->getDoctrine()->getManager();
        $supplier_repo = $this->getDoctrine()->getRepository(Supplier::class);
        $suppliers = $supplier_repo->findBy([],['id'=>'DESC']);
        return $this->render('supplier/index.html.twig', [
            //'controller_name' => 'SupplierController',
            'suppliers'=>$suppliers
        ]);
    }

    /**
     * @Route("/create", name="supplier_create")
     */
    public function create(Request $request){
        echo "Hola aquí creo";
        $supplier = new Supplier();
        $form = $this->createForm(SupplierType::class, $supplier);

        $form->handleRequest($request);
        if($form->isSubmitted()){
            //$supplier->
        }

        return $this->render('supplier/create.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/detail/{id}", name="supplier_detail")
     */
    public function detail(Supplier $supplier){

        return $this->render('supplier/detail.html.twig',[
            'supplier'=>$supplier
        ]);
    }
}
