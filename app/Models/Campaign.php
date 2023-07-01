<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [ 'sent_at'=>'datetime'];

    public function mailingList()
    {
        return $this->belongsTo(MailingList::class);
    }

}
