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
        //We'll get the homepage view
        return $this->render('supplier/homepage.html.twig');
    }

    #[Route('/supplier', name: 'supplier')]
    public function index(): Response{
        //We'll get the list of suppliers here by descending order
        $supplier_repo = $this->getDoctrine()->getRepository(Supplier::class);
        $suppliers = $supplier_repo->findBy([],['id'=>'DESC']);
        return $this->render('supplier/index.html.twig', [
            'suppliers'=>$suppliers
        ]);
    }

    /**
     * @Route("/create", name="supplier_create")
     */
    public function create(Request $request){
        //Create new supplier
        $supplier = new Supplier();
        //Use the form type for supplier and the supplier object
        $form = $this->createForm(SupplierType::class, $supplier);

        $form->handleRequest($request);
        //Check if the user has completed the form and is valid
        if($form->isSubmitted() && $form->isValid()){
            //Set current date and time
            $supplier->setCreatedAt(new \DateTime('now'));
            $supplier->setLastUpdated(new \DateTime('now'));
            //Persistance and add to the DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($supplier);
            $em->flush();
            //Return us to the newly created supplier detail view
            return $this->redirect($this->generateUrl('supplier_detail',['id'=>$supplier->getId()]));
        }
        //Set view
        return $this->render('supplier/create.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/detail/{id}", name="supplier_detail")
     */
    public function detail(Supplier $supplier){
        //This will get the detail view for the wild card 'id' for the supplier
        return $this->render('supplier/detail.html.twig',[
            'supplier'=>$supplier
        ]);
    }

    /**
     * @Route("/edit/{id}", name="supplier_edit")
     */
    public function edit(Request $request, Supplier $supplier){

        //Use the form type for supplier and the supplier object
        $form = $this->createForm(SupplierType::class, $supplier);

        $form->handleRequest($request);
        //Check if the user has completed the form and is valid
        if($form->isSubmitted() && $form->isValid()){
            //Set current date and time
            $supplier->setLastUpdated(new \DateTime('now'));
            //Load entity manager, add persistance and add supplier to the DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($supplier);
            $em->flush();
            //Return us to the newly created supplier detail view
            return $this->redirect($this->generateUrl('supplier_detail',['id'=>$supplier->getId()]));
        }

        return $this->render('supplier/create.html.twig',[
            'edit' => true,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="supplier_delete")
     */
    public function delete(Supplier $supplier)
    {
        //Load entity manager and remove supplier
        $em = $this->getDoctrine()->getManager();
        //Remove from doctrine
        $em->remove($supplier);
        //Delete from the DB
        $em->flush();

        return $this->redirectToRoute('supplier');
    }
}
