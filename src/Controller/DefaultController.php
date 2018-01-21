<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/default/{id}", name="default")
     */
    public function index(Author $author)
    {
        $em = $this->getDoctrine()->getManager();

        //$books = $em->getRepository(Book::class)->findBy(['author' => $author]);

        echo $author->getFullname();

        foreach ($author->getBooks() as $book) {
            echo $book->getTitle();
        }
        die;

        /*
        $pierre = $em->getRepository(Author::class)->find(4);

        $book = new Book();
        $book->setTitle("Batbook");
        $book->setImage("batman.jpg");
        $book->setSlug("batman-book");
        $book->setCreatedAt(new \DateTime());
        $book->setAuthor($pierre);

        $em->persist($book);
        $em->flush();
        */

        /*
        $results = $em->getRepository(Author::class)->searchLike('Pi');
        foreach ($results as $result) {
            echo $result->getFullname();
        }
        die;
        */

        return new Response('Welcome to your new controller!');
    }
}
