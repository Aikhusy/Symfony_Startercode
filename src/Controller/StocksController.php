<?php

namespace App\Controller;

use App\Entity\Stocks;
use App\Form\StocksType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class StocksController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/stocks', name: 'stocks_index')]
    public function index(): Response
    {

        $stocks = $this->em->getRepository(Stocks::class)->findAll();
        
        $companyNames = [];
        foreach ($stocks as $stock) {
            $companyName = $stock->getFkCompany()->getName(); // Assuming "getName()" is the method to get the company name
            $companyNames[] = $companyName;
        }

        return $this->render('stocks/index.html.twig', [
            'stocks' => $stocks,
            'companyNames' => $companyNames
        ]);
    }

    #[Route('/stocks/create', name: 'stocks_create')]
    public function create(Request $request): Response
    {
        $stock= new Stocks();
        
        $stockForm= $this->createForm(StocksType::class,$stock);
        $stockForm->handleRequest($request);
        
        if($stockForm->isSubmitted() && $stockForm->isValid()){
            $stock = $stockForm->getData();
            $stock->setDeleted(false);
            $stock->setUpdatedAt(new \DateTimeImmutable());
            $stock->setCreatedAt(new \DateTimeImmutable());

            $this->em->persist($stock);
            $this->em->flush();

            return $this->redirectToRoute('stocks_index');
        }

        
        return $this->render('stocks/form_create.html.twig', [
            'form' => $stockForm->createView(),
        ]);
    }


    #[Route('/stocks/update/{id}', name: 'stocks_update')]
    public function update(Request $request, Stocks $oldStock): Response
    {
        // dd($oldStock);
        $stockForm= $this->createForm(StocksType::class,$oldStock);
        $stockForm->handleRequest($request);
        
        if($stockForm->isSubmitted() && $stockForm->isValid()){
            $stock = $stockForm->getData();
            $stock->setDeleted(false);
            $stock->setUpdatedAt(new \DateTimeImmutable());

            $this->em->persist($stock);
            $this->em->flush();

            return $this->redirectToRoute('stocks_index');
        }

        
        return $this->render('stocks/form_create.html.twig', [
            'form' => $stockForm->createView(),
        ]);
    }


}
