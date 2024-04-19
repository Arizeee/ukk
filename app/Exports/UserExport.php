<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->username,
            $user->email,
            $user->name_lengkap,
            $user->alamat,
            $user->role,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Username',
            'Email',
            'Nama Lengkap',
            'Alamat',
            'Role',
        ];
    }
}
