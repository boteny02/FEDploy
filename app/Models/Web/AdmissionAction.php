<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionAction extends Model
{
    use HasFactory;

    protected $table = 'admission_actions';

    protected $fillable = [
        'language_id', 'title', 'sub_title', 'image', 'bg_image', 'button_text', 'button_link', 'video_id', 'status',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
