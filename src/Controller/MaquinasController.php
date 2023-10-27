<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Maquinas;

class MaquinasController extends AbstractController
{
    #[Route('maquinas', name: 'app_maquinas_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        $maquinas = $entityManager->getRepository(Maquinas::class)->findAll();

        if (empty($maquinas)) {
            return new JsonResponse(['message' => 'No se encontraron maquinas'], JsonResponse::HTTP_NOT_FOUND);
        }

        $maquinasData = [];
        foreach ($maquinas as $maquina) {
            $maquinasData[] = $maquina->toArray();
        }

        return new JsonResponse(['message' => 'Maquinas encontradas', 'maquinasData' => $maquinasData], JsonResponse::HTTP_OK);
    }

    #[Route('maquinas/create', name: 'app_maquinas_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $maquina = new Maquinas();
        $maquina->setNombre($data['nombre']);
        $maquina->setTipo($data['tipo']);

        if(!$maquina){
            return new JsonResponse(['message' => 'La maquina no ha sido creada']); 
        }

        $entityManager->persist($maquina);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Maquina creada', 'maquina' => $maquina->toArray()], JsonResponse::HTTP_CREATED); 
    }

    #[Route('maquinas/show/{id}', name: 'app_maquinas_get', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $maquina = $entityManager->getRepository(Maquinas::class)->find($id);

        if (!$maquina) {
            return new JsonResponse(['message' => 'Maquina no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse(['message' => 'Maquina encontrada', 'maquina' => $maquina->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('maquinas/update/{id}', name: 'app_maquinas_update', methods: ['PUT'])]
    public function update(int $id, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $maquina = $entityManager->getRepository(Maquinas::class)->find($id);

        if (!$maquina) {
            return new JsonResponse(['message' => 'Maquina no encontrada'], JsonResponse::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        if (!isset($data['nombre'])) {
            return new JsonResponse(['message' => 'Los campos requeridos no están presentes en los datos'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $maquina->setNombre($data['nombre']);
        $maquina->setTipo($data['tipo']);

        $entityManager->persist($maquina);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Maquina actualizada', 'maquina' => $maquina->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('maquinas/delete/{id}', name: 'app_maquinas_delete', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $maquina = $entityManager->getRepository(Maquinas::class)->find($id);

        if (!$maquina) {
            return new JsonResponse(['message' => 'Maquina no encontrada'], JsonResponse::HTTP_NOT_FOUND);
        }

        $entityManager->remove($maquina);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Maquina eliminada'], JsonResponse::HTTP_OK);
    }
}
