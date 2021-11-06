<?php

namespace App\Repository\Core;

use App\Repository\Contracts\RepositoryInterface;
use App\Repository\Exceptions\NotEntityDefined;

class BaseRepository implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function getAll()
    {
        try {
            return $this->entity->get();
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }
    }

    public function findById(int $id)
    {
        try {
            $response = $this->entity->find($id);
            if(!$response) 
                $response = ['error' => true, 'message' => 'Register not found!'];
        } catch (\Exception $exception) {
            $response = ['error' => true, 'message' => $exception->getMessage()];
        }
        return $response;
    }

    public function findWhere($column, $value)
    {
        try {
            return $this->entity->where($column, $value)->get();
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }
    }

    public function findWhereFirst($column, $value)
    {
        try {
            return $this->entity->where($column, $value)->first();
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }
    }

    public function paginate($totalPage = 10)
    {
        try {
            return $this->entity->paginate($totalPage);
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }
    }

    public function store(array $data)
    {
        try {
            $this->entity->firstOrCreate($data);
            return ['success' => true, 'message' => 'Record entered successfully!'];
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }
    }

    public function update(object $entity, array $data)
    {
        try {
            $entity->update($data);
            return ['success' => true, 'message' => 'Record updated successfully!'];
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }
    }

    public function destroy(object $entity)
    {
        try {
            $entity->delete();
            return ['success' => true, 'message' => 'Record deleted successfully!'];
        } catch (\Exception $exception) {
            return ['error' => true, 'message' => $exception->getMessage()];
        }

    }

    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NotEntityDefined;
        }

        return app($this->entity());
    }
}