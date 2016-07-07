<?php
namespace App\Presenters;
use Prettus\Repository\Presenter\FractalPresenter;
class AdminUserRolePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new AdminUserRoleTransformer();
    }
}
