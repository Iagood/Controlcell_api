<?php

namespace App\Repository\Contracts;

interface RepositoryInterface
{
    public function getAll();

    public function findById(int $id);

    public function findWhere($column, $value);

    public function findWhereFirst($column, $value);

    public function paginate($totalPage);

    public function store(array $data);

    public function update(object $entity, array $data);

    public function destroy(object $entity);
}