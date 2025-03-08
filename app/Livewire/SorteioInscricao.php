<?php

namespace App\Livewire;

use App\Models\Sorteavel;
use Livewire\Component;
use Illuminate\Support\Str;

class SorteioInscricao extends Component
{
    public $nome;
    public $aceita_termos = false;
    public $modalAberto = false;

    protected $rules = [
        'nome' => 'required|min:3',
        'aceita_termos' => 'accepted',
    ];

    public function inscrever()
    {
        $this->validate();

        Sorteavel::create([
            'nome' => $this->nome,
            'secretaria' => '--',
            'local' => 'Praça da Paz',
            'matricula' => uniqid(more_entropy:true),
        ]);

        session()->flash('success', 'Inscrição realizada com sucesso!');
        $this->reset(['nome', 'aceita_termos']);
    }

    public function abrirModal()
    {
        $this->modalAberto = true;
    }

    public function fecharModal()
    {
        $this->modalAberto = false;
    }

    public function render()
    {
        return view('livewire.sorteio-inscricao');
    }
}
