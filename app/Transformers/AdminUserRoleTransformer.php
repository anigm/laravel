<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\AdminUserRole;
class AdminUserRoleTransformer extends TransformerAbstract
{
    public function transform(AdminUserRole $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}