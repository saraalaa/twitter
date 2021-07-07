<?php


namespace App\Traits;


trait ImageTrait
{
    protected string $storedImage;

    public function storeImage($image, $directory)
    {
        $this->storedImage = request()->file($image)->store('public/' . $directory);
    }

    public function mergeImage($data): array
    {
        return array_merge($data, ['image' => $this->storedImage]);
    }

}
