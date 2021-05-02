<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalMentionsController extends AbstractController
{
    /**
     * @Route("/{_locale}/mentions", name="app_mentions_language", requirements={"_locale": "en|fr"})
     */
    public function index(Request $request, $_locale): Response
    {

        if ($request->cookies->getAlpha("lang") != $_locale) {
            $request->getSession()->set('_locale', $_locale);
        }

        return $this->render('legal_mentions/index.html.twig');
    }

    /**
     * @Route("/mentions", name="app_mentions")
     */
    public function indexLanguageRedirection(Request $request): Response
    {
        if ($request->getSession()->get('_locale') == null) {
            $request->getSession()->set('_locale', $request->getDefaultLocale());
        }
        return $this->redirectToRoute("app_mentions_language", ["_locale"=>$request->getSession()->get('_locale')]);
    }
}
