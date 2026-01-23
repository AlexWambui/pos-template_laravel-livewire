<?php

namespace App\Livewire\Pages\ContactMessages;

use Livewire\Component;
use App\Models\ContactMessage;

class Edit extends Component
{
    public $message;

    public $confirm_message_deletion = false;
    public ?int $delete_message_id = null;

    public function mount(string $message)
    {
        $this->message = ContactMessage::where('uuid', $message)->firstOrFail();
        $this->message->markAsRead();
    }

    protected $listeners = [
        'confirm-message-deletion' => 'confirmMessageDeletion',
    ];

    public function confirmMessageDeletion($data)
    {
        $this->delete_message_id = $data['message_id'];
        $this->dispatch('open-modal', 'confirm-message-deletion');
    }

    public function deleteMessage()
    {
        if ($this->delete_message_id) {
            $message = ContactMessage::findOrFail($this->delete_message_id);
            $message->delete();

            $this->delete_message_id = null;
            $this->dispatch('close-modal', 'confirm-message-deletion');
            return redirect()->route('contact-messages.index');
            $this->dispatch('notify', type: 'success', message: 'message deleted successfully');
        }
    }

    public function toggleImportant()
    {
        $this->message->is_important = !$this->message->is_important;
        $this->message->save();

        $this->message = $this->message->fresh();

        $this->dispatch('notify', type: 'success', message: 'updated successfully');
    }

    public function render()
    {
        return view('livewire.pages.contact-messages.edit');
    }
}
