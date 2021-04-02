<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" id="chat-notification">
    </div>

    {{-- http://laravel-echo-socket.io.prueba:6001/socket.io/socket.io.js --}}
    <script src="//{{ request()->getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const userId = '{{ auth()->id() }}';
    
        window.Echo.private(`user.${userId}`)
            .listen('.UserEvent',(data) => {
                console.log('Mensaje',data)
                const e = document.getElementById('chat-notification').innerHTML;
                document.getElementById('chat-notification').innerHTML = `
                    ${e}
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200 bg-red-300">
                                ${data.user?.email}
                            </div>
                        </div>
                    </div>
                `;
            });
    
        window.Echo.channel('message-channel')
            .listen('.MessageEvent',(data) => {
                console.log('Mensaje',data.message)
                const e = document.getElementById('chat-notification').innerHTML;
                document.getElementById('chat-notification').innerHTML = `
                    ${e}
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200 bg-yellow-300">
                                ${data.message}
                            </div>
                        </div>
                    </div>
                `;
            });

    </script>
</x-app-layout>
