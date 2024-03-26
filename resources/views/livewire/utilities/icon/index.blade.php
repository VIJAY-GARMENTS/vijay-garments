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
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('wifi')">
                    <x-icons.icon :icon="'wifi'"  class="block w-16 h-auto  grid-rows-1  ml-5 mt-6"/>
                    <h5 class="mt-6">wifi</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('chat')">
                    <x-icons.icon :icon="'chat'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">Chat</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('share')">
                    <x-icons.icon :icon="'share'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">share</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('message')">
                    <x-icons.icon :icon="'message'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">message</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('login')">
                    <x-icons.icon :icon="'login'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">login</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('log-out')">
                    <x-icons.icon :icon="'log-out'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">log-out</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('annotation')">
                    <x-icons.icon :icon="'annotation'"  class="block w-16 h-auto  grid-rows-1  ml-5 mt-4"/>
                    <h5 class="mt-8">annotation</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard( 'save' )">
                    <x-icons.icon :icon="'save'"  class="block w-16 h-auto  grid-rows-1  ml-5 mt-4"/>
                    <h5 class="mt-8">save</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('trash')">
                    <x-icons.icon :icon="'trash'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">trash</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('email')">
                    <x-icons.icon :icon="'email'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">email</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('printer')">
                    <x-icons.icon :icon="'printer'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">printer</h5>
                </button>
            </div>
        </div>
{{--        <----end row-1---->--}}

{{--<---icon-2---->--}}
        <div class="flex justify-between items-center bg-white-900 p-2">

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('location')">
                    <x-icons.icon :icon="'location'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">location</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('flag')">
                    <x-icons.icon :icon="'flag'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">flag</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('qr-code')">
                    <x-icons.icon :icon="'qr-code'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">qr-code</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('globe')">
                    <x-icons.icon :icon="'globe'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">globe</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('view')">
                    <x-icons.icon :icon="'view'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">view</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('cube')">
                    <x-icons.icon :icon="'cube'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-4"/>
                    <h5 class="mt-8">cube</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('link')">
                    <x-icons.icon :icon="'link'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-1"/>
                    <h5 class="mt-4">link</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-left')">
                    <x-icons.icon :icon="'doublearrow-left'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-1"/>
                    <h5 class="mt-4">doublearrow-left</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-2 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('mail')">
                    <x-icons.icon :icon="'mail'"  class="block w-16 h-auto  grid-rows-1 ml-2 mt-1"/>
                    <h5 class="mt-3">mail</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-7 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('unity')">
                    <x-icons.icon :icon="'unity'"  class="block w-16 h-auto  grid-rows-1 ml-4 mt-1"/>
                    <h5 class="mt-4">unity</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-3 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('paper-plane')">
                    <x-icons.icon :icon="'paper-plane'"  class="block w-16 h-auto  grid-rows-1 ml-2 mt-4"/>
                    <h5 class="mt-6">paper-plane</h5>
                </button>
            </div>
        </div>
        {{--        <----end row-2---->--}}
{{--            <---row-3---->--}}
        <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('gitHub')">
                        <x-icons.icon :icon="'gitHub'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-5">gitHub</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('amazon')">
                        <x-icons.icon :icon="'amazon'"  class="block w-16 h-auto  grid-rows-1 " />
                        <h5 class="mt-8">amazon</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('instagram')">
                        <x-icons.icon :icon="'instagram'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">instagram</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-8 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('linkedin')">
                        <x-icons.icon :icon="'linkedin'"  class="block w-16 h-auto  grid-rows-1 mt-1"/>
                        <h5 class="mt-4">linkedin</h5>
                    </button>
                </div>
            <div>
                <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('twitter')">
                    <x-icons.icon :icon="'twitter'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">twitter</h5>
                </button>
            </div>

            <div>
                <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('skype')">
                    <x-icons.icon :icon="'skype'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">skype</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('wikipedia')">
                    <x-icons.icon :icon="'wikipedia'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">wikipedia</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('cart')">
                    <x-icons.icon :icon="'cart'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">cart</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('whatsapp')">
                    <x-icons.icon :icon="'whatsapp'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-8">whatsapp</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('google')">
                    <x-icons.icon :icon="'google'"  class="block w-16 h-auto  grid-rows-1 mr-2.5"/>
                    <h5 class="mt-7">google</h5>
                </button>
            </div>
            <div>
                <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('google-chrome')">
                    <x-icons.icon :icon="'google-chrome'"  class="block w-16 h-auto  grid-rows-1"/>
                    <h5 class="mt-5">google-chrome</h5>
                </button>
            </div>
        </div>
            {{--            <---end row-3---->--}}
            {{--            <---row-4---->--}}
            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-right')">
                        <x-icons.icon :icon="'doublearrow-right'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-2">doublearrow-right</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-left')">
                        <x-icons.icon :icon="'doublearrow-left'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-2">doublearrow-left</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-up')">
                        <x-icons.icon :icon="'doublearrow-up'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-2">doublearrow-up</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('doublearrow-down')">
                        <x-icons.icon :icon="'doublearrow-down'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-2">doublearrow-down</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-8 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('chevron')">
                        <x-icons.icon :icon="'chevron'"  class="block w-16 h-auto mr-2 grid-rows-1"/>
                        <h5 class="mt-2">chevron</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('chevrons-left')">
                        <x-icons.icon :icon="'chevrons-left'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-2">chevrons-left</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('uturn-left')">
                        <x-icons.icon :icon="'uturn-left'"  class="block w-16 h-auto  grid-rows-1"/>
                        <h5 class="mt-8">uturn-left</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('uturn-right')">
                        <x-icons.icon :icon="'uturn-right'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">uturn-right</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('backward')">
                        <x-icons.icon :icon="'backward'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">backward</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-8 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('arrow-circle-right')">
                        <x-icons.icon  :icon="'arrow-circle-right'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">arrow-circle-right</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('arrow-down')">
                        <x-icons.icon :icon="'arrow-down'"  class="block w-20 h-auto  grid-rows-1 ml-2 mt-3"/>
                        <h5 class="mt-8">arrow-down</h5>
                    </button>
                </div>
            </div>
            {{--            <---end row-4---->--}}
            {{--            <---row-5---->--}}
            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('newspaper')">
                        <x-icons.icon :icon="'newspaper'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">newspaper</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('collection')">
                        <x-icons.icon :icon="'collection'"  class="block w-16 h-auto  grid-rows-1 ml-4 mt-3"/>
                        <h5 class="mt-5">Collection</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('document-text')">
                        <x-icons.icon :icon="'document-text'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-5">document-text</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-3 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('document')">
                        <x-icons.icon :icon="'document'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-5">document</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('receipt')">
                        <x-icons.icon :icon="'receipt'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">receipt</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('ticket')">
                        <x-icons.icon :icon="'ticket'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-1"/>
                        <h5 class="mt-7">ticket</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('receipt-refund')">
                        <x-icons.icon :icon="'receipt-refund'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-2"/>
                        <h5 class="mt-5">receipt-refund</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('document-report')">
                        <x-icons.icon :icon="'document-report'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-5">document-report</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('clipboard-doc')">
                        <x-icons.icon :icon="'clipboard-doc'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-4 mt-3"/>
                        <h5 class="mt-5">clipboard-doc</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-8 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('android')">
                        <x-icons.icon :icon="'android'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-2 mt-3"/>
                        <h5 class="mt-7">android</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-4 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('document-duplicate')">
                        <x-icons.icon :icon="'document-duplicate'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-4">document-duplicate</h5>
                    </button>
                </div>
            </div>
            {{--            <---end row-5---->--}}
            {{--            <---row-6---->--}}
            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('controller')">
                        <x-icons.icon :icon="'controller'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">controller</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('database')">
                        <x-icons.icon :icon="'database'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">database</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('dropbox')">
                        <x-icons.icon :icon="'dropbox'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">dropbox</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('fingerprint')">
                        <x-icons.icon :icon="'fingerprint'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">fingerprint</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('window')">
                        <x-icons.icon :icon="'window'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">window</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('linkedin')">
                        <x-icons.icon :icon="'linkedin'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-1"/>
                        <h5 class="mt-7">linkedin</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('dashboard')">
                        <x-icons.icon :icon="'dashboard'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-2"/>
                        <h5 class="mt-8">dashboard</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-4 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('dashboard-outline')">
                        <x-icons.icon :icon="'dashboard-outline'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-3 mt-3"/>
                        <h5 class="mt-4">dashboard-outline</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-8 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('stack')">
                        <x-icons.icon :icon="'stack'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">stack</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('common')">
                        <x-icons.icon :icon="'common'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-7">common</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('home')">
                        <x-icons.icon :icon="'home'"  class="block w-16 h-auto  grid-rows-1 pt-2 ml-2 mt-3"/>
                        <h5 class="mt-8">home</h5>
                    </button>
                </div>
            </div>
            {{--            <---end row-6---->--}}
            {{--            <---row-7---->--}}
            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('X-diamond')">
                        <x-icons.icon :icon="'X-diamond'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">X-diamond</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('unity')">
                        <x-icons.icon :icon="'unity'"  class="block w-16 h-auto  grid-rows-1 ml-5 mt-3"/>
                        <h5 class="mt-8">unity</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('virus')">
                        <x-icons.icon :icon="'virus'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">virus</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('view-grid-add')">
                        <x-icons.icon :icon="'view-grid-add'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">view-grid-add</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('scale')">
                        <x-icons.icon :icon="'scale'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">scale</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('rocket')">
                        <x-icons.icon :icon="'rocket'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-1"/>
                        <h5 class="mt-7">rocket</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('face-smile')">
                        <x-icons.icon :icon="'face-smile'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-2"/>
                        <h5 class="mt-8">face-smile</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('google-play')">
                        <x-icons.icon :icon="'google-play'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">google-play</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('youtube')">
                        <x-icons.icon :icon="'youtube'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-8">youtube</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('star')">
                        <x-icons.icon :icon="'star'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 mt-3"/>
                        <h5 class="mt-7">star</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('sparkles')">
                        <x-icons.icon :icon="'sparkles'"  class="block w-16 h-auto  grid-rows-1 pt-1 ml-5 "/>
                        <h5 class="mt-5">sparkles</h5>
                    </button>
                </div>
            </div>
            {{--            <---end row-7---->--}}
            {{--            <---row-8---->--}}
            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('cal-month')">
                        <x-icons.icon :icon="'cal-month'"  class="block w-16 h-auto grid-rows-1 mr-3"/>
                        <h5 class="mt-8 ">cal-month                  </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('dots-circle-horizontal')">
                        <x-icons.icon :icon="'dots-circle-horizontal'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">dots-circle-horizontal</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('color-swatch')">
                        <x-icons.icon :icon="'color-swatch'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-3"/>
                        <h5 class="mt-6">color-swatch</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('variable')">
                        <x-icons.icon :icon="'variable'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-2"/>
                        <h5 class="mt-8">variable</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('minus')">
                        <x-icons.icon :icon="'minus'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">minus</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('bar-center')">
                        <x-icons.icon :icon="'bar-center'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-7">bar-center</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('list-bullet')">
                        <x-icons.icon :icon="'list-bullet'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">list-bullet</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('check-circle')">
                        <x-icons.icon :icon="'check-circle'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">check-circle</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('exclamation-circle')">
                        <x-icons.icon :icon="'exclamation-circle'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-5">exclamation-circle</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('information-circle')">
                        <x-icons.icon :icon="'information-circle'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">information-circle</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('x-circle')">
                        <x-icons.icon :icon="'x-circle'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">x-circle</h5>
                    </button>
                </div>
            </div>
                {{--            <---end row-8---->--}}
                {{--            <---row-9---->--}}
                <div class="flex justify-between items-center bg-white-900 p-2">
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('refresh')">
                            <x-icons.icon :icon="'refresh'"  class="block w-16 h-auto grid-rows-1 mr-3"/>
                            <h5 class="mt-8 ">refresh</h5>
                        </button>
                    </div>

                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('adjustments')">
                            <x-icons.icon :icon="'adjustments'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                            <h5 class="mt-5">adjustments</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('user-circle')">
                            <x-icons.icon :icon="'user-circle'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-3"/>
                            <h5 class="mt-6">user-circle</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('users')">
                            <x-icons.icon :icon="'users'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-2"/>
                            <h5 class="mt-8">users</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-1 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('user-group')">
                            <x-icons.icon :icon="'user-group'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                            <h5 class="mt-5">user-group</h5>
                        </button>
                    </div>

                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('user')">
                            <x-icons.icon :icon="'user'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                            <h5 class="mt-7">user</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('person-add')">
                            <x-icons.icon :icon="'person-add'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                            <h5 class="mt-5">person-add</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('profile')">
                            <x-icons.icon :icon="'profile'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                            <h5 class="mt-5">profile</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('cog')">
                            <x-icons.icon :icon="'cog'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                            <h5 class="mt-8">cog</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('bulb')">
                            <x-icons.icon :icon="'bulb'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                            <h5 class="mt-5">bulb</h5>
                        </button>
                    </div>
                    <div>
                        <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('credit-card')">
                            <x-icons.icon :icon="'credit-card'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                            <h5 class="mt-5">credit-card</h5>
                        </button>
                    </div>
                </div>
            {{--            <---end row-9---->--}}
            {{--            <--- row-10---->--}}

            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('lock-closed')">
                        <x-icons.icon :icon="'lock-closed'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">lock-closed</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('lock-open')">
                        <x-icons.icon :icon="'lock-open'"  class="block w-16 h-auto grid-rows-1 mr-3"/>
                        <h5 class="mt-8 ">lock-open</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('scissors')">
                        <x-icons.icon :icon="'scissors'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-3"/>
                        <h5 class="mt-6">scissors</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('pen-nib')">
                        <x-icons.icon :icon="'pen-nib'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-2"/>
                        <h5 class="mt-8">pen-nib</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-1 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('bug-ant')">
                        <x-icons.icon :icon="'bug-ant'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">bug-ant</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('truck')">
                        <x-icons.icon :icon="'truck'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-7">truck</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('utilities')">
                        <x-icons.icon :icon="'utilities'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">utilities</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('rocket')">
                        <x-icons.icon :icon="'rocket'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">rocket</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('shop-bag')">
                        <x-icons.icon :icon="'shop-bag'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-8">shop-bag</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('cash')">
                        <x-icons.icon :icon="'cash'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">cash</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('apple')">
                        <x-icons.icon :icon="'apple'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">apple</h5>
                    </button>
                </div>
            </div>

            {{-- <---end row-10---->--}}
            {{--            <--- row-11---->--}}

            <div class="flex justify-between items-center bg-white-900 p-2">
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('book')">
                        <x-icons.icon :icon="'book'"  class="block w-16 h-auto grid-rows-1 mr-3"/>
                        <h5 class="mt-8 ">book</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('book-open')">
                        <x-icons.icon :icon="'book-open'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                        <h5 class="mt-5">book-open</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('users')">
                        <x-icons.icon :icon="'users'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-3"/>
                        <h5 class="mt-6">users</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('folder')">
                        <x-icons.icon :icon="'folder'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-2"/>
                        <h5 class="mt-8">folder</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-1 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('table')">
                        <x-icons.icon :icon="'table'"  class="block w-16 h-auto  grid-rows-1 mr-7 mb-1"/>
                        <h5 class="mt-5">table</h5>
                    </button>
                </div>

                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('calculator')">
                        <x-icons.icon :icon="'calculator'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-7">calculator</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('amd')">
                        <x-icons.icon :icon="'amd'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">amd</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('terminal')">
                        <x-icons.icon :icon="'terminal'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                        <h5 class="mt-5">terminal</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('key')">
                        <x-icons.icon :icon="'key'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                        <h5 class="mt-8">key</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('wordpress')">
                        <x-icons.icon :icon="'wordpress'"  class="block w-16 h-auto  grid-rows-1 mr-2 mb-5"/>
                        <h5 class="mt-8">wordpress</h5>
                    </button>
                </div>
                <div>
                    <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('Coin')">
                        <x-icons.icon :icon="'Coin'"  class="block w-16 h-auto  grid-rows-1 mr-1.5 mb-3"/>
                        <h5 class="mt-8">Coin</h5>
                    </button>
                </div>
            </div>

                {{-- <---end row-11---->--}}
                {{--  <--- row-12---->--}}
                    <div class="flex justify-between items-center bg-white-900 p-2">
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('hour-glass')">
                                <x-icons.icon :icon="'hour-glass'"  class="block w-16 h-auto grid-rows-1 bg-white-950 mr-3"/>
                                <h5 class="mt-8 ">hour-glass</h5>
                            </button>
                        </div>

                        <div>
                            <button class="border border-gray-300 p-10 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('clock')">
                                <x-icons.icon :icon="'clock'"  class="block w-16 h-auto  grid-rows-1 mr-1  mb-3"/>
                                <h5 class="mt-5">clock</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('library')">
                                <x-icons.icon :icon="'library'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-3"/>
                                <h5 class="mt-6">library</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 pt-1"    onclick="copyToClipboard('office-building')">
                                <x-icons.icon :icon="'office-building'"  class="block w-16 h-auto  grid-rows-1 mr-3 mt-2"/>
                                <h5 class="mt-5">office-building</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300  pt-1"    onclick="copyToClipboard('store')">
                                <x-icons.icon :icon="'store'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                                <h5 class="mt-5">store</h5>
                            </button>
                        </div>

                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('book')">
                                <x-icons.icon :icon="'book'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                                <h5 class="mt-7">book</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('calender-1')">
                                <x-icons.icon :icon="'calender-1'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                                <h5 class="mt-5">calender-1</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('grid')">
                                <x-icons.icon :icon="'grid'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                                <h5 class="mt-5">grid</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('utilities')">
                                <x-icons.icon :icon="'utilities'"  class="block w-16 h-auto  grid-rows-1  mr-3"/>
                                <h5 class="mt-8">utilities</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300 "    onclick="copyToClipboard('profile')">
                                <x-icons.icon :icon="'profile'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-5"/>
                                <h5 class="mt-5">profile</h5>
                            </button>
                        </div>
                        <div>
                            <button class="border border-gray-300 p-5 bg-white-600 grid grid-rows-2 w-36 h-36 hover:bg-gray-300"    onclick="copyToClipboard('eye-slash')">
                                <x-icons.icon :icon="'eye-slash'"  class="block w-16 h-auto  grid-rows-1 mr-3 mb-3"/>
                                <h5 class="mt-5">eye-slash</h5>
                            </button>
                        </div>
                </div>
            </div>
    </x-forms.m-panel>
</div>

