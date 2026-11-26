<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:admin {--name=Admin} {--email=admin@medvacation.care} {--password=password}', function () {
    $name = $this->option('name');
    $email = $this->option('email');
    $password = $this->option('password');

    $user = User::updateOrCreate(
        ['email' => $email],
        [
            'name' => $name,
            'password' => $password,
            'role' => 'admin',
        ]
    );

    $this->info("Admin user created/updated successfully!");
    $this->line("Name:     {$user->name}");
    $this->line("Email:    {$user->email}");
    $this->line("Password: {$password}");
    $this->line("Role:     {$user->role}");
})->purpose('Create or update an admin user for the admin panel');

Artisan::command('user:reset-password {email} {password}', function ($email, $password) {
    $user = User::where('email', $email)->first();

    if (! $user) {
        $this->error("User with email [{$email}] not found!");
        return 1;
    }

    $user->password = $password;
    $user->save();

    $this->info("Password for [{$email}] has been reset successfully!");
})->purpose('Reset password for an existing user');
