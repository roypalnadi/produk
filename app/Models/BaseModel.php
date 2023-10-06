<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BaseModel extends Model
{
    protected $pathFile = '';
    protected $columnFile = '';

    /**
     * Store file
     */
    public function storeFile(UploadedFile $file, string $fileName): bool
    {

        if ($this->{$this->columnFile}) {
            $this->dropFile();
        }

        $path = $this->getFilePath();
        $fileName =  $this->table . '-' . $fileName;

        $success = $file->storeAs($path, $fileName);
        if ($success) {
            $this->{$this->columnFile} = $fileName;

            return true;
        }
        return false;
    }

    /**
     * Drop file
     */
    public function dropFile()
    {
        $path = $this->getFilePath();
        $path .= '/' . $this->{$this->columnFile};

        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    protected function getFilePath(): string
    {
        return 'public/' . $this->pathFile;
    }
}
