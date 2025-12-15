<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Get Department
        $department = \App\Models\Department::first();
        
        // 2. Create/Get a Resident User
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'juan@gmail.com'],
            [
                'first_name' => 'Juan',
                'last_name' => 'Citizen',
                'username' => 'juancitizen',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'user',
                'barangay_id' => 1
            ]
        );

        // 3. Create Conversation
        $conversation = \App\Models\Conversation::create([
            'user_id' => $user->id,
            'department_id' => $department->id,
        ]);

        // 4. Add Messages
        
        // Message from Resident
        \App\Models\Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'message' => 'Hello, I have a pothole report.',
        ]);

        // Message from Employee (if exists)
        $employee = \App\Models\User::where('role', 'employee')->first();
        if ($employee) {
            \App\Models\Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $employee->id,
                'message' => 'Hi Juan, we received it. Where is it located?',
            ]);
        }
    }
}
