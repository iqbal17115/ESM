@push('css')

@endpush
<div>
    <x-slot name="title">
        Size
    </x-slot>
    <h4 class="pb-2">All Sizes</h4>
    <div class="row">

            {{-- Start Show All Colors --}}
            <div class="col-md-7">
               {{-- Card --}}
               <div class="card">
                    <div class="card-header" style="background-color: rgb(236, 239, 241);">
                      <h4 class="text-dark pb mb-0">Sizes</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
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
                            @foreach ($sizes as $size)
                              <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $size->code }}</td>
                                <td>{{ $size->name }}</td>
                                <td>
                                    <div class="float-right">
                                        <button class="rounded-circle btn-sm border-0 p-2 editButton" style="background-color: rgb(148, 170, 243);" wire:click="editSize({{ $size->id }})"><i class="fas fa-edit"></i></button>
                                        <button class="rounded-circle btn-sm border-0 p-2 deleteButton" style="background-color: rgb(229, 160, 160);" wire:click="deleteSize({{ $size->id }})"><i class="fas fa-trash-alt"></i></button>
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
                       <h4 class="text-dark pb mb-0">Add New Size</h4>
                     </div>
                    <form wire:submit.prevent="sizeSave">
                     <div class="card-body">
                         {{-- Start Name Input --}}
                        <div class="form-outline mx-1 mt-3">
                            <label class="form-label" for="color_code">Code</label>
                            <input type="text" id="code" class="form-control form-control-lg inputBox" wire:model.lazy="code" placeholder="Size Code"/>
                            @error('code') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- End Name Input --}}

                        {{-- Start Name Input --}}
                        <div class="form-outline mx-1">
                            <label class="form-label" for="name">Size Name</label>
                            <input type="text" id="name" class="form-control form-control-lg inputBox" wire:model.lazy="name" placeholder="Size Name"/>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
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

