document.addEventListener('livewire:initialized', () => {
    Livewire.on('new-created', (event) => {
        // let bell = {{ Js::from(url('noti.wav') ) }};

        Notification.requestPermission(permission => {
            if(permission === 'granted') {
                const noti = new Notification('New Record', {
                    body: "New Record Found"
                });

                new Audio(event[0]['audio']).play();
            }
        });

    });
});
