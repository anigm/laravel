<?php
namespace App\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AdminUserRoleRepository;
use App\Models\AdminUserRole;
class AdminUserRoleRepositoryEloquent extends BaseRepository implements AdminUserRoleRepository
{
    public function model()
    {
        return AdminUserRole::class;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}