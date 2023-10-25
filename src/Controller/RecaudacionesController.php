<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recaudaciones;

class RecaudacionesController extends AbstractController
{
    #[Route('recaudaciones', name: 'app_recaudaciones_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        $recaudacion = $entityManager->getRepository(Maquinas::class)->findAll();

        if (empty($recaudacion)) {
            return new JsonResponse(['message' => 'No se encontraron maquinas'], JsonResponse::HTTP_NOT_FOUND);
        }

        $maquinasData = [];
        foreach ($recaudaciones as $recaudacion) {
            $recaudacionesData[] = $recaudacion->toArray();
        }

        return new JsonResponse(['message' => 'Recaudaciones encontradas', 'recaudacionesData' => $recaudacionesData], JsonResponse::HTTP_OK);
    }

    #[Route('recaudaciones/create', name: 'app_recaudaciones_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $recaudacion = new Recaudaciones();
        $recaudacion->setFecha();
        $recaudacion->setCantidad($data['cantidad']);

        if(!$recaudacion){
            return new JsonResponse(['message' => 'La maquina no ha sido creada']); 
        }

        $entityManager->persist($recaudacion);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Recaudacion creada', 'recaudacion' => $recaudacion->toArray()], JsonResponse::HTTP_CREATED); 
    }

    #[Route('recaudaciones/show/{id}', name: 'app_recaudaciones_get', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $recaudacion = $entityManager->getRepository(Recaudaciones::class)->find($id);

        if (!$recaudacion) {
            return new JsonResponse(['message' => 'Recaudacion no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse(['message' => 'Recaudacion encontrada', 'recaudacion' => $recaudacion->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('recaudaciones/update/{id}', name: 'app_recaudaciones_update', methods: ['PUT'])]
    public function update(int $id, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $recaudacion = $entityManager->getRepository(Recaudaciones::class)->find($id);

        if (!$recaudacion) {
            return new JsonResponse(['message' => 'Recaudacion no encontrada'], JsonResponse::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        if (!isset($data['nombre'])) {
            return new JsonResponse(['message' => 'Los campos requeridos no están presentes en los datos'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $recaudacion->setFecha($data['fecha']);
        $recaudacion->setCantidad($data['cantidad']);

        $entityManager->persist($recaudacion);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Recaudacion actualizada', 'recaudacion' => $recaudacion->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('recaudaciones/delete/{id}', name: 'app_recaudaciones_delete', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $recaudaciones = $entityManager->getRepository(Recaudaciones::class)->find($id);

        if (!$recaudaciones) {
            return new JsonResponse(['message' => 'Recaudacion no encontrada'], JsonResponse::HTTP_NOT_FOUND);
        }

        $entityManager->remove($recaudacion);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Recaudacion eliminada'], JsonResponse::HTTP_OK);
    }
}
