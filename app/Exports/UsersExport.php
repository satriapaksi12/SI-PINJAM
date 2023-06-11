<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $users = User::with('unit', 'role')->get();

        $data = $users->map(function ($user) {
            return [
                $user->id,
                $user->nama,
                $user->nomor_induk,
                $user->email,
                $user->email_verified_at,
                $user->created_at,
                $user->updated_at,
                $user->unit->nama_unit,
                $user->role->nama_role,
                $user->deleted_at,
            ];
        });

        $data->prepend([
            'ID',
            'Nama',
            'Nomor Induk',
            'Email',
            'Email Verified At',
            'Created At',
            'Updated At',
            'Nama Unit',
            'Nama Role',
            'Deleted At',
        ]);

        return $data;
    }
}
