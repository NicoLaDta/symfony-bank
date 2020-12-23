<?php

namespace App\Controller;

use App\Entity\UserBankAccount;
use App\Form\UserBankAccountType;
use App\Repository\UserBankAccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/bank/account")
 */
class UserBankAccountController extends AbstractController
{
    /**
     * @Route("/", name="user_bank_account_index", methods={"GET"})
     */
    public function index(UserBankAccountRepository $userBankAccountRepository): Response
    {
        return $this->render('user_bank_account/index.html.twig', [
            'user_bank_accounts' => $userBankAccountRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_bank_account_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userBankAccount = new UserBankAccount();
        $form = $this->createForm(UserBankAccountType::class, $userBankAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userBankAccount);
            $entityManager->flush();

            return $this->redirectToRoute('user_bank_account_index');
        }

        return $this->render('user_bank_account/new.html.twig', [
            'user_bank_account' => $userBankAccount,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_bank_account_show", methods={"GET"})
     */
    public function show(UserBankAccount $userBankAccount): Response
    {
        return $this->render('user_bank_account/show.html.twig', [
            'user_bank_account' => $userBankAccount,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_bank_account_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserBankAccount $userBankAccount): Response
    {
        $form = $this->createForm(UserBankAccountType::class, $userBankAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_bank_account_index');
        }

        return $this->render('user_bank_account/edit.html.twig', [
            'user_bank_account' => $userBankAccount,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_bank_account_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserBankAccount $userBankAccount): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userBankAccount->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userBankAccount);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_bank_account_index');
    }
}
