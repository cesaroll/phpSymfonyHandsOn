<?php
/**
 * @author    Cesar Lopez Lerma <clopezlerma@wayfair.com>
 * @copyright 2020 Wayfair LLC - All rights reserved
 */
declare(strict_types=1);

namespace App\Controller;

use App\Service\Greeting;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @var Greeting
     */
    private Greeting $greeting;

    /**
     * Blogontroller constructor.
     *
     * @param Greeting $greeting
     */
    public function __construct(Greeting $greeting) {
        $this->greeting = $greeting;
    }


    /**
     * @Route("/", name="blog_index")
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        return $this->render(
            'base.html.twig',
            [
                'message' => $this->greeting->greet($request->get('name'))
            ]
        );
    }

}