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
        return $this->enity->get();
    }

    public function findById(int $id)
    {
        return $this->enity->find($id);
    }

    public function findWhere($column, $value)
    {
        return $this->entity->where($column, $value)->get();
    }

    public function findWhreFirst($column, $value)
    {
        return $this->entity->where($column, $value)->first();
    }

    public function paginate($totalPage = 10)
    {
        return $this->enity->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->enity->create($data);
    }

    public function update(int $id, array $data)
    {
        $enity = $this->findById($id);
        return $enity->update($data);
    }

    public function destroy(int $id)
    {
        return $this->findById($id)->delete();

    }

    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NotEntityDefined;
        }

        return app($this->entity());
    }
}