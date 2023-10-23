
<div wire:poll>
  @foreach($users as $user)
    <p> {{ $user->name }} - {{ $user->created_at }} </p>
    <br>
  @endforeach
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
    @this.on('new-created', (event) => {
        console.log(event);
        let bell = {{ Js::from(url('noti.wav') ) }};

        Notification.requestPermission(permission => {
            if(permission === 'granted') {
                const noti = new Notification('New Record', {
                    body: "New Record Found"
                });

                new Audio(bell).play();
            }
        });

    });
    });
</script>
