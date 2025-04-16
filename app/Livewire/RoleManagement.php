<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;

class RoleManagement extends Component
{
    public $roles;
    public $name;
    public $roleId;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|unique:roles,name,' . $this->roleId,
        ];
    }

    public function render()
    {
        $this->roles = Role::latest()->get();
        return view('livewire.role-management')
            ->layout('layouts.app');
    }

    public function resetInput()
    {
        $this->name = '';
        $this->roleId = null;
        $this->isEditing = false;
    }

    public function save()
    {
        $this->validate($this->rules());

        $data = [
            'name' => $this->name,
        ];

        Role::updateOrCreate(['id' => $this->roleId], $data);

        session()->flash('message', $this->isEditing ? 'Role updated.' : 'Role created.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->isEditing = true;
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        $this->resetInput();
        session()->flash('message', 'Role deleted.');
    }
}
