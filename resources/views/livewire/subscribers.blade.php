<div class="p-6 bg-white border-b border-gray-200">
    <p class="mb-6 text-2xl font-bold text-gray-600 undeline">
        Subscribers
    </p>

    <div class="px-8">
        <x-input
            type="text"
            class="float-right w-1/3 pl-8 mb-4 border border-gray-300 rounded-lg"
            placeholder="Search"
            wire:model="search"
        >
        </x-input>
        @if($subscribers->isEmpty())
            <div class="flex w-full p-5 bg-red-100 rounded-lg">
                <p class="text-red-400">
                    No subscribers found
                </p>
            </div>
        @else
            <table class="w-full">
                <thead 
                    class="text-indigo-600 border-b-2 border-gray-300"
                >
                    <tr>
                        <th class="px-6 py-3 text-left">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left">
                            Verified
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr class="text-indigo-900 border-b border-gray-300 text-small">
                            <td class="px-6 py-3">
                                {{ $subscriber->email }}
                            </td>
                            <td class="px-6 py-3">
                                {{ optional($subscriber->email_verified_at)
                                    ->diffForHumans() ?? 'Never' }}
                            </td>
                            <td class="px-6 py-3">
                                <x-button 
                                    class="text-red-500 border border-red-500 bg-red-50 hover:bg-red-100"
                                    wire:click="delete({{ $subscriber->id }})"
                                >
                                    Delete
                                </x-button>
                            </td>
                        </tr>
                    @endforeach                                
                </tbody>
            </table>  
        @endif
    </div>
</div>
