<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "========================================\n";
echo "Database Table Verification\n";
echo "========================================\n\n";

// Check users table columns
if (Schema::hasTable('users')) {
    echo "✅ Users table exists\n\n";
    
    $columns = Schema::getColumnListing('users');
    echo "Users table columns:\n";
    foreach ($columns as $column) {
        echo "  • $column\n";
    }
    
    echo "\n2FA Related Columns Check:\n";
    $twoFactorColumns = [
        'two_factor_enabled',
        'two_factor_secret',
        'two_factor_backup_codes',
        'two_factor_confirmed_at',
        'is_active'
    ];
    
    foreach ($twoFactorColumns as $col) {
        if (Schema::hasColumn('users', $col)) {
            echo "  ✅ $col - EXISTS\n";
        } else {
            echo "  ❌ $col - MISSING\n";
        }
    }
    
    echo "\n========================================\n";
    echo "Current Users in Database:\n";
    echo "========================================\n\n";
    
    $users = DB::table('users')->select('id', 'name', 'email', 'role', 'two_factor_enabled', 'is_active')->get();
    
    foreach ($users as $user) {
        echo "ID: {$user->id}\n";
        echo "Name: {$user->name}\n";
        echo "Email: {$user->email}\n";
        echo "Role: {$user->role}\n";
        echo "2FA Enabled: " . ($user->two_factor_enabled ? "Yes" : "No") . "\n";
        echo "Active: " . ($user->is_active ? "Yes" : "No") . "\n";
        echo "---\n";
    }
} else {
    echo "❌ Users table does not exist!\n";
}
