<div>
    <div x-data="qrhe()" x-init="qrcj()" class="h-screen w-screen bg-violet-500" wire:poll>
        <div class="flex flex-col justify-center items-center h-full w-full">
            @if (!$luser == 2)
                
            @else
            <h1 class="text-6xl font-bold text-white">
                @if ($luser == 3)
                    Whatsapp Server Is Not Running...
                @else
                    Scan The QR
                @endif
            </h1>
            @endif

            @if ($luser == 1)
                <img src="{{ $result }}" alt="qr-img" class="mt-4 w-72 h-72 border-[1px] border-white shadow-xl">
            @elseif ($luser == 2)
                <div class="mt-4 flex flex-col bg-white/30 rounded-lg backdrop-blur-md shadow-2xl py-10 px-10 w-1/3">
                    <h1 class="text-3xl font-bold text-white mb-10 text-center">Send Message</h1>
                    <form wire:submit.prevent='msgs' class="flex flex-col gap-y-2">
                        <label for="number" class="text-slate-600 font-semibold text-xl">Enter Contact Number</label>
                        <input type="text" name="number" wire:model='number' class="rounded-lg py-2 px-2">

                        <label for="message" class="text-slate-600 font-semibold text-xl">Enter Your Message</label>
                        <input type="text" name="message" wire:model='msg' class="rounded-lg py-2 px-2">

                        <div class="w-full flex justify-center items-center gap-2">
                        <button type="submit" class="mt-5 bg-white rounded-lg w-1/4 p-2 font-semibold text-slate-700 hover:shadow-[0px_0px_25px_-5px] hover:shadow-white hover:scale-125 transition-all">send</button>
                    </div>
                    </form>
                    <button wire:click='lgout' class="mt-5 bg-white rounded-lg w-1/4 p-2 font-semibold text-slate-700 hover:shadow-[0px_0px_25px_-5px] hover:shadow-white hover:scale-125 transition-all">logout</button>
                </div>
            @endif
        </div>
    </div>

    @push('js')
        <script>
            function qrhe() {
                return {

                    qrcj() {
                        setInterval(() => {
                            this.$wire.genrc();
                            console.log(true);
                        }, 50);
                    }
                }
            }
        </script>
    @endpush
</div>
