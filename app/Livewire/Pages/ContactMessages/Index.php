<?php

namespace App\Livewire\Pages\ContactMessages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactMessage;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $search_performed = false;

    protected $queryString = ['search'];

    public function performSearch()
    {
        $this->search_performed = true;
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->search_performed = false;
        $this->resetPage();
    }

    public function render()
    {
        $messages = ContactMessage::query()
            ->when($this->search && $this->search_performed, function ($query) {
                $query->where(function ($q) {
                    $q->where('email', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(100)
            ->withQueryString();

        $stats = ContactMessage::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) as count_unread_messages
        ")->first();

        return view('livewire.pages.contact-messages.index', [
            'messages' => $messages,

            'count_messages' => $stats->total,
            'count_unread_messages' => $stats->count_unread_messages,
        ]);
    }
}
