<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'mat_code' => ['nullable', 'string', 'max:255'], // Adicione esta linha para validar o campo mat_code
            'admission' => ['nullable', 'date'], // Campo admission
            'birth_date' => ['nullable', 'date'], // Campo birth_date
            'ramal' => ['nullable', 'string', 'max:255'], // Campo ramal
            'branche_id' => ['nullable', 'integer', 'exists:branches,id'], // Campo branche_id
            'position_id' => ['nullable', 'integer', 'exists:positions,id'], // Campo position_id
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'mat_code' => $input['mat_code'], // Adicione esta linha para atualizar o campo mat_code
                'admission' => $input['admission'], // Atualizar campo admission
                'birth_date' => $input['birth_date'], // Atualizar campo birth_date
                'ramal' => $input['ramal'], // Atualizar campo ramal
                'branche_id' => $input['branche_id'], // Atualizar campo branche_id
                'position_id' => $input['position_id'], // Atualizar campo position_id
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
