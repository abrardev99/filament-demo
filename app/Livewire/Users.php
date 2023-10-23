<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public int $previousCount = 0;
    public function mount()
    {
        $this->previousCount = User::query()->count();
    }

    public function render()
    {
        $users = User::query()->paginate();
        $total = $users->total();

//        $this->dispatch('new-created', ['prev' => $this->previousCount, 'new' => $total]);

        if ($this->previousCount > 0 && $this->previousCount !== $total) {
            // fire event
            $this->dispatch('new-created', ['prev' => $this->previousCount, 'new' => $total]);
        }

        $this->previousCount = $total;

        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}
