<?php

namespace App\DataTables;

use App\Models\Anggotum;
use App\Models\Member;
use App\Models\Village;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AnggotaDataTable extends DataTable
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

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
            ->where('members.village_id', $this->id)
            ->addSelect('members.id', 'members.name', 'members.nik', 'members.no_hp', 'members.tps')
            ->addSelect('coordinators.name as coordinator_name', 'villages.name as village_name')
            ->orderBy('coordinators.name', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('anggota-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax(route('admin.villages.anggota', ['id' => $this->id]))
                    ->dom('lfrtip');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {

        return [
            Column::make('name')->title('Nama'),
            Column::make('nik')->title('NIK'),
            Column::make('no_hp')->title('No Handphone'),
            Column::make('coordinator_name')->title('Koordinator'),
            Column::make('village_name')->title('Gampong'),
            Column::make('tps')->title('TPS'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Anggota_' . date('YmdHis');
    }
}
