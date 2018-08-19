<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Cloudder;

class Media extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mediable_media';

    protected $guarded = [];
    protected $fillable = [
        'public_id',
        'version',
        'signature',
        'width',
        'height',
        'format',
        'resource_type',
        'bytes',
        'type',
        'etag',
        'url',
        'secure_url'
    ];
    protected $appends = ['fullSize', 'thumbnail'];

    /*
     * Retrieves the models this media is attached too
     */
    public function posts()
    {
        return $this->morphedByMany(App\Post::class, 'mediable');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @param array $files Illuminate\Http\File
     */
    public static function createFromFiles(array $files)
    {
        $files = collect($files);
        // \Log::info('$files '.print_r($files,true));
        return $files->map(function ($file, $key) {
            if (!is_a($file, 'Illuminate\Http\UploadedFile')) {
                throw new \Exception('createFromFiles expects an array of Illuminate\Http\UploadedFile objects');
            }
            $filename = explode('.', $file->getClientOriginalName());
            if($file->getPathName()) {
                $uploadedFile = Cloudder::upload(
                    $file->getPathName()
                )->getResult();
                if ($uploadedFile) {
                    return self::create($uploadedFile);
                } else {
                    return 'error';
                }
            }else{
                return 'error';
            }
        });
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @param array $files Illuminate\Http\Request
     */
    public static function storeLocal($request)
    {
        if ($request->hasFile('downloads')) {
            $path = $request->downloads->store('downloads');
            $filename = $request->downloads->getClientOriginalName();
            $type = 'download';
        } elseif ($request->hasFile('attached_reports')) {
            $path = $request->attached_reports->store('attached_reports');
            $filename = $request->attached_reports->getClientOriginalName();
            $type = 'report';
        } else {
            abort(400);
        }
        return self::create([
            'secure_url' => secure_url('/') . "/${path}",
            'resource_type' => 'file',
            'type' => $type,
            'original_filename' => $filename
        ]);
    }

    public function getMediumSizeAttribute()
    {
        if ($this->attributes['resource_type'] !== 'image') {
            return '';
        }
        return str_replace(
            'v'.$this->attributes['version'],
            'c_limit,q_auto,w_740',
            $this->attributes['secure_url']
        );
    }

    public function getFullSizeAttribute()
    {
        if ($this->attributes['resource_type'] !== 'image') {
            return '';
        }
        return str_replace(
            'v'.$this->attributes['version'],
            'c_limit,q_auto,w_1200',
            $this->attributes['secure_url']
        );
    }



    public function getThumbnailAttribute()
    {
        if ($this->attributes['resource_type'] !== 'image') {
            return '';
        }
        return str_replace(
            'v'.$this->attributes['version'],
            'c_limit,q_auto,w_150',
            $this->attributes['secure_url']
        );
    }
}
