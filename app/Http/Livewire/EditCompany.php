<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCompany extends Component
{
    use WithFileUploads;
    public Image $logo;
    public string $tradingName;
    public string $name;
    public string $cnpj;
    public $tempImage;

    public function rules()
    {
        return [
            'tempImage' => ['nullable','image', 'max:2048'],
            'tradingName' => ['required','string', 'min:2', 'max:100']
        ];
    }

    public function mount()
    {
        $company = Auth::user()->company;
        $this->logo = $company->image;
        $this->tradingName = $company->trading_name;
        $this->name = $company->name;
        $this->cnpj = $company->cnpj;
    }
    public function render()
    {
        return view('livewire.edit-company');
    }

    public function updated()
    {
        $string = "hello";
    }
    public function save()
    {
        $this->validate([
            'tradingName' => ['required','string', 'min:2', 'max:100']
        ]);
        $company = Auth::user()->company;

        //MOVER PARA O SERVICE/MODEL
        $company->trading_name = $this->tradingName;
        $company->save();
        if($this->tempImage != null)
        {
            $logo = $company->image;
            $logo->url = Storage::url($this->tempImage->store('public/company'));
            $logo->save();
        }
        $this->redirect(route('home'));
    }
}
