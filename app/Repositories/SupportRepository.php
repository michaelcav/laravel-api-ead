<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use App\Repositories\Traits\RepositoryTrait;

class SupportRepository
{


    protected $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    // public function getMySupports(array $filters = [])
    // {
    //     $filters['user'] = true;

    //     return $this->getSupports($filters);
    // }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()
            ->supports()
            ->where(function ($query) use ($filters) {
                if (isset($filters['lesson'])) {
                    $query->where('lesson_id', $filters['lesson']);
                }

                if (isset($filters['status'])) {
                    $query->where('status', $filters['status']);
                }

                if (isset($filters['filter'])) {
                    $filter = $filters['filter'];
                    $query->where('description', 'LIKE', "%{$filter}%");
                }
            })
            ->get();
    }

    private function getUserAuth(): User
    {
        return User::first();
    }
}
