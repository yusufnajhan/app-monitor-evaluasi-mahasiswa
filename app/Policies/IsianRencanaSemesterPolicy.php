<?php

namespace App\Policies;

use App\Models\IsianRencanaSemester;
use App\Models\User;
use GuzzleHttp\Promise\Is;
use Illuminate\Auth\Access\Response;

class IsianRencanaSemesterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Cek apakah pengguna adalah mahasiswa yang memiliki IRs tersebut
        if ($user->role === 'mahasiswa') {
            if (route('mahasiswa.irs.index', $user->mahasiswa->nim) === url()->current()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, IsianRencanaSemester $isianRencanaSemester): bool
    {
        // Cek apakah pengguna adalah mahasiswa yang memiliki IRs tersebut
        if ($user->role === 'mahasiswa' && $user->mahasiswa->id === $isianRencanaSemester->mahasiswa_id) {
            return true;
        }

        // Cek apakah pengguna adalah dosen wali dari mahasiswa yang memiliki IRs tersebut
        if ($user->role === 'dosenWali' && $user->dosenWali->id === $isianRencanaSemester->mahasiswa->dosen_wali_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, IsianRencanaSemester $isianRencanaSemester): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, IsianRencanaSemester $isianRencanaSemester): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, IsianRencanaSemester $isianRencanaSemester): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, IsianRencanaSemester $isianRencanaSemester): bool
    {
        //
    }
}
