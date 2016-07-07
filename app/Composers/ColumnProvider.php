<?php
namespace App\Composers;
use App\Models\Column;
use Illuminate\View\View;
class ColumnProvider
{
    public function compose(View $view)
    {
        $view->column = Column::defaultOrder()->get()->toTree();
    }
}