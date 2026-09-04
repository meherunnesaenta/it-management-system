<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create
                            {--name= : The administrator name}
                            {--email= : The administrator email}';

    protected $description = 'Create a super-admin account securely';

    public function handle(): int
    {
        $name = $this->option('name') ?: $this->ask('Administrator name');
        $email = $this->option('email') ?: $this->ask('Administrator email');

        if (User::where('email', $email)->exists()) {
            $this->error('A user with this email already exists.');

            return self::FAILURE;
        }

        $password = $this->secret('Password');
        $confirmation = $this->secret('Confirm password');

        if ($password !== $confirmation || blank($password)) {
            $this->error('Passwords do not match or are empty.');

            return self::FAILURE;
        }

        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole(Role::findOrCreate('super-admin'));

        $this->info("Super admin {$admin->email} created successfully.");

        return self::SUCCESS;
    }
}
