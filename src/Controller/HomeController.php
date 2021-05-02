<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="app_home_language", requirements={"_locale": "en|fr"})
     */
    public function index(Request $request, $_locale): Response
    {

        if ($request->cookies->getAlpha("lang") != $_locale) {
            $request->getSession()->set('_locale', $_locale);
        }

        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/", name="app_home")
     */
    public function indexLanguageRedirection(Request $request): Response
    {
        if ($request->getSession()->get('_locale') == null) {
            $request->getSession()->set('_locale', $request->getDefaultLocale());
        }
        return $this->redirectToRoute("app_home_language", ["_locale"=>$request->getSession()->get('_locale')]);
    }
}
