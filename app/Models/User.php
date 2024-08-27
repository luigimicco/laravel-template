<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Laravel\Facades\Image;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'level',
        'image',
        'note'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function user_image()
    {
        return "data:image/png;base64," . $this->user_avatar();
    }

    public function user_avatar()
    {

        if ($this->image && File::exists(storage_path("app/profiles/{$this->image}"))) {
            $img = base64_encode(file_get_contents(storage_path("app/profiles/{$this->image}")));
        } else {
            $image = Image::create(300, 300)->fill('#aaa');

            $initials = $this->name[0] . $this->surname[0];

            $image->text($initials, 150, 190, function ($font) {
                $font->file(public_path('/fonts/Roboto-Bold.ttf'));
                $font->size(120);
                $font->color('#fff');
                $font->align('center');
                $font->angle(0);
            });
            $img = base64_encode($image->toJpeg());
        }

        return $img;
    }

    public function fullname()
    {
        return trim($this->name . " " . $this->surname);
    }

    // ************************************************************
    // for AdminLte 
    public function adminlte_image()
    {
        return '/profile/avatar/' . $this->id;
    }

    public function adminlte_desc()
    {
        return Auth::user()->email;
    }

    public function adminlte_profile_url()
    {
        return "/profile";
    }


    // permessi
    public function isAdmin()
    {
        return $this->level == 'admin';
    }

    public function isManager()
    {
        return (in_array($this->level, ['admin', 'manager']));
    }

    public function isUser()
    {
        return (in_array($this->level, ['admin', 'manager', 'user']));
    }
}
