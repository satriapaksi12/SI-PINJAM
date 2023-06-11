<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'nama'=> $row[0],
            'nomor_induk'=> $row[1],
            'email'=> $row[2],
            'password'=>Hash::make($row[3]) ,
            'email_verified_at'=> $row[4],
            'unit_id'=> $row[5],
            'role_id'=> $row[6],

        ]);
    }
}
