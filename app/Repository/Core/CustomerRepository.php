<?php

namespace App\Repository\Core;

use App\Models\Customer;
use App\Repository\Core\BaseRepository;
use App\Repository\Contracts\CustomerRepositoryInterface;

class CustomerRepository extends BaseRepository implements  CustomerRepositoryInterface
{
    public function entity()
    {
        return Customer::class;
    }
}
