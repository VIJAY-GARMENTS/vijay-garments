<?php

namespace App\Livewire\Audit\Client\Sub\Turnover;

use Aaran\Taskmanager\Models\Turnover;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    public mixed $client_id;
    public mixed $month;
    public mixed $year;
    public mixed $target;
    public mixed $achieved;
    public mixed $remarks;
    public mixed $status_id;

    public function mount($id)
    {
        $this->client_id = $id;
    }

    public function getSave(): string
    {
        if ($this->vid) {
            $obj = Turnover::find($this->vid);
            $obj->target = $this->target;
            $obj->achieved = $this->achieved;
            $obj->remarks = $this->remarks;

            if ($this->target == $this->achieved) {
                $obj->status_id = Status::FINISHED->value;
            } else {
                $obj->status_id = Status::PENDING->value;
            }
            $obj->user_id = Auth::id();
            $obj->save();
        }

        $this->target = '';
        $this->achieved = '';
        $this->remarks = '';
        $this->status_id = '';
        return 'Updated';
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = Turnover::find($id);
            $this->vid = $obj->id;
            $this->target = $obj->target;
            $this->achieved = $obj->achieved;
            $this->remarks = $obj->remarks;
            $this->status_id = $obj->status_id;
        }
    }

    private function getList(): void
    {
        $this->list = Turnover::where('client_id', '=', $this->client_id)
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    }

    #[On('refresh-turnover')]
    public function reRender($id):void
    {
        $this->client_id = $id;
        $this->render();
    }


    public $list;

    public function render()
    {
        $this->getList();

        return view('livewire.audit.client.sub.turnover.index');
    }


}
