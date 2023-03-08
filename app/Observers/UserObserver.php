<?php

namespace App\Observers;

use App\Core\File\FileService;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    public function creating(User $user)
    {
        FileService::createRootFolder($user->uuid);
    }

    public function deleting(User $user)
    {
        FileService::deleteRootFolder($user->uuid);
    }
}
