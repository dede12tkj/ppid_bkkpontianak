<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class BuatAdmin extends Command
{
    protected $signature = 'ppid:admin {email : Email untuk login} {--name= : Nama tampilan (default: Admin PPID)}';

    protected $description = 'Buat akun admin PPID, atau reset password bila emailnya sudah terdaftar';

    public function handle(): int
    {
        $email = (string) $this->argument('email');

        $password = (string) $this->secret('Password baru (min. 10 karakter)');
        $konfirmasi = (string) $this->secret('Ulangi password');

        $validator = Validator::make(
            ['email' => $email, 'password' => $password, 'password_confirmation' => $konfirmasi],
            ['email' => ['required', 'email'], 'password' => ['required', 'string', 'min:10', 'confirmed']],
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->password = $password; // di-hash otomatis oleh cast pada model User
            $user->save();
            $this->info("Password {$email} berhasil diganti.");

            return self::SUCCESS;
        }

        User::create([
            'name' => $this->option('name') ?: 'Admin PPID',
            'email' => $email,
            'password' => $password,
        ]);

        $this->info("Admin {$email} berhasil dibuat.");

        return self::SUCCESS;
    }
}
