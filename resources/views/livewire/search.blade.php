
<form class="search-form" style=" top: 10px; margin-left: 20px; width: 350px; height: 40px; border-radius: 40px; background: #fff;">
  <input id="code" type="text"  wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" placeholder="Buscar..." class="search-input"
  style=" margin-top: 10px; margin-left: 20px; background: none; color: #5a6674; width: 195px; height: 20px; border: none; appearance: none;outline: none;">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function (){
        livewire.on('scan-code', action => {
            $('#code').val('')
        })
    });
</script>

 