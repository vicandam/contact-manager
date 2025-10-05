<?php

namespace Modules\Contact\App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
//use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasUploadFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Modules\Contact\Database\factories\ContactFactory;

class Contact extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'email', 'image'];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "uploads";

        if ($value == null) {
            Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $filename = Storage::disk($disk)->putFile($destination_path, $value);
            $this->attributes[$attribute_name] = $filename;
        }
    }
    public function getImageAttribute($value)
    {
        if (!$value) {
            return null;
        }

        if (str_starts_with($value, 'http')) {
            return $value;
        }

        return asset('storage/' . $value);
    }

    protected static function newFactory(): ContactFactory
    {
        //return ContactFactory::new();
    }
}
