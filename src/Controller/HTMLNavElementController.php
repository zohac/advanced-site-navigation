<?php

namespace App\Controller;

use App\Dto\HTMLNavElementDto;
use App\Entity\HTMLNavElement;
use App\Form\HTMLNavElementType;
use App\Repository\HTMLNavElementRepository;
use App\Service\HTMLNavElementService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/html-nav-element')]
class HTMLNavElementController extends AbstractController
{
    private HTMLNavElementService $service;

    public function __construct(HTMLNavElementService $service)
    {
        $this->service = $service;
    }

    #[Route('/', name: 'html_nav_element.index', methods: ['GET'])]
    public function index(HTMLNavElementRepository $HTMLNavElementRepository): Response
    {
        return $this->render('html_nav_element/index.html.twig', [
            'html_nav_elements' => $HTMLNavElementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'html_nav_element.new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $HTMLNavElementDto = new HTMLNavElementDto();
        $form = $this->createForm(HTMLNavElementType::class, $HTMLNavElementDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $HTMLNavElement = $this->service->convertDtoToEntity($HTMLNavElementDto);
            dump($HTMLNavElementDto, $HTMLNavElement);
            $entityManager->persist($HTMLNavElement);
            $entityManager->flush();

            return $this->redirectToRoute('html_nav_element.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('html_nav_element/new.html.twig', [
            'html_nav_element' => $HTMLNavElementDto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'html_nav_element.show', methods: ['GET'])]
    public function show(HTMLNavElement $HTMLNavElement): Response
    {
        dump($HTMLNavElement->getContent());
        return $this->render('html_nav_element/show.html.twig', [
            'html_nav_element' => $HTMLNavElement,
        ]);
    }

    #[Route('/{id}/edit', name: 'html_nav_element.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HTMLNavElement $HTMLNavElement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HTMLNavElementType::class, $HTMLNavElement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('html_nav_element.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('html_nav_element/edit.html.twig', [
            'html_nav_element' => $HTMLNavElement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'html_nav_element.delete', methods: ['POST'])]
    public function delete(Request $request, HTMLNavElement $HTMLNavElement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$HTMLNavElement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($HTMLNavElement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('html_nav_element.index', [], Response::HTTP_SEE_OTHER);
    }
}
