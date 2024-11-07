<?php

namespace App\Exports;

use App\Models\Coordinator;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoordinatorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $coordinators = Coordinator::with('members')->get();

        foreach ($coordinators->members as $coordinator) {
            foreach($coordinator->members_id as $member)
            echo $member->coordinator->name;
        }
    }
}
