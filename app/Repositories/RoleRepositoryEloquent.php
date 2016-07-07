<?php
namespace App\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoleRepository;
use App\Models\Role;
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    public function model()
    {
        return Role::class;
    }
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function delete($id)
    {
        $role = $this->model->find($id);
        if(!$role)
        {
            return false;
        }
        $role->users()->detach();
        return parent::delete($id);
    }
    public function update(array $attributes, $id)
    {
        $isAble = $this->model->where('id', '<>', $id)->where('name', $attributes['name'])->count();
        if($isAble)
        {
            return [
                'status' => false,
                'msg' => '角色名已被使用'
            ];
        }
        $data = [];
        $data['name'] = $attributes['name'];
        $data['display_name'] = $attributes['display_name'];
        $data['description'] = $attributes['description'];
        $result = parent::update($data, $id);
        if(!$result)
        {
            return [
                'status' => false,
                'msg' => '角色更新失败'
            ];
        }
        return ['status' => true];
    }
    public function savePermissions($id, $perms = [])
    {
        $role = $this->model->find($id);
        $role->perms()->sync($perms);
        return true;
    }
    public function rolePermissions($id)
    {
        $perms = [];
        $permissions = $this->model->find($id)->perms()->get();
        foreach ($permissions as $item)
        {
            $perms[$item->id] = $item->name;
        }
        return $perms;
    }
}