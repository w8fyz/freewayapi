<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class CurrentUserController extends AbstractController
{
    /*
     *
     *      NOTE :
     *   Si j'ai bien compris, les controlleurs sont interdit... Mais aucun système (d'après mes recherches)
     *   n'existe nativement dans api platform pour récupérer l'utilisateur connecté.
     *
     *
     * */


    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/api/user/me', name: 'me', methods: ['GET'])]
    public function getCurrentUser(): JsonResponse
    {
        $user = $this->security->getUser();

        if (!$user) {
            return $this->json(['message' => 'User not authenticated'], 401);
        }

        $contained = json_decode($this->json($user)->getContent(), true);
        $contained['password'] = null;
        return $this->json($contained);
    }

}