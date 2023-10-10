<?php

namespace App\Traits;

use Ramsey\Uuid\Exception\UuidExceptionInterface;
use Ramsey\Uuid\Uuid as Generator;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->id = Generator::uuid4()->toString();
            } catch (UuidExceptionInterface $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}