<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;
Use App\Form\ArticleType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Comment;
use App\Form\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\Constraints\Count;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
       // $repo = $this->getDoctrine()->getRepository(Article::class);
        //$articles = $repo->findAll(); 
        //return $this->render('blog/index.html.twig', [
            //'controller_name' => 'BlogController',
            //'articles' => $articles
        //]);
        return $this->render('blog/index.html.twig');
    }
    /**
    * @Route("/panier", name="panier")
    */
    public function panier()
    {
        return $this->render('blog/panier.html.twig');
    } 
  
    /**
    * @Route("/", name="home")
    */
    public function home()
    {
        return $this->render('base3.html.twig');
    } 
     /**
    * @Route("/show", name="show2")
    */
    public function test()
    {
        return $this->render('blog/show2.html.twig');
    } 
    /**
    * @Route("/nospartenaires", name="nospartenaires")
    */
    public function partenaires()
    {
        return $this->render('blog/partenaires.html.twig');
    } 


}