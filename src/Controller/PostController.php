<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;
use App\Entity\Imageprincipale;


/**
 * @Route("/post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="post_index", methods="GET")
     */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('post/index.html.twig', ['posts' => $postRepository->findBy(
            ['categorys' => 4],
            ['id' => 'ASC']
        )]);
    }
      /**
     * @Route("/evenements", name="events", methods="GET")
     */
    public function events(PostRepository $postRepository): Response
    {
        return $this->render('post/events.html.twig', ['posts' => $postRepository->findBy(
            ['categorys' => 1],
            ['id' => 'ASC']
        )]);
    }
        /**
     * @Route("/cours", name="cours", methods="GET")
     */
    public function cours(PostRepository $postRepository): Response
    {
        return $this->render('post/cours.html.twig', ['posts' => $postRepository->findBy(
            ['categorys' => 3],
            ['id' => 'ASC']
        )]);
    }
      /**
     * @Route("/articles", name="act", methods="GET")
     */
    public function act(PostRepository $postRepository): Response
    {
        return $this->render('post/act.html.twig', ['posts' => $postRepository->findBy(
            ['categorys' => 2],
            ['id' => 'ASC']
        )]);
    }


    /**
     * @Route("/{id}", name="post_show", methods="GET")
     */
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', ['post' => $post]);
    }



}
