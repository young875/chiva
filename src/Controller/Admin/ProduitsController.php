<?php

namespace App\Controller\Admin;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/admin/produits/add", name="admin_add")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $manager):Response
    {
        $produit = new Produits();

        $form = $this->createForm(ProduitsType::class, $produit);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $produit->setStatue(0);
            $manager->persist($produit);
            $manager->flush();
            $this->addFlash(
                "success", "Le type de boite <strong>{$produit->getNom()} </strong> a bien été enrégistrée!"
            );
            return $this->redirectToRoute('admin_produits');
        }

        return $this->render('admin/produits/add.html.twig', [

            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/produits", name="admin_produits")
     * @param ProduitsRepository $produits
     * @return Response
     */
    public function produits( ProduitsRepository $produits):Response
    {
        $produits = $produits->findAll();

        return $this->render('admin/produits/index.html.twig', [

            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/admin/delete/{id}", name="admin_produit_delete")
     * @param Produits $produits
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(Produits $produits, EntityManagerInterface $manager):Response
    {
        $manager->remove($produits);
        $manager->flush();

        $this->addFlash(
            "danger", "Le produit <strong>{$produits->getNom()} </strong> a bien été supprimer!"
        );
        return $this->redirectToRoute('admin_produits');
    }

    /**
     * @Route("/admin/send/{id}", name="admin_produit_send")
     * @param Produits $produits
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function send(Produits $produits, EntityManagerInterface $manager):Response
    {
        if ($produits->getStatue() == 0){
            $produits->setStatue(1);
            $this->addFlash(
                "success", "Le produit <strong>{$produits->getNom()} </strong> a bien été publier sur votre site!"
            );
        }else{
            $this->addFlash(
                "warning", "Le produit <strong>{$produits->getNom()} </strong> a bien été retiré de votre site!"
            );
            $produits->setStatue(0);
        }

        $manager->persist($produits);
        $manager->flush();


        return $this->redirectToRoute('admin_produits');
    }

    /**
     * @Route("/admin/update/{id}", name="admin_produit_update")
     * @param Produits $produits
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function update(Produits $produits, Request $request, EntityManagerInterface $manager):Response
    {
        $form = $this->createForm(ProduitsType::class, $produits);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($produits);
            $manager->flush();
            $this->addFlash(
                "success", "Le produit <strong>{$produits->getNom()} </strong> a bien été modifier!"
            );

            return $this->redirectToRoute('admin_produits');
        }
        return $this->render('admin/produits/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
