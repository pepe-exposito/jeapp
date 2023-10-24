<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Clientes;

class ClientesController extends AbstractController
{

    #[Route('clientes', name: 'app_clientes_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        $clientes = $entityManager->getRepository(Clientes::class)->findAll();

        if (empty($clientes)) {
            return new JsonResponse(['message' => 'No se encontraron clientes'], JsonResponse::HTTP_NOT_FOUND);
        }

        $clientesData = [];
        foreach ($clientes as $cliente) {
            $clientesData[] = $cliente->toArray();
        }

        return new JsonResponse(['message' => 'Clientes encontrados', 'clientes' => $clientesData], JsonResponse::HTTP_OK);
    }

    #[Route('clientes/create', name: 'app_clientes_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $cliente = new Clientes();
        $cliente->setNombre($data['nombre']);
        $cliente->setApellido($data['apellido']);
        $cliente->setDni($data['dni']);

        if(!$cliente){
            return new JsonResponse(['message' => 'El cliente no ha sido creado', 'cliente']); 
        }

        $entityManager->persist($cliente);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Cliente creado', 'cliente' => $cliente->toArray()], JsonResponse::HTTP_CREATED); 
    }

    #[Route('clientes/show/{id}', name: 'app_clientes_get', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $cliente = $entityManager->getRepository(Clientes::class)->find($id);

        if (!$cliente) {
            return new JsonResponse(['message' => 'Cliente no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse(['message' => 'Cliente encontrado', 'cliente' => $cliente->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('clientes/update/{id}', name: 'app_clientes_update', methods: ['PUT'])]
    public function update(int $id, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $cliente = $entityManager->getRepository(Clientes::class)->find($id);

        if (!$cliente) {
            return new JsonResponse(['message' => 'Cliente no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        if (!isset($data['nombre'], $data['apellido'], $data['dni'])) {
            return new JsonResponse(['message' => 'Los campos requeridos no están presentes en los datos'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $cliente->setNombre($data['nombre']);
        $cliente->setApellido($data['apellido']);
        $cliente->setDni($data['dni']);

        $entityManager->persist($cliente);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Cliente actualizado', 'cliente' => $cliente->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('clientes/delete/{id}', name: 'app_clientes_delete', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $cliente = $entityManager->getRepository(Clientes::class)->find($id);

        if (!$cliente) {
            return new JsonResponse(['message' => 'Cliente no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        $entityManager->remove($cliente);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Cliente eliminado'], JsonResponse::HTTP_OK);
    }
    
}
