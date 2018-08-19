<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
    public function updateUser(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users,id,'.$user->id
        ]);
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->fill([
            'email' => $request->get('email')
        ]);
        $user->save();
        return $user->fresh();
    }

    public function updateDiet(Request $request)
    {
        $restriction = $request->input('profile.diet_has_restrictions') == "1";
        $this->validate($request, [
            'profile.diet_has_restrictions' => 'required',
            'profile.diet_restrictions' => $restriction ? 'required' : '',
        ]);
        $user = $request->user();
        $user->profile->fill([
            'diet_has_restrictions' => $restriction,
            'diet_restrictions' => $request->input('profile.diet_restrictions')
        ]);
        if (!$restriction) {
            $user->profile->fill([
                'diet_restrictions' => null
            ]);
        }
        $user->profile->save();
        return $user->fresh();
    }

    public function updateHealth(Request $request)
    {
        $isActive = $request->input('profile.health_is_active') == "1";
        $hasInjuries = $request->input('profile.health_has_injuries') == "1";
        $result = $this->validate($request, [
            'profile.yoga_level' => 'required',
            'profile.health_is_active' => 'required',
            'profile.health_has_injuries' => 'required',
            'profile.health_injuries' => $hasInjuries ? 'required' : '',
            'profile.health_activities' => $isActive ? 'required' : '',
            'profile.goals' => 'required'
        ]);
        $user = $request->user();
        $user->profile->fill([
            'yoga_level' => $request->input('profile.yoga_level'),
            'health_is_active' => $isActive,
            'health_activities' => $request->input('profile.health_activities'),
            'health_has_injuries' => $hasInjuries,
            'health_injuries' => $request->input('profile.health_injuries'),
            'goals' => $request->input('profile.goals'),
            'additional_info' => $request->input('profile.additional_info')
        ]);
        if (!$isActive) {
            $user->profile->fill([
                'health_activities' => null
            ]);
        }
        if (!$hasInjuries) {
            $user->profile->fill([
                'health_injuries' => null
            ]);
        }
        $user->profile->save();
        return $user->fresh();
    }

    public function updateContact(Request $request)
    {
        $this->validate($request, [
            'profile.emergency_contact_name' => 'required',
            'profile.emergency_contact_relationship' => 'required',
            'profile.emergency_contact_phone' => 'required'
        ]);

        $user = $request->user();
        $user->profile->fill([
            'emergency_contact_name' => $request->input('profile.emergency_contact_name'),
            'emergency_contact_phone' => $request->input('profile.emergency_contact_phone'),
            'emergency_contact_relationship' => $request->input('profile.emergency_contact_relationship')
        ])->save();
        return $user->fresh();
    }

    public function updateBilling(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        $user = $request->user();
        $user->fill($request->all());
        $user->save();
        return $user->fresh();
    }

    public function updateAdditionalInfo(Request $request)
    {
        $user = $request->user();
        $user->profile->fill($request->get('profile'))->save();
        return $user->fresh();
    }
}
