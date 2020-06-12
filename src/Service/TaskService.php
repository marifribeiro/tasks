<?php 

namespace App\Service;

use App\Repository\TaskRepository;
use App\Entity\Task;

class TaskService
{

    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

   public function create(Task $task): void
   {
        $this->taskRepository->save($task);
   }

   public function findById(int $id) 
   {
       return $this->taskRepository->find($id);
   }

   public function findAll()
   {
       return $this->taskRepository->findAll();
   }

   public function update(Task $task)
   {
       return $this->taskRepository->save($task);
   }

   public function delete(int $id)
   {
       $this->taskRepository->delete($this->findById(($id)));
   }

}