<?php

namespace App\DataTables;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MembersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->filterColumn('coordinator_name', function($query, $keyword) {
                $query->whereRaw('LOWER(coordinators.name) LIKE ?', ["%{$keyword}%"]);
            })
            ->filterColumn('village_name', function($query, $keyword) {
                $query->whereRaw('LOWER(villages.name) LIKE ?', ["%{$keyword}%"]);
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Member $model): QueryBuilder
    {
        return $model->newQuery()
            ->join('coordinators', 'coordinators.id', '=', 'members.coordinator_id')
            ->join('villages', 'villages.id', '=', 'members.village_id')
            ->addSelect('members.id', 'members.name', 'members.nik', 'members.no_hp', 'members.tps')
            ->addSelect('coordinators.name as coordinator_name', 'villages.name as village_name')
            ->orderBy('members.name', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('members-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->responsive(true);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('nik')->title('NIK'),
            Column::make('name')->title('Nama'),
            Column::make('no_hp')->title('No Handphone'),
            Column::make('village_name')->title('Gampong'),
            Column::make('coordinator_name')->title('Koordinator'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Members_' . date('YmdHis');
    }
}
