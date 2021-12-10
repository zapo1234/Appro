<?php

namespace App\Controller;

use App\Entity\Toto;
use App\Form\TotoType;
use App\Repository\TotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/toto")
 */
class TotoController extends AbstractController
{
    private $entityManager;
    private $totoRepository;
    private $paginator;

    public function __construct(EntityManagerInterface $entityManager, TotoRepository $totoRepository, 
    PaginatorInterface $paginator)
    {
         $this->entityManager = $entityManager;
         $this->totoRepository = $totoRepository;
         $this->paginator = $paginator;
    }
    
    /**
     * @Route("/", name="toto_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {   
        // recupérer  toute la lsite des totos en base données par le plus grand 
        // Mettre en place une pagination de 3 listing par page just pour améliorer en cas de dév en productio,n
           $donnees = $this->totoRepository->findBy([],['id' => 'desc']);
           $totos = $this->paginator->paginate(
            $donnees, // Requête contenant les données à paginer 
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3// Nombre de résultats par page
           );
             return $this->render('toto/index.html.twig', [
            'totos' => $totos,
        ]);
    }

    /**
     * @Route("/new", name="toto_new", methods={"GET", "POST"})
     */
    public function new(Request $request): Response
    {
        $toto = new Toto();
        $form = $this->createForm(TotoType::class, $toto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($toto);
            $this->entityManager->flush();
            // redirection sur la page listing
            return $this->redirectToRoute('toto_index');
        }

        return $this->renderForm('toto/new.html.twig', [
            'toto' => $toto,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="toto_show", methods={"GET"})
     */
    public function show(Toto $toto): Response
    {
        return $this->render('toto/show.html.twig', [
            'toto' => $toto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="toto_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Toto $toto): Response
    {
        $toto = $this->totoRepository->find($request->get('id'));
        $form = $this->createForm(TotoType::class, $toto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $this->entityManager->flush();
            
           // redirection sur la page listing après le update toto
            return $this->redirectToRoute('toto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('toto/edit.html.twig', [
            'toto' => $toto,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/delete", name="toto_delete")
     */
    public function delete(int $id): Response
    {
           // recuperation de la l'id de toto dans la table toto
            $toto = $this->totoRepository->find($id);
            // suprimer le toto de la table en base de données
            $this->entityManager->remove($toto);
            $this->entityManager->flush();
            // redirection sur la liste des totos
            return $this->redirectToRoute('toto_index');
        
      }
}
