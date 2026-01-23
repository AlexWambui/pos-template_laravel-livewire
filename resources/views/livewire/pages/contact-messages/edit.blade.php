<div class="ContactMessages max-w-2xl mx-auto py-4">
    <div class="contact_message EditMessage">
        <div class="header">
            <div class="info">
                <a href="{{ Route::has('contact-messages.index') ? route('contact-messages.index') : '#' }}" wire:navigate>
                    <x-svgs.arrow-left class="w-5 h-5" />
                </a>

                <div class="contact_info">
                    <h2>{{ $message->name }}</h2>
                    <p>
                        <span>{{ $message->email }}</span>
                        <span>{{ $message->phone_number }}</span>
                    </p>
                </div>
            </div>

            <div class="actions flex gap-2 justify-start lg:justify-end">
                <button wire:click="toggleImportant">
                    <x-svgs.star class="{{ $message->is_important ? 'fill-yellow-600 stroke-none' : 'fill-none stroke-yellow-600' }}" />
                </button>

                @if(auth()->user()->isAdmin())
                    <button x-data x-on:click.prevent="$wire.set('delete_message_id', {{ $message->id }}); $dispatch('open-modal', 'confirm-message-deletion')" class="btn_transparent">
                        <x-svgs.trash class="text-red-600 font-bold" />
                    </button>
                @endif
            </div>
        </div>

        <div class="message_details">
            <div class="user_message">
                <p class="message">{{ $message->message }}</p>
                <p class="timestamp">
                    <span class="date">{{ $message->created_at->format('M d, Y') }}</span>
                    <span class="time">{{ $message->created_at->format('H:i') }}<span />
                </p>
            </div>
        </div>
    </div>

    <x-modal name="confirm-message-deletion" :show="$delete_message_id !== null" focusable>
        <div class="custom_form">
            <form wire:submit="deleteMessage" @submit="$dispatch('close-modal', 'confirm-message-deletion')" class="p-6">
                <h2 class="text-lg font-semibold text-gray-900">Confirm Deletion</h2>

                <p class="mt-2 mb-4 text-sm text-gray-600">Are you sure you want to permanently delete this message?</p>

                <div class="mt-6 flex justify-start">
                    <button type="button" class="mr-2" x-on:click="$dispatch('close-modal', 'confirm-message-deletion')">
                        Cancel
                    </button>
                    <button type="submit" class="btn_danger">
                        Delete Message
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</div>
