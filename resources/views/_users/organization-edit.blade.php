<x-app-layout>   
    
    <!-- Error Mesage -->
    <x-alert-message/>

    <div x-data="{ removeMember:false, modal:false }" class="pt-24">
        <div class="px-4 lg:px-8">
            <h1 class="text-xl"><span class="text-primary-blue hover:text-semantic-info"> <a href="{{ route('organization.index') }}"> Organizations </a></span>/ 
                <span class="text-primary-blue hover:text-semantic-info"> <a href="{{ route('organization.show', ['id' => $currOrg->id]) }}"> {{ $currOrg->org_name }}</a></span> / Edit Member</h1>
            <div class="flex">
                <div class="basis-full h-auto bg-white mt-4 rounded-sm shadow-sm p-6 lg:basis-[50%] xl:basis-[40%]">
                    <form action="{{route('organization.update', ['id' => $currOrg ,'member' => $selected->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <div>
                                <!-- Name -->
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $selected->first_name }} {{ $selected->last_name }}" disabled="true" autofocus />
                            </div>

                                <!-- Position -->
                                <div class="mt-3">
                                    <x-label for="position" :value="__('Position')" />
                                
                                    <x-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required autofocus value="{{ $selected->studentOrg->first()->pivot->position }}" />
                                    @error('position')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Roles -->
                                <div class="mt-3">
                                    <x-label for="role" :value="__('Role')"/>
                                    {{-- @dd($selected->role->first()->id) --}}

                                    <x-select name="role" aria-label="Default select example">
                                        <option selected disabled>--choose role--</option>
                                        <option {{ $selected->studentOrg->first()->pivot->role == "Moderator" ? 'selected':'' }}  value="Moderator">Moderator</option>
                                        <option {{ $selected->studentOrg->first()->pivot->role == "Editor" ? 'selected':'' }}  value="Editor">Editor</option>
                                        <option {{ $selected->studentOrg->first()->pivot->role == "Viewer" ? 'selected':'' }}  value="Viewer">Viewer</option>
                                    </x-select>
                                    @error('role')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                        

                            <!-- Edit Member Button -->
                            <div class="flex justify-between items-center pt-8">
                                <div>
                                 <a class="text-sm text-semantic-danger cursor-pointer hover:text-rose-800 hover:underline" @click="removeMember=true, modal=true">Remove Member</a>
                                </div>
                                <div class="">
                                    <x-button bg="bg-semantic-success" hover="hover:bg-green-600" type="submit">
                                        {{ __('Edit Member') }}
                                    </x-button>
                                </div>


                            </div>
                            
                        </div>
                    
                    </form>
                </div>
            </div>

            <!-- Remove Member Modal -->
            <x-modal name="removeMember">
                <div class="text-sm py-5 text-left">
                    Are you sure you want to remove <b>{{ $selected->first_name }} {{ $selected->last_name }}</b> from <b>{{ $currOrg->org_name }}</b>?
                </div>
                
                <div class="flex justify-end space-x-2 mt-5">
                    <form action="{{ route('organization.destroy', ['id' => $currOrg ,'member' => $selected->id ]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button bg="bg-semantic-danger" hover="hover:bg-rose-600" type="submit" >
                            {{ __('Remove') }}
                            
                        </x-button>
                    </form>

                    <x-button bg="bg-semantic-success" hover="hover:bg-green-600" @click="removeMember = false, modal = false" >
                            {{ __('Cancel') }}
                    </x-button>
                </div>
            </x-modal>
        </div>
        
</x-app-layout>

            