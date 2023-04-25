<?php

// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new TemplatedEmail())
            ->from('hello@example.com')
            // ->to(new Address('you@example.com', 'Bob'))
            // ->cc('cc@example.com')
            // ->bcc('bcc@example.com')
            // ->replyTo('fabien@example.com')
            // ->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->htmlTemplate ('emails/emails.html.twig')
            ->context([
                'username' => 'foo',
            ])
            ->addPart(new DataPart(fopen($this->getParameter('kernel.project_dir').'/public/interface/notFound.jpg', 'r'),'notFoun.jpg','image/jpeg'));

        $mailer->send($email);

        return new Reponse('sent');
    }
}