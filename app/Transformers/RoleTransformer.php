<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\Role;
class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}