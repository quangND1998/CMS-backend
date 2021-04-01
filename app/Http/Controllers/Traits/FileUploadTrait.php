<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use ZipArchive;
use Illuminate\Support\Facades\File;
use RarArchiver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use DirectoryIterator;
use Illuminate\Support\Str;
use App\Models\Ground;

trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */

    public function uploadFile($name, $image, $url_folder)
    {
        $current = Carbon::now()->format('YmdHs');
        $folder = $url_folder;
        $destinationpath = public_path($folder);

        $name = Str::slug($name) . '_' . time();
        $namefile =   $name . '.' . $image->getClientOriginalExtension();
        $image->move($destinationpath, $namefile);
        $image_url =  $folder . $namefile;
        return $image_url;
    }


    //Upload and Update fileZIp
    public function UploadZipFile($file, $extracto)
    {

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "zip") {
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string = explode(".zip", $file->getClientOriginalName())[0] . "-" . time() . $user_id;
            rename($extracto . '/' . explode(".zip", $file->getClientOriginalName())[0], $extracto . '/' . $string);
            $path =  $extracto . '/' . $string . '/index.html';
            return $path;
        } else {
            $path = "";
            return $path;
        }
    }

    public function UpdateFile($file, $extracto, $attribute)
    {

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "zip") {
            $oldzip = explode("/index.html", $attribute)[0];
            File::deleteDirectory($oldzip);
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string = explode(".zip", $file->getClientOriginalName())[0] . "-" . time() . $user_id;
            rename($extracto . '/' . explode(".zip", $file->getClientOriginalName())[0], $extracto . '/' . $string);
            $path =  $extracto . '/' . $string . '/index.html';
            return $path;
        } else {
            $path = "";
            return $path;
        }
    }


    public function UploadFilePresent($file, $extracto)
    {

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "zip") {
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string = explode(".zip", $file->getClientOriginalName())[0] . "-" . time() . $user_id;
            rename($extracto . '/' . explode(".zip", $file->getClientOriginalName())[0], $extracto . '/' . $string);
            $path =  $extracto . '/' . $string;
            return $path;
        } else {
            $path = "";
            return $path;
        }
    }


    public function UpdateFilePresent($file, $extracto, $attribute)
    {

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "zip") {

            $oldzip = $attribute;
            File::deleteDirectory($oldzip); //xoa dc file nay
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string = explode(".zip", $file->getClientOriginalName())[0] . "-" . time() . $user_id;
            rename($extracto . '/' . explode(".zip", $file->getClientOriginalName())[0], $extracto . '/' . $string);
            $path =  $extracto . '/' . $string;
        }
        return $path;
    }



    //upload and update model_AR
    public function UploadFileGLB_Usdz($file, $destinationpath)
    {
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "glb" || $file->getClientOriginalExtension() == "usdz") {
            $file->move($destinationpath, time() . $user_id . "-" . $file->getClientOriginalName());
            $path = $destinationpath . '/' . time() . $user_id . "-" . $file->getClientOriginalName();
            return $path;
        } else {
            $path = "";
            return $path;
        }
    }


    public function UpdateFileGlb_Usdz($file, $destinationpath, $attribute)
    {
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "glb" || $file->getClientOriginalExtension() == "usdz") {

            if ($attribute == '') {
                $file->move($destinationpath, time() . $user_id . "-" . $file->getClientOriginalName());
                $path = $destinationpath . '/' . time() . $user_id . "-" . $file->getClientOriginalName();
                return $path;
            } else {
                unlink($attribute);
                $file->move($destinationpath, time() . $user_id . "-" . $file->getClientOriginalName());
                $path = $destinationpath . '/' . time() . $user_id . "-" . $file->getClientOriginalName();
                return $path;
            }
        } else {
            $path = "";
            return $path;
        }
    }

    //update image ground
    public function image($file, $destinationpath)
    {

        $name = time() . "." . $file->getClientOriginalName();
        $file->move($destinationpath, $name);
        $path = '/' . $destinationpath . $name;

        return $path;
    }

    public function update_image($file, $destinationpath, $attribute)
    {


        $name = time() . "." . $file->getClientOriginalName();
        $link_old = Str::of($attribute)->ltrim('/');

        if ($attribute == null || file_exists($link_old) == false) {
            $file->move($destinationpath, $name);
            $path = '/' . $destinationpath . $name;
        } else {
            $link_old = Str::of($attribute)->ltrim('/');
            unlink($link_old);
            $file->move($destinationpath, $name);
            $path = '/' . $destinationpath . $name;
        }

        return $path;
    }
    public function update_image_360($file, $destinationpath, $attribute)
    {

        $user_id = Auth::user()->id;
        $name = time() . $user_id . "." . $file->getClientOriginalName();

        if ($attribute == null || file_exists($attribute) == false) {
            $file->move($destinationpath, $name);
            $path = $destinationpath . "/" . $name;
        } else {
            unlink($attribute);
            $file->move($destinationpath, $name);
            $path = $destinationpath . "/" . $name;
        }

        return $path;
    }


    //upload folder image Map
    public function uploadfloder_image($file, $extracto)
    {
        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "zip") {
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string = explode(".zip", $file->getClientOriginalName())[0] . "-" . time() . $user_id;
            rename($extracto . '/' . explode(".zip", $file->getClientOriginalName())[0], $extracto . '/' . $string);
            $path =  $extracto . '/' . $string . '/';
        }
        return $path;
    }

    public function updatefloder_image($file, $extracto, $attribute)
    {

        $zip = new ZipArchive;
        $user_id = Auth::user()->id;
        if ($file->getClientOriginalExtension() == "zip") {
            File::deleteDirectory($attribute);
            $zip->open($file->getRealPath());
            $zip->extractTo($extracto);
            $string = explode(".zip", $file->getClientOriginalName())[0] . "-" . time() . $user_id;
            rename($extracto . '/' . explode(".zip", $file->getClientOriginalName())[0], $extracto . '/' . $string);
            $path =  $extracto . '/' . $string . '/';
        }
        return $path;
    }
    public function DeleteFolder($attribute, $extension)
    {
        $link_old = Str::of($attribute)->ltrim('/');
        if (file_exists($link_old)) {
            $oldzip = explode($extension, $link_old)[0];

            if (is_dir($oldzip)) {
                File::deleteDirectory($oldzip); //xoa dc file nay
            } else {
                unlink($link_old);
            }
        }
    }
    public function createFolder($public, $name)
    {

        $path = $public . $name;
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }

        return $path;
    }
    public function createFolderChild($public, $nameParent, $name)
    {
        $path = $public . $nameParent . '/' . $name;
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }

        return $path;
    }

    public function getAllFolder($public, $name)
    {
        $dir = new DirectoryIterator($public . $name);
        $array =  [];
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                $array[] = $fileinfo->getFilename();
            }
        }
        return $array;
    }
    public function getAllFolderPath($path)
    {
        $dir = new DirectoryIterator($path);
        $array =  [];
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                $array[] = $fileinfo->getFilename();
            }
        }
        return $array;
    }
    public function uploadMultiple($path, $files)
    {
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $file->move($path, $name);
            $data[] = $name;
        }
    }
    public function getAllImage($public, $name)
    {
        $dir = new DirectoryIterator($public . $name);

        $array =  [];
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDir()) {
                $array[] = $fileinfo->getFilename();
            }
        }
        return $array;
    }
    public function getAllImagePath($path)
    {
        $dir = new DirectoryIterator($path);

        $array =  [];
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDir()) {
                $array[] = $fileinfo->getFilename();
            }
        }
        return $array;
    }
    public function update_image2D($file, $destinationpath, $attribute)
    {

        $user_id = Auth::user()->id;
        $name = time() . $user_id . "." . $file->getClientOriginalName();
        if ($attribute == null || file_exists($attribute) == false) {
            $file->move($destinationpath, $name);
            $path = $name;
        } else {
            unlink($attribute);
            $file->move($destinationpath, $name);
            $path = $name;
        }
        return $path;
    }
}
