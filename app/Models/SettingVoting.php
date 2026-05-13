<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingVoting extends Model
{
    protected $fillable = [
        'is_open',
        'start_date',
        'end_date',
        'message',
    ];

    protected $casts = [
        'is_open' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public static function isVotingOpen()
    {
        $setting = self::first();
        if (!$setting) return false;

        $now = now();
        return $setting->is_open &&
               (!$setting->start_date || $now->gte($setting->start_date)) &&
               (!$setting->end_date || $now->lte($setting->end_date));
    }

    public static function getMessage()
    {
        $setting = self::first();
        return $setting ? $setting->message : 'Voting belum dibuka.';
    }
}
