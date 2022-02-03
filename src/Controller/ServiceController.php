<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    /**
     * @Route("/backoffice/service", name="service_backoffice")
     */
    public function index(): Response
    {
        return $this->render('service/listeServices.html.twig',[]);
    }

    /**
     * @return Response
     * @Route("/backoffice/services/ajouteService",  name="service_ajoute")
     */
    public function ajouteService(EntityManagerInterface $em, Request $request){
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('service_backoffice');
        }

        return $this->render('service/ajouteService.html.twig',[
            'formService'=>$form->createView()
        ]);
    }

    /**
     * @param ServiceRepository $Repository
     * @return Response
     * @Route("/backoffice/service", name="service_backoffice")
     */
    public function listeServiceB(ServiceRepository $Repository){
        $services = $Repository->findAll();

        return $this->render('service/listeServices.html.twig', ['services'=>$services]);
    }

    /**
     * @param ServiceRepository $rep
     * @return Response
     * @Route("/services", name="services")
     */
    public function listeServiceF( ServiceRepository $rep){
        $services = $rep->findAll();
        return $this->render('frontOffice/services.html.twig', ['services'=>$services]);
    }

    /**
     * @param ServiceRepository $Repository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/backoffice/service/supprimerServices/{id}", name="deleteService")
     */
    public function supprimerServices(ServiceRepository $repository, $id, EntityManagerInterface $em){
        $service = $repository->find($id);
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute('service_backoffice');
    }

    /**
     * @Route("/backoffice/service/modifierService/{id}", name="updateService")
     */
    public function modifierService(ServiceRepository $rep, EntityManagerInterface $em, $id, Request $req){

        $service = $rep->find($id);
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($req);

        if($form->isSubmitted() and $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('service_backoffice');
        }

        return $this->render('service/modifierService.html.twig', ['formService'=>$form->createView()]);
    }


}
