<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Student;
use OC\PlatformBundle\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
  public function homeAction(){
     $em = $this->getDoctrine()->getManager();
     $students = $em->getRepository("OCPlatformBundle:Student")->findAll();
     return $this->render('OCPlatformBundle:data:show.html.twig', ['students' => $students]);
  }
    public function showAction(Request $request){
     // On crée un objet Advert
    $advert = new Student();
    // On crée le FormBuilder grâce au service form factory
    $form = $this->get('form.factory')->createBuilder('form', $advert)
      ->add('prenom',      'text')
      ->add('nom',     'text')
      ->add('cne',     'number')
      ->add('moyenbac',   'number')
      ->add('etablissement',    'text')
      ->add('save',      'submit')
      ->getForm()
    ;
    $form->handleRequest($request);
    if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
        return $this->redirect($this->generateUrl('oc_platform_add', array('id' => $advert->getId(), 'value' => 0)));
    }
    // sse la méthode createView() du formulaire à la vue
    // afin qu'elle puisse afficher le formulaire toute seule
     return $this->render('OCPlatformBundle:Default:index.html.twig', array(
      'form' => $form->createView(), 'value' => 1));
  }
    public function loginAction(Request $request){
    $advert = new Admin();
    $form = $this->get('form.factory')->createBuilder('form', $advert)
     ->add('login',   'text')
     ->add('password',     'password')
     ->add('save',      'submit')
     ->getForm()
    ;
    $form->handleRequest($request);
    /*if ($form->isValid()) {
        //TO DO!
    }*/
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirectToRoute('oc_platform_home');
    }
    
    // Le service authentication_utils permet de récupérer le nom d'utilisateur
    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
    // (mauvais mot de passe par exemple)
    $authenticationUtils = $this->get('security.authentication_utils');

    return $this->render('OCPlatformBundle:data:login.html.twig', array(
      'last_username' => $authenticationUtils->getLastUsername(),
      'error'         => $authenticationUtils->getLastAuthenticationError(),'form' => $form->createView(),
    ));
    //return $this->render('OCPlatformBundle:data:login.html.twig', ['form' => $form->createView()]);
  }
    public function conditionAction(){
    return $this->render('OCPlatformBundle:data:condition.html.twig');
  }
    public function contactAction(){
    return $this->render('OCPlatformBundle:data:contact.html.twig');
  }
  public function addAction()
  {
    /*
     $student = new Student();
     $student->setPrenom(('Houda'));
     $student->setNom('elhafi');
     $student->setCne(3322002240);
     $student->setMoyenbac(13.12);
     $student->setEtablissement('ENCG');
     $student->setStatut(-1);
     $student->setDate(new \DateTime(date("Y-m-d H:i:s")));
     $em = $this->getDoctrine()->getManager();
     $em->persist($student);
     
     $em->flush();
     */
     return $this->render('OCPlatformBundle:Default:index.html.twig', ['value' => 0]);
  }
}

    //Serviceeee !!   
    //$text = 'This is totally fine since its more than 10chars';
       
       //$k = $antispam->isSpam($text);
       //return $this->render('OCPlatformBundle:Default:index.html.twig',['value' => $k]);
    
    // Ici le message n'est pas un spam