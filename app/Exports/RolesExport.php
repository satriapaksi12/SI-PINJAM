<?php

namespace App\Exports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;

class RolesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $roles = Role::all();

        $data = $roles->map(function ($role) {
            return [
                $role->id,
                $role->nama_role,
                $role->created_at,
                $role->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Nama Role',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
