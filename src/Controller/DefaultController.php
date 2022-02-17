<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\GiftService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(ManagerRegistry $doctrine, GiftService $giftService, Request $request, SessionInterface $session): Response
    {
        $databaseUsers = $doctrine->getRepository(User::class)->findAll();
        // exit($request->cookies->get('PHPSESSID'));
        // $session->set('name', 'session_value');
        // $session->clear();
        // if ($session->has('name')) {
        // exit($session->get('name'));
        //  }

        // $cookie = new Cookie('my_cookie','cookie_value',time() + 2 * 365 * 24 * 60 * 60);
        // $response = new Response();
        // $response->headers->setCookie($cookie);
        // $response->send();
        // $res = new Response();
        // $res->headers->clearCookie('my_cookie');
        // $res->send();

        // $this->addFlash('notice', 'Your changes were saved!');

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $databaseUsers,
            'random_gift' => $giftService->gifts,
        ]);
    }

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function index2()
    {
        return new Response('Optional parameters in URL and requirements for parameters');
    }

    /**
     * @Route(
     *     "/articles/{_locale}/",
     *     locale="en",
     *     format="html",
     *     requirements={
     *         "_locale": "en|fr",
     *         "_format": "html|xml",
     *     }
     * )
     */
    public function index3()
    {
        return new Response('This is an advanced route');
    }
}
