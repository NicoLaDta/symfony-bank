<?php

namespace App\Controller;

use App\Entity\BankAccount;
use App\Form\BankAccountType;
use App\Repository\BankAccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bank/account")
 */
class BankAccountController extends AbstractController
{
    /**
     * @Route("/", name="bank_account_index", methods={"GET"})
     */
    public function index(BankAccountRepository $bankAccountRepository): Response
    {
        return $this->render('bank_account/index.html.twig', [
            'bank_accounts' => $bankAccountRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bank_account_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bankAccount = new BankAccount();
        $form = $this->createForm(BankAccountType::class, $bankAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bankAccount);
            $entityManager->flush();

            return $this->redirectToRoute('bank_account_index');
        }

        return $this->render('bank_account/new.html.twig', [
            'bank_account' => $bankAccount,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bank_account_show", methods={"GET"})
     */
    public function show(BankAccount $bankAccount): Response
    {
        return $this->render('bank_account/show.html.twig', [
            'bank_account' => $bankAccount,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bank_account_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BankAccount $bankAccount): Response
    {
        $form = $this->createForm(BankAccountType::class, $bankAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bank_account_index');
        }

        return $this->render('bank_account/edit.html.twig', [
            'bank_account' => $bankAccount,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bank_account_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BankAccount $bankAccount): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bankAccount->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bankAccount);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bank_account_index');
    }
}
