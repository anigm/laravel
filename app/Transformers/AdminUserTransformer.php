<?php
namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Models\AdminUser;
class AdminUserTransformer extends TransformerAbstract
{
    public function transform(AdminUser $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}