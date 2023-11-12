<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules\File as ValidationFile;

class UploadController extends Controller
{
    use ApiResponser;
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                // 'size:2048',
                ValidationFile::types(['png', 'jpg', 'pdf'])
                    ->max(10 * 1024)

            ],
        ]);
        $file = $request->file('file');
        $name = time() . '_' . Str::uuid() . $file->hashName();
        $folderName = Str::remove('.' . $file->getClientOriginalExtension(), $name);
        $storageFile = Storage::disk('sftp')->put("temp/files/{$folderName}", $file);

        $fileModel = File::create([
            'name' => $name,
            'path' => $storageFile,
            'auth_guard' => 'user',
            'accessable_id' => Auth::guard('user')->id(),
            'accessable_type' => 'user',
            'expires_at' => now()->addMinutes(30)
        ]);
        $tempURL = URL::signedRoute('api.file.retrieve', ['file' => $fileModel->id]);

        return $this->success([
            'temporary_file_id' => $fileModel->id,
            'access_url' => $tempURL
        ]);
    }


    public function retrieveFile($file)
    {
        $fileModel = File::find($file);
        $client = Auth::guard($fileModel->auth_guard)->user();

        if (!$fileModel->accessable_id == $client->id && !$fileModel->accessable instanceof $client) {
            abort(403, __('You dont have access to this resource.'));
        }

        if (!$fileModel->expires_at->isFuture()) {
            abort(403, __('Time of resource passed.'));
        }

        return response()->download(storage_path('app/' . $fileModel->path));
    }
}
