<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserManagement extends Component
{
    public $name, $email, $userId, $password, $password_confirmation;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => $this->isEditing ? 'nullable|min:8|confirmed' : 'required|min:8|confirmed',
            'password_confirmation' => $this->password ? 'required' : 'nullable',
        ];
    }

    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::latest()->where('role', '!=', 'superadmin')->get(),
            // 'users' => User::latest()->where('role', 'NOT LIKE', '%admin%')->get(),
        ])->layout('layouts.app');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->userId = null;
        $this->isEditing = false;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate($this->rules());

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $data['password'] = bcrypt($this->password);
        }

        User::updateOrCreate(['id' => $this->userId], $data);

        $this->resetInput();
        session()->flash('message', $this->isEditing ? 'User updated.' : 'User created.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'User deleted.');
    }
}
