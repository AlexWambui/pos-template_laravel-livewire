<div class="ContactMessages">
    <div class="container">
        <div class="app_header">
            <div class="info">
                <h2>Contact Messages</h2>
                <div class="stats">
                    <span>{{ $count_messages }} {{ Str::plural('message', $count_messages) }}</span>
                    <span>{{ $count_unread_messages }} unread</span>
                </div>
            </div>

            <div class="search">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search by email, name, phone number..."
                        wire:model="search"
                        wire:keydown.enter="performSearch"
                        class="pr-8"
                    >
                    @if($search)
                        <button
                            wire:click="resetSearch"
                            class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        >
                            X
                        </button>
                    @endif
                </div>
            </div>

            <div class="button">

            </div>
        </div>

        <div class="messages_list">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th class="action">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($messages as $message)
                            <tr class="{{ $message->is_not_read ? 'font-bold' : '' }}">
                                <td class="numbering">
                                    {{ ($messages->currentPage() - 1) * $messages->perPage() + $loop->iteration }}
                                    <x-svgs.star class="{{ $message->is_important ? 'fill-yellow-600 stroke-none' : 'fill-none stroke-yellow-600' }}" />
                                </td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone_number }}</td>
                                <td>{{ Str::limit($message->message, 50, '...') }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ Route::has('contact-messages.edit') ? route('contact-messages.edit', $message->uuid) : '#' }}" wire:navigate>
                                            <x-svgs.edit class="edit" />
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No messages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination mt-4">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</div>
