
<form class="search-form" style=" top: 10px; margin-left: 20px; width: 350px; height: 40px; border-radius: 40px; background:#172B4D;">
  <input id="code" type="text"  wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" placeholder="Buscar..." class="search-input"
  style=" color:white; margin-top: 10px; margin-left: 20px; background: #172B4D; width: 195px; height: 20px; border: none; appearance: none;outline: none;">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        livewire.on('scan-code', action => {
            $('#code').val('')
        })
    });
</script>

 