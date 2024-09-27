<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Creation des auteurs.
        $listAuthors = [];
        for ($i = 0; $i < 10; $i++) {
            $author = new Author();
            $author->setFirstName("Prenom " . $i);
            $author->setLastName("Nom" . $i);
            $manager->persist($author);
            $listAuthors[] = $author;
        }


        for ($i = 0; $i < 20; $i++) {
            $book = new Book();
            $book->setTitle("Book " . $i);
            $book->setCoverText("Couverture du livre qui porte le numéro " . $i);
            $book->setAuthor($listAuthors[array_rand($listAuthors)]);
            $manager->persist($book);
        }

        $manager->flush();
    }
}
