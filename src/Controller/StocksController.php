<?php

namespace App\Controller;

use App\Entity\Stocks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StocksController extends AbstractController
{
    #[Route('/stocks', name: 'stocks_index')]
    public function index($message): Response
    {
        return $this->render('stocks/index.html.twig', [
            'controller_name' => 'StocksController',
        ]);
    }

    #[Route('/stocks/create', name: 'stocks_create')]
    public function create(): Response
    {
        return $this->render('stocks/create_form.html.twig', [
            'controller_name' => 'StocksController',
        ]);
    }


    #[Route('/stocks', name: 'stocks_store')]
    public function store(ValidatorInterface $validator): Response
    {
        $stocks = new Stocks();

        $errors = $validator->validate($stocks);

        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return $this->index('Success');
    }

    #[Route('/stocks/edit', name: 'stocks_edit')]
    public function edit(): Response
    {
        return $this->render('stocks/edit_form.html.twig', [
            'controller_name' => 'StocksController',
        ]);
    }

    #[Route('/stocks', name: 'stocks_update')]
    public function update(ValidatorInterface $validator): Response
    {
        $stocks = new Stocks();

        $errors = $validator->validate($stocks);

        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return $this->index('Success');
    }

    #[Route('/stocks', name: 'stocks_destroy')]
    public function destroy(ValidatorInterface $validator): Response
    {
        $stocks = new Stocks();

        $errors = $validator->validate($stocks);

        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return $this->index('Success');
    }
}
