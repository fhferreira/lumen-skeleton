<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract {

    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'valid'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_login'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'valid' => 'boolean',
    ];

    /**
     * Available roles for the users.
     *
     * @var array
     */
    public static $roles = [
        'guest'     => 'Guest',
        'user'      => 'User',
        'moderator' => 'Moderator',
        'admin'     => 'Administrator',
    ];

    /**
     * Mutator to ensure a lowercase email.
     *
     * @param  string $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * Mutator to automatically hash the password.
     *
     * @param  string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Scope users to valid ones only.
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeValid($query)
    {
        $query->where('valid', '=', true);
    }

    /**
     * Scope users by given role.
     *
     * @param  mixed $query
     * @param  string $role
     * @return void
     */
    public function scopeRole($query, $role)
    {
        $query->where('role', '=', $role);
    }

    /**
     * Determine if the user has the given role.
     *
     * @param  string $role
     * @return boolean
     */
    public function is($role)
    {
        return $this->role == $role;
    }

    /**
     * Search on multiple fields.
     *
     * @param  mixed $value
     * @return mixed|Builder
     */
    public static function search($value = null)
    {
        $query = static::query();

        if (! is_null($value))
        {
            return $query->where('id', '=', $value)
                         ->orWhere('name', 'LIKE', "%{$value}%")
                         ->orWhere('email', 'LIKE', "%{$value}%");
        }

        return $query;
    }

}
