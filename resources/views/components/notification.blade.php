<div>

    <div x-data="{ show: false, timeout: null, title: '', subtitle: '' }"
        @notification.window="        
		setTimeout(() => {
            show = true;
        }, 1000);
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            show = false
        }, 4000);
        title=$event.detail.title
        subtitle=$event.detail.subtitle ? $event.detail.subtitle:''"
        style="display: none" x-show.transition.opacity.out.duration.1000ms="show"
        class="bg-white rounded-lg px-4 py-3 inline-block shadow-sm fixed top-20 right-5 top border border-opacity-75  z-50">
        <div class="flex justify-between">
            <div>
                <p class="font-medium text-sm text-green-500" x-html="title"></p>
                <p class="text-sm text-gray-500" x-html="subtitle"></p>
            </div>

            <div class="pl-3">
                <button x-on:click="show=false" class="cursor-pointer focus:outline-none block">
                    <span class="sr-only">Cerra</span>
                    <svg class="h-4 w-4 text-gray-400 focus:outline-none" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- <div x-data="{ show: false, msg: '' }"
    class="bg-indigo-600"
    x-show="show"
    style="display: none;"
    @notification.window=" show = true ; msg = $event.detail " >
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
                
                <p class="ml-3 font-medium text-white truncate">
                <span class="md:hidden" x-text='msg'></span>
                <span class="hidden md:inline" x-text='msg'></span>
                </p>
            </div>
            
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" x-on:click="show=false" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                <span class="sr-only">Dismiss</span>
               
                
                </button>
            </div>
            </div>
        </div>
    </div>-->


</div>
