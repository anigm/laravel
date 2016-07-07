<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\Permission;
class PermissionTransformer extends TransformerAbstract
{
    public function transform(Permission $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}