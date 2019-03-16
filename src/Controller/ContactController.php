<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        
       $form->handleRequest($request);
      

       if ($form->isSubmitted() && $form->isValid()) {

           $contactFormData = $form->getData();
           dump($contactFormData);

           $message = (new \Swift_Message($contactFormData['email']))
              ->setFrom($contactFormData['email'])
              ->setTo('xarxacebrianenca66@gmail.com')
              ->setBody(
                   $contactFormData['message'],
                   'text/html'
               )
           ;

           $mailer->send($message);
          

           return $this->redirectToRoute('contact');
       }
        return $this->render('blog/contact.html.twig', [
                      'our_form' => $form->createView(),
                  ]);
    }
}
