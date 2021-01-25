<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class Uploader
{
    private SluggerInterface $slugger;

    private string $absoluteDir;

    private string $relativeDir;

    public function __construct(SluggerInterface $slugger, string $absoluteDir, string $relativeDir)
    {
        $this->slugger = $slugger;
        $this->absoluteDir = $absoluteDir;
        $this->relativeDir = $relativeDir;
    }

    public function upload(UploadedFile $file): string
    {
        $filename = $file->getClientOriginalName();

        $new_filename = sprintf('%s_%s.%s', $this->slugger->slug($filename), uniqid(), $file->getClientOriginalExtension());

        $file->move($this->absoluteDir, $new_filename);
        return $this->relativeDir . $new_filename;
    }
}
