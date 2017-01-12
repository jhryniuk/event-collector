<?php

namespace App\UserInterface\AppBundle\Controller;

use App\Application\UseCase\CreateEvent\CreateEventCommand;
use App\Application\UseCase\CreateEvent\CreateEventHandler;
use App\Application\UseCase\CreateUser\CreateUserCommand;
use App\Application\UseCase\CreateUser\CreateUserHandler;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use App\UserInterface\AppBundle\DataMappers\UserDataMapper;
use App\UserInterface\AppBundle\Entity\User;
use App\UserInterface\AppBundle\Form\UserRegisterType;
use App\UserInterface\AppBundle\Formatters\EventFormatters\EventCollectionFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $userDataMapper = $this->get('userDataMapper');
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')
            ->findAll();

        foreach ($users as $user) {
            $userDataMapper->insertUserToRegistry($user);
        }

        return $this->render('default/index.html.twig', ['users' => $users, 'userRegistry' => $this->get('userRegistry')]);
    }

    public function newUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_index');
        }

        return $this->render('default/new_user.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
