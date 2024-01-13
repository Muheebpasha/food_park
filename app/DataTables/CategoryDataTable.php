<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
                    ->addColumn('action', function($query){
                        $edit = "<a href='".route('admin.category.edit',$query->id)."' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                        $delete = "<a href='".route('admin.category.destroy',$query->id)."' class='btn btn-danger delete-item ml-2'><i class='fas fa-trash-alt'></i></a>";
                        return $edit.$delete;
                    })
                    ->addColumn('show_at_home',function($query){
                        if($query->show_at_home === 1)
                            return  '<span class="badge badge-primary">Yes</span>';
                        else
                            return '<span class="badge badge-danger">No</span>';
                    })
                    ->addColumn('status',function($query){
                        if($query->status === 1)
                            return  '<span class="badge badge-primary">Active</span>';
                        else
                            return '<span class="badge badge-danger">InActive</span>';
                    })
                    ->rawColumns(['action','show_at_home','status'])
                    ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('name'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(150)
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
