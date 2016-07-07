<?php
namespace App\Presenters;
use App\Transformers\AdminUserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;
class AdminUserPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new AdminUserTransformer();
    }
}