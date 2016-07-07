<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\AdminUserRepositoryEloquent;
use App\Http\Requests\Admin\AdminUser\CreateRequest;
use App\Http\Requests\Admin\AdminUser\UpdateRequest;
use Breadcrumbs, Toastr;
class AdminUserController extends BaseController
{
    protected $adminUser;
    protected $adminUserRole;
    public function __construct(AdminUserRepositoryEloquent $adminUser)
    {
        parent::__construct();
        $this->adminUser = $adminUser;
        Breadcrumbs::setView('admin._partials.breadcrumbs');
        Breadcrumbs::register('admin-user', function ($breadcrumbs)
        {
            $breadcrumbs->parent('dashboard');
            $breadcrumbs->push('用户管理', route('admin.admin_user.index'));
        });
    }
    public function index()
    {
        Breadcrumbs::register('admin-user-index', function ($breadcrumbs)
        {
            $breadcrumbs->parent('admin-user');
            $breadcrumbs->push('用户列表', route('admin.admin_user.index'));
        });
        $users = $this->adminUser->paginate(10);
        return view('admin.rbac.admin_users.index', compact('users'));
    }
    public function create()
    {
        Breadcrumbs::register('admin-user-create', function ($breadcrumbs)
        {
            $breadcrumbs->parent('admin-user');
            $breadcrumbs->push('添加用户', route('admin.admin_user.create'));
        });
        return view('admin.rbac.admin_users.create');
    }
    public function store(CreateRequest $request)
    {
        $result = $this->adminUser->store($request->all());
        if(!$result)
        {
            Toastr::error('新用户添加失败!');
            return redirect(route('admin.admin_user.create'));
        }
        Toastr::success('新用户添加成功!');
        return redirect('admin/admin_user');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        Breadcrumbs::register('admin-user-edit', function ($breadcrumbs) use ($id)
        {
            $breadcrumbs->parent('admin-user');
            $breadcrumbs->push('编辑用户', route('admin.admin_user.edit', ['id' => $id]));
        });
        $user = $this->adminUser->find($id);
        $hasRoles = $user->roles()->lists('name')->toArray();
        return view('admin.rbac.admin_users.edit', compact('user', 'hasRoles'));
    }
    public function update(UpdateRequest $request, $id)
    {
        $result = $this->adminUser->update($request->all(), $id);
        if(!$result['status'])
        {
            Toastr::error($result['msg']);
        }
        else
        {
            Toastr::success('用户更新成功');
        }
        return redirect(route('admin.admin_user.edit', ['id' => $id]));
    }
    public function destroy($id)
    {
        $result = $this->adminUser->delete($id);
        return response()->json($result ? ['status' => 1] : ['status' => 0]);
    }
    public function destoryAll(Request $request)
    {
        if(!($ids = $request->get('ids', [])))
        {
            return response()->json(['status' => 0, 'msg' => '请求参数错误']);
        }
        foreach($ids as $id)
        {
            $result = $this->adminUser->delete($id);
        }
        return response()->json($result ? ['status' => 1] : ['status' => 0]);
    }
}
