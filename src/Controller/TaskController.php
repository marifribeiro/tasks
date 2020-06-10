<?php

namespace App\Controller;

use App\Service\TaskService;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class TaskController extends AbstractController
{

    private $taskService;

    public function __construct(TaskService $taskService)
    {   
        $this->taskService = $taskService;
    }

    /**
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {   
        $task = $this->container->get('serializer')->deserialize(
            $request->getContent(),
            Task::class,
            'json'
        );
        $this->taskService->create($task);

        return  $this->json($task, 201);
    }

    /**
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        return  $this->json([]);
    }

    /**
     * @return JsonResponse
     */
    public function findById(int $id): JsonResponse
    {
        return  $this->json($this->taskService->findById($id));
    }

    /**
     * @return JsonResponse
     */
    public function findAll(): JsonResponse
    {   
        return  $this->json($this->taskService->findAll());
    }

    /**
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        return  $this->json([]);
    }

}