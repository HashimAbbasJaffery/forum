<x-layouts>
    <h1 class="mt-10 text-6xl mb-10">Edit Profile</h1>

        <p class="text-danger mb-5 hidden messages" id="name-message" style="font-weight: bold;">It can not be empty</p>
        <x-form.input type="text" id="name" name="name" value="{{ $profile->name }}"/>
        <p class="text-danger mb-5 hidden messages" id="email-message" style="font-weight: bold;">It can not be empty</p>
        <x-form.input type="email" id="email" name="email" value="{{ $profile->email }}"/>
        <p class="text-danger mb-5 hidden messages" id="description-message" style="font-weight: bold;">It can not be empty</p>
        <x-form.textarea name="description" id="description" value="{{ $profile->profile->description }}"/>
        <x-form.input type="submit" id="btn" name="submit" value="edit" isLabeled="false"/>
        <p class="alert alert-success" id="success" style="display: none;position: fixed; bottom: 0; right: 1%; z-index: 10;">Successfully updated</p>
        <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script>
            const button = document.getElementById("btn");
            button.addEventListener("click", () => {
                const form = new FormData();
                const name = document.getElementById("name").value;
                const email = document.getElementById("email").value;
                const description = document.getElementById("description").value;
                axios.post('/profile/{{ auth()->user()->username }}/update', {
                    name,
                    email,
                    description
                })
                .then(function (response) {
                    if(response.data === 1) {
                        const messages = document.querySelectorAll(".messages");
                        console.log(messages);
                        messages.forEach(message => {
                            console.log(message);
                            message.style.display = "none";
                        })
                        $("#success").fadeIn();
                        $("#success").delay(5000).fadeOut();
                    } else {
                        const errors = response.data.errors;
                        // console.log(errors)
                        for(item in errors) {
                            const message = document.getElementById(item + "-message");
                            console.log(message);
                            console.log(message.classList);
                            message.classList.remove("hidden");
                            message.textContent = errors[item];
                        }
                    } 
                })
                .catch(function (error) {
                    console.log(error);
                });
            })
        
    </script>
</x-layouts>