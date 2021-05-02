<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/{_locale}/portfolio", name="app_portfolio_language", requirements={"_locale": "en|fr"})
     */
    public function index(Request $request, $_locale): Response
    {

        if ($request->cookies->getAlpha("lang") != $_locale) {
            $request->getSession()->set('_locale', $_locale);
        }

        return $this->render('portfolio/index.html.twig');
    }

    /**
     * @Route("/portfolio", name="app_portfolio")
     */
    public function indexLanguageRedirection(Request $request): Response
    {
        if ($request->getSession()->get('_locale') == null) {
            $request->getSession()->set('_locale', $request->getDefaultLocale());
        }
        return $this->redirectToRoute("app_portfolio_language", ["_locale"=>$request->getSession()->get('_locale')]);
    }
}
