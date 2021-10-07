<?php

namespace App\Repository\Contracts;

interface RepositoryInterface
{
    public function getAll();

    public function findById(int $id);

    public function findWhere($column, $value);

    public function findWhreFirst($column, $value);

    public function paginate($totalPage = 10);

    public function store(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}