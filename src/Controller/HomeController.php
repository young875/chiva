<?php

namespace App\Controller;


use App\Entity\Contact;
use App\Entity\ContactIndex;
use App\Form\ContactIndexType;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\ProduitsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @param ContactNotification $notification
     * @return Response
     */
    public function index(Request $request, ContactNotification $notification ) :Response
    {
        $form = $this->createForm(ContactIndexType::class);
        $form->handleRequest($request);
        $contact = new ContactIndex();
        if($form->isSubmitted() && $form->isValid()){
            /*$contact->c($_POST['contact']['prenom']);
            $contact->setNom($_POST['contact']['nom']);
            $contact->setMail($_POST['contact']['mail']);
            $contact->setSujet($_POST['contact']['sujet']);
            $contact->setMessage($_POST['contact']['message']);*/
            $notification->notify($contact);
            $this->addFlash(
                "success", "Votre message à bien été envoyer"
            );
            $this->redirectToRoute('home');
        }
        return $this->render('home/index.html.twig', [
            'page' => 'home',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param ContactNotification $notification
     * @return Response
     */
    public function contact(Request $request, ContactNotification $notification ) :Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        $contact = new Contact();
        if($form->isSubmitted() && $form->isValid()){
            $contact->setTitre($_POST['contact']['titre']);
            $contact->setPrenom($_POST['contact']['prenom']);
            $contact->setNom($_POST['contact']['nom']);
            $contact->setMail($_POST['contact']['mail']);
            $contact->setTelephone($_POST['contact']['telephone']);
            $contact->setSujet($_POST['contact']['sujet']);
            $contact->setMessage($_POST['contact']['message']);
            $notification->notify($contact);
            $this->addFlash(
                "success", "Votre message à bien été envoyer"
            );
            $this->redirectToRoute('contact');
        }

        return $this->render('home/contact.html.twig', [
            'page' => 'contact',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/astuces", name="astuces")
     * @param ProduitsRepository $repo
     * @param PaginatorInterface $pagination
     * @param Request $request
     * @return Response
     */
    public function astuces(ProduitsRepository $repo, PaginatorInterface $pagination, Request $request)
    {
        $a = "astuces";
        $astuces = $pagination->paginate(
            $repo->findProdVisible($a),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('home/astuces.html.twig', [
            'page' => 'astuces',
            'astuces' => $astuces,
        ]);
    }

    /**
     * @Route("/show/{slug}", name="show")
     * @param $slug
     * @param ProduitsRepository $repo
     * @return Response
     */
    public function show($slug, ProduitsRepository $repo)
    {

        $produit = $repo->findOneBySlug($slug);
        if (!$produit){
            return $this->redirectToRoute('home');
        }
        return $this->render('home/show.html.twig', [
            'page' => 'astuces',
            'produit' => $produit
        ]);
    }

    /**
     * @Route("/produits", name="produits")
     * @param ProduitsRepository $repo
     * @param PaginatorInterface $pagination
     * @param Request $request
     * @return Response
     */
    public function produits(ProduitsRepository $repo, PaginatorInterface $pagination, Request $request)
    {
        $a = "produits";
        $produits =  $pagination->paginate(
            $repo->findProdVisible($a),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('home/produits.html.twig', [
            'page' => 'produits',
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/a-propos", name="about")
     */
    public function about()
    {
        return $this->render('home/about.html.twig', [
            'page' => 'about',
        ]);
    }

}
