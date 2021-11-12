@props(['sessionName'])

@if(session()->has($sessionName))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show">
        {{--<p>{{session(Config::get('constants.SESSION.SUCCESS'))}}</p>--}}
        <p class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 text-sm rounded-2xl">{{session()->get($sessionName)}}</p>
    </div>
@endif
