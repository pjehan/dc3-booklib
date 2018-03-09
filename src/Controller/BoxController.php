<?php

namespace App\Controller;

use App\Entity\Box;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BoxController
 * @package App\Controller
 * @Route("/box")
 */
class BoxController extends Controller
{
    /**
     * @Route("/suggest", name="box_suggest")
     * @Method({"GET", "POST"})
     */
    public function index(Request $request)
    {
        $box = new Box();

        $form = $this->createFormBuilder($box)
            ->add('address')
            ->add('zipcode')
            ->add('city')
            ->add('comment')
            ->add('latitude')
            ->add('longitude')
            ->add('save', SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $box = $form->getData();
            $em->persist($box);
            $em->flush();
        }

        return $this->render('box/suggest.html.twig', ['form' => $form->createView()]);
    }
}










