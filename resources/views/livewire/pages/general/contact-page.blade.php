<div class="ContactPage">
    <section class="Hero">
        <div class="container">
            <h1>Get In Touch</h1>
            <p>Reach out to let us know how we can help you</p>
        </div>
    </section>

    <section class="Contact">
        <div class="contact_details">
            <div class="container">
                <h2>Contact Information</h2>

                <div class="contact">
                    <x-svgs.telephone />
                    <div class="content">
                        <p>{{ config('app.phone_number') }}</p>
                        @if(config('app.secondary_phone_number'))
                            <p>{{ config('app.secondary_phone_number') }}</p>
                        @endif
                    </div>
                </div>

                <div class="contact">
                    <x-svgs.email />
                    <div class="content">
                        <p>{{ config('app.email') }}</p>
                        @if(config('app.secondary_email'))
                            <p>{{ config('app.secondary_email') }}</p>
                        @endif
                    </div>
                </div>

                <div class="contact">
                    <x-svgs.location />
                    <div class="content">
                        <p>{!! config('app.address') !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact_form">
            <div class="container">
                <h2>Request a Callback</h2>

                <form wire:submit="submitMessage">
                    <div class="inputs">
                        <label>Name</label>
                        <input type="text" wire:model.blur="name">
                        <x-form-input-error field="name" />
                    </div>

                    <div class="inputs">
                        <label>Phone Number</label>
                        <input type="text" wire:model.blur="phone_number">
                        <x-form-input-error field="phone_number" />
                    </div>

                    <div class="inputs">
                        <label>Email</label>
                        <input type="email" wire:model.blur="email">
                        <x-form-input-error field="email" />
                    </div>

                    <div class="inputs">
                        <label>Message</label>
                        <textarea rows="4" wire:model.blur="message"></textarea>
                        <x-form-input-error field="message" />
                    </div>

                    <button type="submit" wire:loading.attr="disabled" wire:target="submitMessage">
                        <span wire:loading.remove wire:target="submitMessage">Send Message</span>
                        <span wire:loading wire:target="submitMessage">Sending Your Message...</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
