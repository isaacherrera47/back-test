<?php

namespace App\Http\Controllers;

use App\Http\Services\ImageBase64Processor;
use App\Http\Services\ImageUploader;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $request
     * @param ImageBase64Processor $base64Processor
     * @param ImageUploader $uploader
     *
     * @return RedirectResponse
     */
    public function postImages(
        Request $request,
        ImageBase64Processor $base64Processor,
        ImageUploader $uploader
    ): RedirectResponse
    {
        $image = $base64Processor->__invoke($request->file('image'));
        $processedImage = $uploader->__invoke($image);

        if ($processedImage['status'] !== 'error') {
            $images = $request->session()->get('images', []);
            array_unshift($images, $processedImage['url']);
            $request->session()->put('images', $images);
        }

        $request->session()->flash('status', $processedImage['status']);

        return back();
    }
}
