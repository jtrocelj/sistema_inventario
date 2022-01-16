
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @livewireStyles
    </head>
    <body>
        
        <div class="row mt-3">
        <div class="col-sm-12" style="background:#386EB8; border:5px solid ;border-radius:10px;">
            <div class="connect-sorting ">
                <h5 class="text-center mb-2 text-white">DENOMINACIONES</h5>
                <div class="container">
                    <div class="row">
                      
                    </div>
                </div>
                <div class="connect-sorting-content mt-4">

                    <div class="card simple-title-task ui-sortable-handle">
                        <div class="card-body">
                            <div class="input-group input-group-md mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-gp hideonsm" style="background: #386EB8; color:white; height:45px;">Efectivo F8</span>
                                </div>
                                <input type="number" id="cash" wire:model="efectivo" wire:keydown.enter="saveSale" 
                                class="form-control text-center"  style="height:43px;">
                                <div class="input-group-append">
                                    <span wire:click="$set('efectivo', 0)" class="input-group-text" style="background: #386EB8; color:white; height:45px;">
                                        <i class="fas fa-backspace fa-2x"></i>

                                    </span>
                                </div>
                            </div>

                                 
                        </div>
                    </div><br>
                </div>

            </div>
        </div>
    </div>


    @livewireScripts
    </body>
    </html>
  