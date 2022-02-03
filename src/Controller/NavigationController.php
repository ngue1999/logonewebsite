<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
    /**
     * @Route("/frontOffice", name="frontOffice")
     */
    public function index(): Response
    {
        return $this->render('frontOffice/index.html.twig');
    }

    /**
     * 
     *@Route("/about", name="about")
     */
    public function about(){
        return $this->render('frontOffice/about.html.twig');
    }

    /**
     * 
     *
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('frontOffice/home.html.twig');
    }

    /**
     * @Route("/services", name="services")
     */

     public function services(){
         return $this->render('frontOffice/services.html.twig');
     }

     /**
      * Undocumented function
      *
      * @Route("/demande_Devis", name="demandeDevis")
      */
     public function demandeDevis()
     {
         return $this->render('frontOffice/demandeDevis.html.twig');
     }

     /**
      * @Route("/inscription", name="inscription")
      */
     public function inscription(){
         return $this->render("frontOffice/inscription.html.twig");
     }

     /**
      * @Route("/blog", name="blog")
      */

      public function blog(){
          return $this->render('frontOffice/blog.html.twig');
      }

      /**
      * @Route("/postule", name="postule")
      */

      public function postule(){
        return $this->render('frontOffice/postule.html.twig');
    }
}
