<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UsersController extends FOSRestController
{
    private $userRepository;
    private $em;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->em =$em;
    }
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
    public function getUsersAction()
       {
        $users = $this->userRepository->findAll();
        return $this->view($users);
       } // "get_users"            [GET] /users
    public function getUserAction(User $user)
       {
        return $this->view($user);  
       } // "get_user"             [GET] /users/{id}
    public function postUsersAction()
       {
        $this->em->persist($user); 
        $this->em->flush();
        return $this->view($user);
       } // "post_users"           [POST] /users
    public function putUserAction($id)
       {} // "put_user"             [PUT] /users/{id}
    public function deleteUserAction($id)
       {} // "delete_user"          [DELETE] /users/{id
}
