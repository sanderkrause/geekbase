<?php

namespace App\Controller;

use App\Entity\PrivacySetting;
use App\Entity\User;
use App\Form\PrivacySettingFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyController extends AbstractController
{
    /**
     * @Route("/privacy", name="privacy")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function index(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        /** @var User $user */
        $user = $this->getUser();

        $privacySettings = $user->getPrivacySetting();

        $privacySettingsForm = $this->createForm(PrivacySettingFormType::class, $privacySettings);
        $privacySettingsForm->handleRequest($request);
        if ($privacySettingsForm->isSubmitted() && $privacySettingsForm->isValid()) {
            /** @var PrivacySetting $privacySettings */
            $privacySettings = $privacySettingsForm->getData();
            $privacySettings->setUser($user);

            $this->getDoctrine()->getManager()->persist($privacySettings);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('privacy');
        }

        return $this->render('privacy/index.html.twig', [
            'privacySettingsForm' => $privacySettingsForm->createView()
        ]);
    }
}
