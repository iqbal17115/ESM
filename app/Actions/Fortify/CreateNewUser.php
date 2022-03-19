<?php

namespace App\Actions\Fortify;

use App\Models\Backend\Contact\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            // 'district_id' => ['required'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

     
        return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'address' => $input['address'],
                'mobile' => $input['mobile'],
                'type' => 'Customer',
                'password' => Hash::make($input['password']),
        ]), function (User $user) use ($input) {
            // $user->assignRole('admin');
                $user->assignRole('customer');
                $contact = Contact::whereMobile($user->mobile)->firstOrNew();
                $contact->business_name = $input['business_name'];
                $contact->first_name = $user->name;
                $contact->address = $user->address;
                $contact->shipping_address = $user->address;
                $contact->user_id = $user->id;
                $contact->type = 'Customer';
                $contact->mobile = $user->mobile;
                // $contact->district_id = $input['district_id'];
                $contact->created_by = $user->id;
                $contact->save();
        });
    }
}
