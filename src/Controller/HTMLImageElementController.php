<?php

namespace App\Controller;

use App\Dto\HTMLImageElementDto;
use App\Entity\HTMLImageElement;
use App\Form\HTMLImageElementType;
use App\Repository\HTMLImageElementRepository;
use App\Service\HTMLImageElementService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/html-image-element')]
class HTMLImageElementController extends AbstractController
{
    private HTMLImageElementService $service;

    public function __construct(HTMLImageElementService $service)
    {
        $this->service = $service;
    }

    #[Route('/', name: 'html_image_element', methods: ['GET'])]
    public function index(HTMLImageElementRepository $repository): Response
    {
        return $this->render('html_image_element/index.html.twig', [
            'html_image_elements' => $repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'html_image_element.create', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $HTMLImageElementDto = new HTMLImageElementDto();
        $form = $this->createForm(HTMLImageElementType::class, $HTMLImageElementDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $HTMLImageElement = $this->service->convertDtoToEntity($HTMLImageElementDto);
            $entityManager->persist($HTMLImageElement);
            $entityManager->flush();

            return $this->redirectToRoute('html_image_element', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('html_image_element/new.html.twig', [
            'html_image_element' => $HTMLImageElementDto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'html_image_element.show', methods: ['GET'])]
    public function show(HTMLImageElement $HTMLImageElement): Response
    {
        return $this->render('html_image_element/show.html.twig', [
            'html_image_element' => $this->service->convertEntityToDto($HTMLImageElement),
        ]);
    }

    #[Route('/{id}/edit', name: 'html_image_element.edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HTMLImageElement $HTMLImageElement, EntityManagerInterface $entityManager): Response
    {
        $HTMLImageElementDto = $this->service->convertEntityToDto($HTMLImageElement);
        $form = $this->createForm(HTMLImageElementType::class, $HTMLImageElementDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->service->convertDtoToEntity($HTMLImageElementDto, $HTMLImageElement);
            $entityManager->flush();

            return $this->redirectToRoute('html_image_element', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('html_image_element/edit.html.twig', [
            'html_image_element' => $HTMLImageElementDto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'html_image_element.delete', methods: ['POST'])]
    public function delete(Request $request, HTMLImageElement $HTMLImageElement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$HTMLImageElement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($HTMLImageElement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('html_image_element', [], Response::HTTP_SEE_OTHER);
    }
}
