<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function calls(): HasMany
    {
        return $this->hasMany(Call::class);
    }

    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class);
    }

    public function phoneUsers(): HasMany
    {
        return $this->hasMany(PhoneUser::class);
    }

    /*    --      ** Relaciones HasManyThrough **     --     */

    public function medicalData(): HasManyThrough
    {
        return $this->hasOneThrough(MedicalData::class, Call::class, 'user_id', 'id');
    }

    public function beneficiaryContacts(): HasManyThrough
    {
        return $this->hasManyThrough(Contact::class, Call::class, 'user_id', 'id');
    }
}
