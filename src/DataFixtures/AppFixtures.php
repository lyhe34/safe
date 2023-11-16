<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Directory;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("luc.eymard@live.fr");
        $user->setPassword(password_hash("123456", PASSWORD_BCRYPT));

        $root = new Directory();
        $documents = new Directory();
        $images = new Directory();
        $videos = new Directory();
        $musics = new Directory();

        $root->setName("root");
        $root->setPath("");
        $root->setOwner($user);

        $documents->setName("Documents");
        $documents->setPath("Documents");
        $documents->setOwner($user);

        $images->setName("Images");
        $images->setPath("Documents/Images");
        $images->setOwner($user);

        $videos->setName("Videos");
        $videos->setPath("Documents/Videos");
        $videos->setOwner($user);

        $musics->setName("Musics");
        $musics->setPath("Documents/Musics");
        $musics->setOwner($user);

        $root->addDirectory($documents);

        $documents->addDirectory($images);
        $documents->addDirectory($videos);
        $documents->addDirectory($musics);

        $manager->persist($user);
        $manager->persist($root);
        $manager->persist($documents);
        $manager->persist($images);
        $manager->persist($videos);
        $manager->persist($musics);

        $manager->flush();
    }
}
