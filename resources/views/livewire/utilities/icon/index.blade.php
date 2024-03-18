<div>

    <x-slot name="header">Icons</x-slot>

    <x-forms.m-panel>

        <div class="relative w-full">
            <label>
                <input type="search" wire:model.live="searches"  wire:keydown.escape="$set('searches', '')"
                       class="search-box"
                       placeholder="type for Search...           escape to clear">
            </label>
            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                <x-icons.search-lens/>
            </div>
        </div>

{{--<----row-1----->--}}
        <div class="bg-white-900">
            <div class="flex justify-between items-center p-2">
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('wifi')">
                    <x-icons.icons :icons="'wifi'"  class="block w-16 h-auto  grid-rows-1  ml-5 mt-6"/>
                    <h5 class="mt-6">wifi</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('chat')">
                    <x-icons.icons :icons="'chat'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">Chat</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('share')">
                    <x-icons.icons :icons="'share'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">share</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('message')">
                    <x-icons.icons :icons="'message'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">message</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('login')">
                    <x-icons.icons :icons="'login'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">login</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('log-out')">
                    <x-icons.icons :icons="'log-out'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">log-out</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('wordpress')">
                    <x-icons.icons :icons="'wordpress'"  class="block w-16 h-auto  grid-rows-1  ml-5 mt-4"/>
                    <h5 class="mt-8">WordPress</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard( ' power' )">
                    <x-icons.icons :icons="'power'"  class="block w-16 h-auto  grid-rows-1  ml-5 mt-4"/>
                    <h5 class="mt-8">power</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('person-add')">
                    <x-icons.icons :icons="'person-add'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">person-add</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('key')">
                    <x-icons.icons :icons="'key'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">key</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('gitHub')">
                    <x-icons.icons :icons="'gitHub'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">gitHub</h5>
                </button>
            </div>
        </div>
{{--        <----end---->--}}

{{--<---icon-2---->--}}
        <div class="flex justify-between items-center bg-white-900 p-2">

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('location')">
                    <x-icons.icons :icons="'location'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">location</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('flag')">
                    <x-icons.icons :icons="'flag'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">flag</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('facebook')">
                    <x-icons.icons :icons="'facebook'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">facebook</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('email')">
                    <x-icons.icons :icons="'email'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">email</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('view')">
                    <x-icons.icons :icons="'view'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">view</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('Coin')">
                    <x-icons.icons :icons="'Coin'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">Coin</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-right')">
                    <x-icons.icons :icons="'doublearrow-right'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-1"/>
                    <h5 class="mt-4">doublearrow-right</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-left')">
                    <x-icons.icons :icons="'doublearrow-left'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-1"/>
                    <h5 class="mt-4">doublearrow-left</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-up')">
                    <x-icons.icons :icons="'doublearrow-up'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-1"/>
                    <h5 class="mt-4">doublearrow-up</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-down')">
                    <x-icons.icons :icons="'doublearrow-down'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-1"/>
                    <h5 class="mt-4">doublearrow-down</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('clock')">
                    <x-icons.icons :icons="'clock'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">clock</h5>
                </button>
            </div>
        </div>
        {{--        <----end---->--}}
{{--            <---row-3---->--}}
        <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('save')">
                        <x-icons.icon :icon="'save'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">save</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('trash')">
                        <x-icons.icon :icon="'trash'"  class="block w-16 h-auto  grid-rows-1 " />
                        <h5 class="mt-8">trash</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('pencil')">
                        <x-icons.icon :icon="'pencil'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">pencil</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('chevrons-left')">
                        <x-icons.icon :icon="'chevrons-left'"  class="block w-16 h-auto  grid-rows-1 mt-1"/>
                        <h5 class="mt-4">chevrons-left</h5>
                    </button>
                </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('printer')">
                    <x-icons.icon :icon="'printer'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">printer</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('plus')">
                    <x-icons.icon :icon="'plus'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">plus</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('paperplane')">
                    <x-icons.icon :icon="'paperplane'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">paperplane</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('cart')">
                    <x-icons.icon :icon="'cart'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">cart</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('cog')">
                    <x-icons.icon :icon="'cog'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">cog</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 "    onclick="copyToClipboard('arrowcircleright')">
                    <x-icons.icon :icon="'arrowcircleright'"  class="block w-16 h-auto  grid-rows-1 mr-2.5"/>
                    <h5 class="mt-7">arrowright</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('annotation')">
                    <x-icons.icon :icon="'annotation'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">annotation</h5>
                </button>
            </div>
        </div>

            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('adjustments')">
                        <x-icons.icon :icon="'adjustments'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">adjustments</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('refresh')">
                        <x-icons.icon :icon="'refresh'"  class="block w-16 h-auto  grid-rows-1 " />
                        <h5 class="mt-8">refresh</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('check-circle')">
                        <x-icons.icon :icon="'check-circle'"  class="block w-16 h-auto  grid-rows-1 pt-1"/>
                        <h5 class="mt-6">check-circle</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('exclamation-circle')">
                        <x-icons.icon :icon="'exclamation-circle'"  class="block w-16 h-auto  grid-rows-1 pt-1"/>
                        <h5 class="mt-5">exclamation-circle</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('information-circle')">
                        <x-icons.icon :icon="'information-circle'"  class="block w-16 h-auto  grid-rows-1  pt-1"/>
                        <h5 class="mt-5">information-circle</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('x-circle')">
                        <x-icons.icon :icon="'x-circle'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">x-circle</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('backward')">
                        <x-icons.icon :icon="'backward'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">backward</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('user')">
                        <x-icons.icons :icons="'user'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">user</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('globe')">
                        <x-icons.icons :icons="'globe'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">globe</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 "    onclick="copyToClipboard('home')">
                        <x-icons.icons  :icons="'home'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-7">home</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('chevron')">
                        <x-icons.icons :icons="'chevron'"  class="block w-20 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">chevron</h5>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('newspaper')">
                        <x-icons.icons :icons="'newspaper'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">newspaper</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('collection')">
                        <x-icons.icons :icons="'collection'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">Collection</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('terminal')">
                        <x-icons.icons :icons="'terminal'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">terminal</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('document')">
                        <x-icons.icons :icons="'document'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">document</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('receipt')">
                        <x-icons.icons :icons="'receipt'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">receipt</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('ticket')">
                        <x-icons.icons :icons="'ticket'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-1"/>
                        <h5 class="mt-7">ticket</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('cube')">
                        <x-icons.icons :icons="'cube'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-2"/>
                        <h5 class="mt-8">cube</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('amazon')">
                        <x-icons.icons :icons="'amazon'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">amazon</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('amd')">
                        <x-icons.icons :icons="'amd'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">amd</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 "    onclick="copyToClipboard('android')">
                        <x-icons.icons :icons="'android'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-7">android</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('calculator')">
                        <x-icons.icons :icons="'calculator'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">calculator</h5>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('controller')">
                        <x-icons.icons :icons="'controller'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">controller</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('database')">
                        <x-icons.icons :icons="'database'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">database</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('dropbox')">
                        <x-icons.icons :icons="'dropbox'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">dropbox</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('fingerprint')">
                        <x-icons.icons :icons="'fingerprint'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">fingerprint</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('instagram')">
                        <x-icons.icons :icons="'instagram'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">instagram</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('linkedin')">
                        <x-icons.icons :icons="'linkedin'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-1"/>
                        <h5 class="mt-7">linkedin</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('qr-code')">
                        <x-icons.icons :icons="'qr-code'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-2"/>
                        <h5 class="mt-8">qr-code</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('skype')">
                        <x-icons.icons :icons="'skype'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">skype</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('stack')">
                        <x-icons.icons :icons="'stack'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">stack</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 "    onclick="copyToClipboard('table')">
                        <x-icons.icons :icons="'table'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-7">table</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('twitter')">
                        <x-icons.icons :icons="'twitter'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">twitter</h5>
                    </button>
                </div>
            </div>3
            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('X-diamond')">
                        <x-icons.icons :icons="'X-diamond'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">X-diamond</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('unity')">
                        <x-icons.icons :icons="'unity'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">unity</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('virus')">
                        <x-icons.icons :icons="'virus'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">virus</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('wikipedia')">
                        <x-icons.icons :icons="'wikipedia'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">wikipedia</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('whatsapp')">
                        <x-icons.icons :icons="'whatsapp'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">whatsapp</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('google')">
                        <x-icons.icons :icons="'google'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-1"/>
                        <h5 class="mt-7">google</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('zoom-out')">
                        <x-icons.icons :icons="'zoom-out'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-2"/>
                        <h5 class="mt-8">zoom-out</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('google-play')">
                        <x-icons.icons :icons="'google-play'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">google-play</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('youtube')">
                        <x-icons.icons :icons="'youtube'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">youtube</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 "    onclick="copyToClipboard('zoom-out')">
                        <x-icons.icons :icons="'zoom-out'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-7">zoom-out</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('google-chrome')">
                        <x-icons.icons :icons="'google-chrome'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 "/>
                        <h5 class="mt-5">google-chrome</h5>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('location_outline')">
                        <x-icons.icons :icons="'location_outline'"  class="block w-16 h-auto grid-rows-1 mr-3"/>
                        <h5 class="mt-8 ">location</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('dots-circle-horizontal')">
                        <x-icons.icons :icons="'dots-circle-horizontal'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">dots-circle-horizontal</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('color-swatch')">
                        <x-icons.icons :icons="'color-swatch'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-3"/>
                        <h5 class="mt-6">color-swatch</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('variable')">
                        <x-icons.icons :icons="'variable'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-2"/>
                        <h5 class="mt-8">variable</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('view-grid-add')">
                        <x-icons.icons :icons="'view-grid-add'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">view-grid-add</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('scale')">
                        <x-icons.icons :icons="'scale'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-7">scale</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('office-building')">
                        <x-icons.icons :icons="'office-building'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">office-building</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('document-text')">
                        <x-icons.icons :icons="'document-text'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">document-Text</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('library')">
                        <x-icons.icons :icons="'library'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-8">library</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300 "    onclick="copyToClipboard('document-report')">
                        <x-icons.icons :icons="'document-report'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">document-Report</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-32 h-32 hover:bg-gray-300"    onclick="copyToClipboard('receipt-refund')">
                        <x-icons.icons :icons="'receipt-refund'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">receipt-refund</h5>
                    </button>
                </div>
            </div>


        </div>



    </x-forms.m-panel>
</div>
