<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class Form extends Component implements HasForms
{
    use InteractsWithForms;

    public $name;

    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Wizard\Step::make('Billing')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                    ]),
            ])
                ->skippable()
                ->submitAction(new HtmlString('<button type="submit" class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-danger-600 hover:bg-danger-500 focus:bg-danger-700 focus:ring-offset-danger-700">Submit</button>'))
        ];
    }

    public function render()
    {
        return view('livewire.form');
    }

    public function submit()
    {
        logs()->info($this->form->getState());

        sleep(3);

        return redirect('welcome');
    }
}
