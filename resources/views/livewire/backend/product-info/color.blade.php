@push('css')

@endpush
<div>
    <x-slot name="title">
        Colors
    </x-slot>
    <h4 class="pb-2">All Colors</h4>
    <div class="row">

            {{-- Start Show All Colors --}}
            <div class="col-md-7">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Colors</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">
                                    <div class="float-right">Options</div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                @endphp
                            @foreach ($colors as $color)
                              <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $color->name }}</td>
                                <td>
                                    <div class="float-right">
                                        <button class="rounded-circle btn-sm border-0 p-2 editButton" style="background-color: rgb(148, 170, 243);" wire:click="editColor({{ $color->id }})"><i class="fas fa-edit"></i></button>
                                        <button class="rounded-circle btn-sm border-0 p-2 deleteButton" style="background-color: rgb(229, 160, 160);" wire:click="deleteColor({{ $color->id }})"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                              </tr>
                            @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            {{-- End Show All Colors --}}

            {{-- Start Add Color --}}
            <div class="col-md-5">
                {{-- Card --}}
                <div class="card">
                     <div class="card-header" style="background-color: rgb(236, 239, 241);">
                       <h4 class="text-dark pb mb-0">Add New Color</h4>
                     </div>
                    <form wire:submit.prevent="colorSave">
                     <div class="card-body">
                        {{-- Start Name Input --}}
                        <div class="form-outline mx-1">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" class="form-control form-control-lg inputBox" wire:model.lazy="name" placeholder="Color Name"/>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- End Name Input --}}
                        {{-- Start Name Input --}}
                        <div class="form-outline mx-1 mt-3">
                            <label class="form-label" for="color_code">Color Code</label>
                            <input type="text" id="color_code" class="form-control form-control-lg inputBox" wire:model.lazy="color_code" placeholder="Ex. #1530F7"/>
                            @error('color_code') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- End Name Input --}}

                        <button type="submit" class="btn btn-primary float-right btn-lg m-2">Submit</button>
                     </div>
                    </form>
                 </div>
             </div>
            {{-- End Add Color --}}
    </div>

</div>

