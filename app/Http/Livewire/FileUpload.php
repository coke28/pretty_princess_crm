<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $uploadProgress = 0;

    public function updatedFile()
    {
        $this->uploadFile();
    }

    public function uploadFile()
    {
        $this->file->storeAs('uploads', $this->file->getClientOriginalName());

        // Just a simulation of file upload progress using a for loop.
        for ($i = 1; $i <= 100; $i += 10) {
            $this->uploadProgress = $i;
            sleep(1);  // This is just for simulation, remove in real application
        }
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}

