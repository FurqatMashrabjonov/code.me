<?php

namespace App\Core\File;

use App\Models\Language;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FilesystemException;

class FileService
{
    protected int $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /*
     * string uuid
     */
    public static function createRootFolder($uuid)
    {
        $folder_path = storage_path("app/codes/$uuid");

        try {
            File::makeDirectory($folder_path, 0777);
            return $folder_path;
        } catch (FilesystemException $exception) {
            Log::debug($exception->getMessage());
            return false;
        }
    }

    public static function createFolderByCode($uuid, $problem_id, $language_key)
    {
        $folder_path = storage_path("app/codes/$uuid/$problem_id/$language_key");

        try {
            File::makeDirectory($folder_path, 0777, true);
            self::createBaseFiles($folder_path, $language_key);
            return $folder_path;
        } catch (FilesystemException $exception) {
            Log::debug($exception->getMessage());
            return false;
        }
    }

    public static function createBaseFiles($folder_path, $language_key)
    {
        $language = Language::query()->where('key', $language_key)->first();
        $files = [
            'input' => 'txt',
            'output' => 'txt',
            'main' => $language->extension
        ];

        foreach ($files as $file_name => $extension) {
            try {
                echo "$folder_path/$file_name.txt";
                File::put("$folder_path/$file_name.$extension", '');
            } catch (FilesystemException $exception) {
                Log::debug($exception->getMessage());
            }
        }
    }

    public static function checkFolder($path): bool
    {
        return is_dir($path);
    }

    public static function deleteRootFolder($uuid): void
    {
        $folder_path = storage_path("app/codes/$uuid");
        try {
            File::deleteDirectory($folder_path);
        } catch (FilesystemException $exception) {
            Log::debug($exception->getMessage());
        }
    }

}
