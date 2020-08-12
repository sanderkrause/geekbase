<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserSetting;
use App\Form\UserSettingFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingController extends AbstractController
{
    /**
     * @Route("/setting", name="setting")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function index(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        /** @var User $user */
        $user = $this->getUser();

        $userSettings = $user->getUserSetting();

        $userSettingsForm = $this->createForm(UserSettingFormType::class, $userSettings);
        $userSettingsForm->handleRequest($request);
        if ($userSettingsForm->isSubmitted() && $userSettingsForm->isValid()) {
            /** @var UserSetting $userSettings */
            $userSettings = $userSettingsForm->getData();
            $userSettings->setUser($user);

            $this->getDoctrine()->getManager()->persist($userSettings);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('setting');
        }

        return $this->render('setting/index.html.twig', [
            'userSettingsForm' => $userSettingsForm->createView()
        ]);
    }
}
