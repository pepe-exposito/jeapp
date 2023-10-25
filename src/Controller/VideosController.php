<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Videos;

class VideosController extends AbstractController
{
    #[Route('videos', name: 'app_videos_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        $videos = $entityManager->getRepository(Videos::class)->findAll();

        if (empty($videos)) {
            return new JsonResponse(['message' => 'No se encontraron videos'], JsonResponse::HTTP_NOT_FOUND);
        }

        $videosData = [];
        foreach ($videos as $video) {
            $videosData[] = $video->toArray();
        }

        return new JsonResponse(['message' => 'Videos encontrados', 'videosData' => $videosData], JsonResponse::HTTP_OK);
    }

    #[Route('videos/create', name: 'app_videos_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $video = new Videos();
        $video->setNombre($data['nombre']);
        $video->setDuracion();

        if(!$video){
            return new JsonResponse(['message' => 'El video no ha sido creado']); 
        }

        $entityManager->persist($video);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Video creado', 'video' => $video->toArray()], JsonResponse::HTTP_CREATED); 
    }

    #[Route('videos/show/{id}', name: 'app_videos_get', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $video = $entityManager->getRepository(Videos::class)->find($id);

        if (!$video) {
            return new JsonResponse(['message' => 'Video no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse(['message' => 'Video encontrado', 'video' => $video->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('videos/update/{id}', name: 'app_videos_update', methods: ['PUT'])]
    public function update(int $id, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $video = $entityManager->getRepository(Videos::class)->find($id);

        if (!$video) {
            return new JsonResponse(['message' => 'Video no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        if (!isset($data['nombre'])) {
            return new JsonResponse(['message' => 'Los campos requeridos no están presentes en los datos'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $video->setNombre($data['nombre']);

        $entityManager->persist($video);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Video actualizado', 'video' => $video->toArray()], JsonResponse::HTTP_OK);
    }

    #[Route('videos/delete/{id}', name: 'app_videos_delete', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $video = $entityManager->getRepository(Videos::class)->find($id);

        if (!$video) {
            return new JsonResponse(['message' => 'Video no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        $entityManager->remove($video);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Video eliminado'], JsonResponse::HTTP_OK);
    }
}
